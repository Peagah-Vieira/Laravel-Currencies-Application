<?php

namespace App\Models;

use Sushi\Sushi;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class CurrenciesList extends Model
{
    use Sushi;

    /**
     * Model Rows
     *
     * @return void
     */
    public function getRows()
    {
        $client = new Client();

        $url = env('CURRENCY_API_LIST_URL');

        $params = [
            'query' => [
                'apikey' => env('CURRENCY_API_LIST_KEY'),
                'currencies' => "USD,BRL,AUD,CNY,EGP,INR,IRR,JPY,KRW,MXN,ZAR,ADA,LTC,MATIC,AVAX,DOT,SOL,XRP,BNB,ETH,BTC,XPD,XPT,ZWL,ZMW,ZMK,ZAR,YER",
            ],
        ];

        $response = $client->request('GET', $url, $params);

        $response_body = json_decode($response->getBody(), true);

        $currencies = Arr::map($response_body['data'], function ($item) {
            return $item;
        });

        return array_values($currencies);
    }
}
