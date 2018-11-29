<?php

namespace App\Http\Controllers;

use App\Models\Admin\Article;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class Filtered extends Controller
{
    public function __invoke($gender,$category)
    {
        $articles=Article::select(
            'article.id',
            'article.name',
            'article.description',
            'article.price',
            'article.cost',
            'article.image',
            'article.info',
            'article.category_id',
            'article.quantity',
            'article.discount',
            'article.color',
            'article.created_at',
            'article.updated_at')
            ->where('gender.name',$gender)
            ->where('category.name',$category)
            ->join('category','category.id','article.category_id')
            ->join('gender','gender.id','category.gender_id')
            ->get();

        if($articles->count()>0)
            Flash::success('Varios articulos encontrados');
        else
            Flash::error('No se encontraron articulos');

        return view('filtered')
            ->with('articles',$articles);
    }
    public function search($word)
    {
        $articles=Article::where('name','like','%'.$word.'%')->get();

        if($articles->count()>0)
            Flash::success('Varios articulos encontrados');
        else
            Flash::error('No se encontraron articulos');

        return view('filtered')
            ->with('articles',$articles);
    }
}
