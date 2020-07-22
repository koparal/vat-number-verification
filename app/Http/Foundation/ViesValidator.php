<?php

namespace App\Http\Foundation;

class ViesValidator
{
    /** @var ViesClient */
    public $client;

    /** @var int|string */
    public $vat_number;

    /** @var string */
    public $country_code;

    /** @var stdClass */
    public $response;

    public function __construct($country_code, $vat_number)
    {
        $this->client = new ViesClient;
        $this->country_code = $country_code;
        $this->vat_number = $vat_number;

        $this->response = $this->client->request($this->country_code, $this->vat_number);
    }

    public function check(): bool
    {
        return $this->response->valid;
    }

    public function getName(): string
    {
        return $this->response->name ?? '-';
    }

    public function getAddress(): string
    {
        return $this->response->address ?? '-';
    }

    public function getRequestDate(): string
    {
        return $this->response->requestDate ?? '-';
    }

    public function getCountryCode(): string
    {
        return $this->response->countryCode ?? '-';
    }

    public function getVatNumber(): string
    {
        return $this->response->vatNumber ?? '-';
    }
}
