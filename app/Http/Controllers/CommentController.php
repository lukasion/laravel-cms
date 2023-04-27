<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function delete(Request $request, int $commentID)
    {
        $commentObj = new Comment();
        $comment    = $commentObj->find($commentID);

        if ($comment) {
            try {
                $article = Articles::find($comment->article_id);
                $comment->delete();

                return redirect(route('articleShow', ['articleFriendlyName' => $article->friendly_name]))
                    ->with('info', 'Pomyślnie usunięto komentarz w artykule.');
                    
            } catch (\Exception $e) {
                dd($e);

                return false;
            }
        } else {
            return redirect(route('index'))
                ->with('warning', 'Wybrany komentarz już nie istnieje!');
        }
    }
}
