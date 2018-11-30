<?php

namespace App\Http\Controllers;

use App\Models\Admin\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Laracasts\Flash\Flash;

class CartController extends Controller
{

    function index(Request $request)
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
        $arrayArticlesIdInt=array();
        $cookieGet = Cookie::get('cartAdded');
        if(isset($cookieGet)){
        $arrayGetCookie=json_decode($cookieGet);
            foreach ($arrayGetCookie as $articleId){
                $arrayArticlesIdInt[]=(int)$articleId->id;
            }
        }
        $articles=Article::whereIn('id',$arrayArticlesIdInt)->get();
        return $articles;
    }
    public static function getArticlesCookies()
    {
        $arr = array();
        $cookieGet = Cookie::get('cartAdded');
        if(isset($cookieGet)) {
            $arr = json_decode($cookieGet);
        }
        return $arr;
    }
    function addToCart($articleId){

        $article=Article::where('id',$articleId)->first();
        if($article){
            $minutes=1*60*1000;

            $cookieGet = Cookie::get('cartAdded');
            if(isset($cookieGet)){
                $arrayGetCookie=json_decode($cookieGet);
                $repeated = false;
                for ($i = 0; $i<sizeof($arrayGetCookie); $i++)
                {
                    if($arrayGetCookie[$i]->id==($articleId.''))
                    {
                        $arrayGetCookie[$i]->quantity += 1;
                        $repeated = true;
                        break;
                    }
                }
                if(!$repeated)
                {
                    array_push($arrayGetCookie,array(
                        'id' => ''.$articleId,
                        'quantity' => 1
                    ));
                }
                Cookie::queue(Cookie::make("cartAdded",json_encode($arrayGetCookie)));
            }else{
                $arrayToEncode = array();
                array_push($arrayToEncode,array(
                    'id' => ''.$articleId,
                    'quantity' => 1
                ));
                Cookie::queue(Cookie::make("cartAdded",json_encode($arrayToEncode),$minutes));
            }

            return redirect('cart');
        }

    }
    public function changeQuantity(Request $request){
        $articleId = $request->input('articleId');
        $quantity = $request->input('quantity');
        $article=Article::where('id',$articleId)->first();
        if($article) {
            $cookieGet = Cookie::get('cartAdded');
            if (isset($cookieGet)) {
                $arrayGetCookie = json_decode($cookieGet);
                for ($i = 0; $i < sizeof($arrayGetCookie); $i++) {
                    if ($arrayGetCookie[$i]->id == ($articleId . '')) {
                        $arrayGetCookie[$i]->quantity = $quantity;
                        break;
                    }
                }
                Cookie::queue(Cookie::make("cartAdded", json_encode($arrayGetCookie)));
            }
        }
        return redirect('cart');
    }
    function removeToCart($articleId){
            $cookieGet = Cookie::get('cartAdded');
            if(isset($cookieGet)){

                $arrayGetCookie=json_decode($cookieGet);
                for ($i = 0; $i<sizeof($arrayGetCookie); $i++) {
                    if($arrayGetCookie[$i]->id==($articleId.'')) {
                        unset($arrayGetCookie[$i]);
                    }
                }
                Cookie::queue(Cookie::make("cartAdded",json_encode($arrayGetCookie)));
            }
            return redirect('cart');
    }
    public static function getCountArticlesInCart(){
        $cookieGet = Cookie::get('cartAdded');
        if(isset($cookieGet)){
            $arrayGetCookie=json_decode($cookieGet);
            return sizeof($arrayGetCookie);
        }else
            return 0;
    }

}
