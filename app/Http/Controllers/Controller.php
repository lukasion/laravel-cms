<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $footerArticle = Articles::find(11);
        $footerArticle2 = Articles::find(12);
        $footerArticle3 = Articles::find(13);
        $headerArticle = Articles::find(14);

        View::share('footerArticle', $footerArticle);
        View::share('footerArticle2', $footerArticle2);
        View::share('footerArticle3', $footerArticle3);
        View::share('headerArticle', $headerArticle);

    }
}
