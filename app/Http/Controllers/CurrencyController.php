<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Returns a list of currencies through a JsonResponse for the 'index' view
     *
     * @return JsonResponse
     */
    public function index()
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

        return view('currencies.index', compact('response_body'));
    }

    /**
     * Receive 'have', 'want' and 'amount' from the request and return a response with converted amount
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function convert_currencies(Request $request)
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
                'have' => $request->have,
                'want' => $request->want,
                'amount' => $request->amount,
            ],
        ];

        $response = $client->request('GET', $url, $params);

        $response_body = json_decode($response->getBody());

        return compact('response_body');
    }
}
