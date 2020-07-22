<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VatRequest extends Model
{
    protected $fillable = [
        "name",
        "country_code",
        "vat_number",
        "valid",
        "requestDate",
        "address",
    ];

    public $timestamps = false;
}
