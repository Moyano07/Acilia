<?php


namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CurrencyConversion
{

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getValueCurrency($currencyBase)
    {
        $valueCurrencyChange = 'EUR';
        if ($currencyBase === 'EUR') {
            $valueCurrencyChange = 'USD';
        }

        $response = $this->client->request(
            'GET', 'https://api.exchangeratesapi.io/latest',
            ['query' => ['base' => $currencyBase, 'symbols' => $valueCurrencyChange]]
        );
        $content  = json_decode($response->getContent());

        return $content->rates->$valueCurrencyChange;

    }

}