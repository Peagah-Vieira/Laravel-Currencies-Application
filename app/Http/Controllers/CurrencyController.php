<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function exchange()
    {
        $client = new Client();

        $url =  env('CURRENCY_API_URL');

        $params = [
            'query' => [
                'access_key' => env('CURRENCY_API_ACCESS_KEY'),
             ]
        ];

        $response = $client->request('GET', $url, $params);

        $response_body = json_decode($response->getBody());

        return view('currencies.exchange', compact('response_body'));
    }
}
