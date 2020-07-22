<?php

namespace App\Http\Foundation;


class ViesClient
{
    /** @var SoapClient */
    public $client;

    /** @var string */
    private $base_url = "http://ec.europa.eu/taxation_customs/vies/checkVatTestService.wsdl";

    /** @var array */
    public $opts = ['http' => ['user_agent' => 'PHPSoapClient']];

    public function __construct()
    {
        try {

            $cont = stream_context_create($this->opts);
            $clientOps = [
                'stream_context' => $cont,
                'cache_wsdl' => 0
            ];
            $this->client = new \SoapClient($this->base_url, $clientOps);

        } catch (\SoapFault $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getUrl(): string
    {
        return $this->base_url;
    }

    public function request($country_code, $vat_number): \stdClass
    {
        try {
            $params = [
                'countryCode' => strtoupper($country_code),
                'vatNumber' => $vat_number
            ];
            return $this->client->checkVat($params);
        } catch (SoapFault $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
