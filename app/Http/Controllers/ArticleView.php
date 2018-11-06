<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Article;

class ArticleView extends Controller
{
    function __invoke(Request $request,$id)
    {

        $article=Article::where('id',$id)->first();
        if($article)
            return view('article_view')->with('article',$article);
    }
}
