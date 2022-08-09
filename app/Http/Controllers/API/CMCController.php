<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CMCController extends Controller
{

    public function getAllCryptos()
    {

        // https://laravel.com/docs/9.x/http-client
        $response = Http::cmc()->get('/quotes/latest', ['symbol' => 'BTC,AVAX,SOL']);

        return json_decode($response->body());

    }


    /**
     * 
     */
    public function getQuotesFromCoins()
    {



        return null;
    }




}
