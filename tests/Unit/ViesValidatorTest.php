<?php

namespace Tests\Unit;

use App\Http\Foundation\ViesClient;
use App\Http\Foundation\ViesValidator;
use Tests\TestCase;

class ViesValidatorTest extends TestCase
{
    public function validNumbers() : array
    {
        $arr = [
            "GB"=>"979053087",
            "FR"=>"82542065479",
            "DE"=>"811194693",
        ];

        return $arr;
    }

    public function inValidNumbers() : array
    {
        $arr = [
            "GB"=>"123456789",
            "FR"=>"979053087",
            "IE"=>"979053087",
        ];

        return $arr;
    }

    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testValidVatNumbers()
    {
        $validator_1 = new ViesValidator("GB", "979053087");
        $this->assertTrue($validator_1->check());

        $validator_2 = new ViesValidator("FR", "82542065479");
        $this->assertTrue($validator_2->check());
    }

    public function testInValidVatNumbers()
    {
        $validator_1 = new ViesValidator("GB", "123456789");
        $this->assertFalse($validator_1->check());

        $validator_2 = new ViesValidator("IE", "979053087");
        $this->assertFalse($validator_2->check());
    }

    public function testRequest()
    {
        try {
            $viesClient = new ViesClient();
            $this->assertInstanceOf(\stdClass::class, $viesClient->request('GB', '979053087'));
        }
        catch (Exception $e) {
            $this->assertIsResponseFailure($e);
        }
    }
}
