<?php

namespace App\Http\Controllers;

use App\Models\Admin\OrderedArticle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class PayController extends Controller
{
    function card(){
        return view('pay.card');
    }
    function payed(){
        $articles=CartController::cartArticles();
        foreach ($articles as $article){
            $articleCreate=new OrderedArticle();
            $articleCreate->article_id=$article->id;
            $articleCreate->quantity=1;
            $articleCreate->save();
        }
        Flash::success('Tu Pedido ah sido pagado y sera enviado, tiempo de llegara aprox 4 dias');
        CartController::forgetCart();
        return redirect('/');
    }
}
