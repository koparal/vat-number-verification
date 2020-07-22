<?php

namespace App\Http\Controllers;

use App\Events\VatRequestEvent;
use App\Http\Foundation\ViesValidator;
use App\Http\Requests\StoreVatRequest;
use App\Jobs\VatRequestJob;
use App\Jobs\VatValidatorJob;

class ViesController extends Controller
{
    public function index()
    {
        $country_codes = [
            "AT", "BE", "BG", "CY", "CZ", "DE",
            "DK", "EE", "EL", "ES", "FI", "FR",
            "GB", "HR", "HU", "IE", "IT", "LT",
            "LU", "LV", "MT", "PL", "RO", "SE",
            "SI", "SK"
        ];

        return view("vies.home", ["country_codes" => $country_codes]);
    }

    public function validator(StoreVatRequest $request)
    {
        // Form Server Side Validation
        $request->validated();

        try {
            // Send request inputs to Vies Validator
            $validator = new ViesValidator($request->country_code, $request->vat_number);
            // Store database with queue
            VatRequestJob::dispatch($validator);
        } catch (\SoapFault $e) {
            return redirect()->back()->withErrors(['error' => "An error occurred during the request. Please try again. Error Code : " . $e->getMessage()]);
        }

        return redirect()->back()->with("validator", $validator);
    }
}
