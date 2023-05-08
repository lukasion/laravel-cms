<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Comment;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $article = Articles::find(1);
        $articleOffer = Articles::find(104);
        
        return view('start', compact('article', 'articleOffer'));
    }

    public function aboutme(Request $request)
    {
        $article = Articles::find(108);
        
        return view('articles.about', compact('article'));
    }

    public function offer(Request $request)
    {
        $article = Articles::find(109);
        
        return view('articles.about', compact('article'));
    }

    public function contact(Request $request)
    {
        $article = Articles::find(10);
        
        return view('articles.contact', compact('article'));
    }

    public function articles(Request $request)
    {
        $articlesObj    = new Articles();
        $articles       = $articlesObj->search();

        return view('articles.index', compact('articles'));
    }
}
