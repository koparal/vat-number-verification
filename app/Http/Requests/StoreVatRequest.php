<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\VatRequest;

class StoreVatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //Rules formats references https://ec.europa.eu/taxation_customs/vies/faq.html
        return [
            'country_code' => 'required|min:2|max:2',
            'vat_number' => 'required|min:8|max:12',
        ];
    }
}
