<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function list_currencies()
    {
        $client = new Client();

        $url = env('CURRENCY_API_LIST_URL');

        $params = [
            'query' => [
                'apikey' => env('CURRENCY_API_KEY'),
             ]
        ];

        $response = $client->request('GET', $url, $params);

        $response_body = json_decode($response->getBody());

        return view('currencies.list', compact('response_body'));
    }
}
