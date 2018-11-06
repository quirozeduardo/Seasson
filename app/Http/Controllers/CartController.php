<?php

namespace App\Http\Controllers;

use App\Models\Admin\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Laracasts\Flash\Flash;

class CartController extends Controller
{

    function __invoke(Request $request)
    {
        $articles=self::cartArticles();

        if(!isset($articles)||($articles->count()<1))
                Flash::warning('Ningun articulo agregado al carrito');

        return view('cart')
            ->with('articles', $articles);
    }
    public static function forgetCart(){
        Cookie::queue(Cookie::forget('cartAdded'));
    }
    public static function cartArticles(){
        $arrayArticlesId=array();
        $cookieGet = Cookie::get('cartAdded');
        if(isset($cookieGet)){
        $arrayGetCookie=json_decode($cookieGet);
        foreach ($arrayGetCookie as $id) {
        $arrayArticlesId[]=$id;
        }
        }
        $arrayArticlesIdInt=array();
        foreach ($arrayArticlesId as $articleId){
            $arrayArticlesIdInt[]=(int)$articleId;
        }
        $articles=Article::whereIn('id',$arrayArticlesIdInt)->get();
        return $articles;
    }
    function addToCart($articleId){

        $article=Article::where('id',$articleId)->first();
        $arrayArticlesId=array();
        if($article){
            $minutes=1*60*1000;

            $cookieGet = Cookie::get('cartAdded');
            if(isset($cookieGet)){
                $arrayGetCookie=json_decode($cookieGet);
                foreach ($arrayGetCookie as $id) {
                    $arrayArticlesId[]=$id;
                }
                if(!in_array($articleId,$arrayArticlesId))
                    $arrayArticlesId[]=$articleId;
                $jsonEncodeArticlesId=json_encode($arrayArticlesId);
                Cookie::queue(Cookie::make("cartAdded",$jsonEncodeArticlesId));
            }else{
                $arrayArticlesId[]=$articleId;
                $jsonEncodeArticlesId=json_encode($arrayArticlesId);
                Cookie::queue(Cookie::make("cartAdded",$jsonEncodeArticlesId,$minutes));
            }

            return redirect('cart');
        }
        
    }
    function removeToCart($articleId){
            $cookieGet = Cookie::get('cartAdded');
            if(isset($cookieGet)){


                $arrayGetCookie=json_decode($cookieGet);
                foreach ($arrayGetCookie as $id) {
                    $arrayArticlesId[]=$id;
                }
                $arrayArticlesId=array_diff($arrayArticlesId,array($articleId));
                $jsonEncodeArticlesId=json_encode($arrayArticlesId);
                Cookie::queue(Cookie::make("cartAdded",$jsonEncodeArticlesId));
            }
            return redirect('cart');
    }
    public static function getCountArticlesInCart(){

        $cookieGet = Cookie::get('cartAdded');
        if(isset($cookieGet)){
            $arrayArticlesId=array();
            $arrayGetCookie=json_decode($cookieGet);
            foreach ($arrayGetCookie as $id) {
                $arrayArticlesId[]=$id;
            }
            $arrayArticlesIdInt=array();
            foreach ($arrayArticlesId as $articleId){
                $arrayArticlesIdInt[]=(int)$articleId;
            }
            $articlesCount=Article::whereIn('id',$arrayArticlesIdInt)->count();
            return $articlesCount;
        }else
            return 0;
    }

}
