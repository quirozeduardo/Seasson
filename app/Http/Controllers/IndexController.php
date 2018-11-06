<?php

namespace App\Http\Controllers;

use App\Models\Admin\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function __invoke(Request $request){
    	$articles=Article::paginate(18);

    	return view('index')->with('articles',$articles);
    }
}
