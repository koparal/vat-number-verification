<?php

namespace Tests\Unit;

use App\Http\Foundation\ViesClient;
use Tests\TestCase;

class ViesClientTest extends TestCase
{
    public function testApiUrl()
    {
        $viesClient = new ViesClient();
        $base_url = "http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl";

        $this->assertEquals($base_url, $viesClient->getUrl());
    }
}
