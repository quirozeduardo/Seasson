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
        switch ($phpObj->query->results->channel->item->condition->code)
        {
            case '0':
                $clima['tiempo'] = $tormenta_electrica;
                break;
            case '1':
                $clima['tiempo'] = $tormenta_electrica;
                break;
            case '2':
                $clima['tiempo'] = $tormenta_electrica;
                break;
            case '3':
                $clima['tiempo'] = $tormenta_electrica;
                break;
            case '4':
                $clima['tiempo'] = $tormenta_electrica;
                break;
            case '5':
                $clima['tiempo'] = $rafagas;
                break;
            case '6':
                $clima['tiempo'] = $rafagas;
                break;
            case '7':
                $clima['tiempo'] = $rafagas;
                break;
            case '8':
                $clima['tiempo'] = $rafagas;
                break;
            case '9':
                $clima['tiempo'] = $lluvia;
                break;
            case '10':
                $clima['tiempo'] = $lluvia;
                break;
            case '11':
                $clima['tiempo'] = $lluvia;
                break;
            case '12':
                $clima['tiempo'] = $lluvia;
                break;
            case '13':
                $clima['tiempo'] = $rafagas;
                break;
            case '14':
                $clima['tiempo'] = $rafagas;
                break;
            case '15':
                $clima['tiempo'] = $rafagas;
                break;
            case '16':
                $clima['tiempo'] = $rafagas;
                break;
            case '17':
                $clima['tiempo'] = $lluvia;
                break;
            case '18':
                $clima['tiempo'] = $rafagas;
                break;
            case '19':
                $clima['tiempo'] = $soleado;
                break;
            case '20':
                $clima['tiempo'] = $soleado;
                break;
            case '21':
                $clima['tiempo'] = $soleado;
                break;
            case '22':
                $clima['tiempo'] = $nublado;
                break;
            case '23':
                $clima['tiempo'] = $nublado;
                break;
            case '24':
                $clima['tiempo'] = $nublado;
                break;
            case '25':
                $clima['tiempo'] = $rafagas;
                break;
            case '26':
                $clima['tiempo'] = $nublado;
                break;
            case '27':
                $clima['tiempo'] = $nublado;
                break;
            case '28':
                $clima['tiempo'] = $nublado;
                break;
            case '29':
                $clima['tiempo'] = $nublado;
                break;
            case '30':
                $clima['tiempo'] = $nublado;
                break;
            case '31':
                $clima['tiempo'] = $soleado;
                break;
            case '32':
                $clima['tiempo'] = $soleado;
                break;
            case '33':
                $clima['tiempo'] = $soleado;
                break;
            case '34':
                $clima['tiempo'] = $soleado;
                break;
            case '35':
                $clima['tiempo'] = $lluvia;
                break;
            case '36':
                $clima['tiempo'] = $soleado;
                break;
            case '37':
                $clima['tiempo'] = $lluvia;
                break;
            case '38':
                $clima['tiempo'] = $tormenta_electrica;
                break;
            case '39':
                $clima['tiempo'] = $tormenta_electrica;
                break;
            case '40':
                $clima['tiempo'] = $lluvia;
                break;
            case '41':
                $clima['tiempo'] = $rafagas;
                break;
            case '42':
                $clima['tiempo'] = $rafagas;
                break;
            case '43':
                $clima['tiempo'] = $rafagas;
                break;
            case '44':
                $clima['tiempo'] = $nublado;
                break;
            case '45':
                $clima['tiempo'] = $tormenta_electrica;
                break;
            case '46':
                $clima['tiempo'] = $rafagas;
                break;
            case '47':
                $clima['tiempo'] = $tormenta_electrica;
                break;




            //------------FIIINNN----------
            default:
                $clima['tiempo'] = $soleado;
                break;
        }
        return $clima;

        return null;
    }
}
