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
                'apikey' => env('CURRENCY_API_LIST_KEY'),
            ],
        ];

        $response = $client->request('GET', $url, $params);

        $response_body = json_decode($response->getBody());

        return view('currencies.list', compact('response_body'));
    }

    public function convert_currencies()
    {
        $headers = [
            'X-RapidAPI-Key' => env('CURRENCY_API_CONVERT_KEY'),
        ];

        $client = new Client([
            'headers' => $headers,
        ]);

        $url = env('CURRENCY_API_CONVERT_URL');

        $params = [
            'query' => [
                'have' => 'USD',
                'want' => 'EUR',
                'amount' => 5000,
            ],
        ];

        $response = $client->request('GET', $url, $params);

        $response_body = json_decode($response->getBody());

        return view('currencies.convert', compact('response_body'));
    }
}
