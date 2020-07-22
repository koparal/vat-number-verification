<?php

namespace App\Jobs;

use App\Http\Foundation\ViesValidator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\VatRequest;

class VatRequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var ViesValidator */
    public $vies;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ViesValidator $vies)
    {
        $this->vies = $vies;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Data Collection
        $data = [
            "name" => $this->vies->getName(),
            "country_code" => $this->vies->getCountryCode(),
            "vat_number" => $this->vies->getVatNumber(),
            "valid" => $this->vies->check(),
            "requestDate" => $this->vies->getRequestDate(),
            "address" => $this->vies->getAddress(),
        ];

        try {
            // Store db
            VatRequest::create($data);
        } catch (\Exception $e) {
            //Write error failed job table
            throw new \Exception("Error Processing the job", $e->getMessage());
        }
    }
}
