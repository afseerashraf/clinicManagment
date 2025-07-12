<?php

namespace App\Jobs;

use App\Mail\PatientBill;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

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
        Mail::to($this->patientBill->treatment->patient->email)->send(new PatientBill($this->patientBill, $this->pdfPath));

    }
}
