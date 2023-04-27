<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class ArticleController extends Controller
{
    public function show(Request $request, string $friendlyName)
    {
        $articlesObj       = new Articles();
        $article           = $articlesObj->getByFriendlyName($friendlyName);
        $popularCategories = Category::getPopular();
        $popularArticles   = Articles::getPopular();

        $string =  Str::limit(filter_var($article->content, FILTER_SANITIZE_STRING), 120);
        $string = str_replace('&nbsp;', '', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        
        $metatags = [
            'title' => $article->name . ' - ' . env('META_TITLE'),
            'description' => $string
        ];

        if ($article) {
            Log::set('view', $article->id);

            return view('articles.show', compact('article', 'popularCategories', 'popularArticles', 'metatags'));
        } else {
            return view('404', compact('article'));
        }
    }

    public function search(Request $request)
    {
        $articlesObj       = new Articles();
        $search            = $request->search;
        $articles          = $articlesObj->search($search, $search);

        if ($articles) {
            return view('articles.searchResults', compact('articles', 'search'));
        } else {
            return view('404', compact('article'));
        }
    }

    public function comment(Request $request, string $friendlyName)
    {
        $articlesObj = new Articles();
        $article     = $articlesObj->getByFriendlyName($friendlyName);

        if ($article) {
            if (!empty($request->nickname) && !empty($request->comment)) {
                $wrongToken = false;

                if (!empty($request->token)) {
                    $url = "https://www.google.com/recaptcha/api/siteverify";
                    $data = [
                        'secret' => "6LczlZ4iAAAAAN9wEDZ7FcXKCEBn1JBNcEaPs8Ng",
                        'response' => $request->token
                    ];
                    $options = array(
                        'http' => array(
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($data)
                        )
                    );
                    $context  = stream_context_create($options);
                    $response = file_get_contents($url, false, $context);
                    $res = json_decode($response, true);

                    if ($res && $res['success']) {
                        $commentObj             = new Comment();
                        $commentObj->comment    = $request->comment;
                        $commentObj->nickname   = $request->nickname;
                        $commentObj->article_id = $article->id;
                        
                        if ($commentObj->save()) {
                            return redirect(route('articleShow', ['articleFriendlyName' => $article->friendly_name]))
                                ->with('info', 'Pomyślnie dodano komentarz pod artykułem.');
                        }
                    } else {
                        $wrongToken = true;
                    }
                } else {
                    $wrongToken = true;
                }
            }

            return view('articles.show', compact('article', 'wrongToken'));
        } else {
            return view('404', compact('article'));
        }
    }

    public function edit(Request $request, $articleID)
    {
        $articleObj = new Articles();
        $user       = Auth::user();
        $article    = $articleObj->where('id', $articleID)->first();
        $content    = $request->content;
        $name       = Str::ucfirst($request->name);
        $categories = Category::orderBy('name')->get();

        if (!empty($name)) {
            if ($request->photo != null) {
                try {
                    $image = $request->file('photo');
                    $input['imagename'] = time().'.'.$image->extension();
                    $filePath = public_path('/images/articles');
                    $img = Image::make($image->path());
                    $img->resize(750, 300, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath.'/'.$input['imagename']);
            
                    $filePath = public_path('/images');
                    $image->move($filePath, $input['imagename']);

                    $article->photo = $input['imagename'];
                } catch(\Exception $e) {
                    return redirect($article->friendly_name)
                        ->with('warning', 'Wystąpił błąd podczas wgrywania zdjęcia.');
                }
            }

            if ($name != null) {
                $article->name = $name;
            }

            if ($content != null) {
                $article->content  = $content;
            }

            if (!empty($request->category_id)) {
                $article->category_id  = $request->category_id;
            }

            if ($article->save()) {
                $redirect = $article->friendly_name;

                if (!empty($article->return_id)) {
                    $articleToRedirect = Articles::find($article->return_id);
                    $redirect = $articleToRedirect->friendly_name;
                }

                if ($article->highlighted == 1) {
                    return redirect($redirect)
                        ->with('info', 'Pomyślnie zapisano artykuł.');
                } else {
                    return redirect($redirect)
                        ->with('info', 'Pomyślnie zapisano artykuł.');
                }
            }
        }
        return view('articles.form', compact('article', 'user', 'categories'));
    }

    public function delete(Request $request, $articleID)
    {
        $articleObj = new Articles();
        $user       = Auth::user();

        if ($user && !empty($articleID)) {
            $article = $articleObj->find($articleID);

            if ($article) {
                if (empty($request->deleteConfirm)) {
                    return view('articles.deleteConfirm', compact('article'));
                } else {
                    try {
                        $article->delete();

                        return redirect(route('articles'))
                            ->with('info', 'Pomyślnie usunięto artykuł.');
                    } catch (\Exception $e) {
                        return redirect(route('articles'))
                            ->with('warning', 'Wystąpił błąd podczas usuwania artykułu.');
                    }
                }
            }

        }
        return view('articles.form', compact('article', 'user', 'categories'));
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $categories = Category::orderBy('name')->get();

        if (!empty($request->name)) {
            $article                = new Articles();
            $article->name          = Str::ucfirst($request->name);
            $article->content       = $request->content;
            $article->friendly_name = $request->name;
            $article->user_id       = $user->id;

            if ($request->photo != null) {
                try {
                    $image = $request->file('photo');
                    $input['imagename'] = time().'.'.$image->extension();
                    $filePath = public_path('/images/articles');
                    $img = Image::make($image->path());
                    $img->resize(750, 300, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath.'/'.$input['imagename']);
            
                    $filePath = public_path('/images');
                    $image->move($filePath, $input['imagename']);

                    $article->photo = $input['imagename'];
                } catch(\Exception $e) {
                    return redirect($article->friendly_name)
                        ->with('warning', 'Wystąpił błąd podczas wgrywania zdjęcia.');
                }
            }
            
            if (!empty($request->category_id)) {
                $article->category_id  = $request->category_id;
            }

            if ($article->save()) {
                return redirect(route('articleShow', ['articleFriendlyName' => $article->friendly_name]))
                    ->with('info', 'Pomyślnie utworzono artykuł.');
            }
        }

        return view('articles.form', compact('user', 'categories'));
    }
}
