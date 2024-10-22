<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatientBill;
class PatientsBillEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $patientBill;
    public $pdfPath;
    public function __construct($paybill, $pdfPath)
    {
        $this->patientBill = $paybill;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('afseer@gmail.com')->send(new PatientBill($this->patientBill, $this->pdfPath));

    }
}
