<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public static function getClima($location)
    {
        $clima = array(
            'temp' => '',
            'tiempo' => ''
        );

        $BASE_URL = "http://query.yahooapis.com/v1/public/yql";

        $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$location.'") and u = "C"';
        $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
        $session = curl_init($yql_query_url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
        $json = curl_exec($session);
        $phpObj =  json_decode($json);
        if($phpObj)
        {
            $clima['temp'] =  $phpObj->query->results->channel->item->condition->temp;
        }


        //Selecionar segun el texto que nos mande el servidor el tipo de animacion que aparecera
        $soleado = 'soleado'; //Dia Soleado
        $soleado_lluvia = 'soleado-lluvia'; //Dia Con lluvia y sol
        $tormenta_electrica = 'tormenta-electrica'; //Dia con Tormenta Electrica
        $nublado = 'nublado'; //Dia nublado
        $lluvia = 'lluvia';//Dia Con lluvia
        $rafagas = 'rafagas'; //Dia con Aguanieve o nieve
        switch ($phpObj->query->results->channel->item->condition->text)
        {
            case '0':
                $clima['tiempo'] = $tormenta_electrica;
                break;
            case '0':
                $clima['tiempo'] = $tormenta_electrica;
                break;
            case '0':
                $clima['tiempo'] = $tormenta_electrica;
                break;





            //------------FIIINNN----------
            default:
                $clima['tiempo'] = $tormenta_electrica;
                break;
        }
        return $clima;

        return null;
    }
}
