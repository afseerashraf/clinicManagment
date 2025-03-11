<?php

namespace App\Observers;

use App\Mail\MailforCreatedPatient;
use App\Models\Patient;
use Illuminate\Support\Facades\Mail;

class PatientCreateMail
{
    /**
     * Handle the Patient "created" event.
     */
    public function created(Patient $patient): void
    {
        Mail::to($patient->email)->send(new MailforCreatedPatient($patient));
    }

    /**
     * Handle the Patient "updated" event.
     */
    public function updated(Patient $patient): void
    {
        //
    }

    /**
     * Handle the Patient "deleted" event.
     */
    public function deleted(Patient $patient): void
    {
        //
    }

    /**
     * Handle the Patient "restored" event.
     */
    public function restored(Patient $patient): void
    {
        //
    }

    /**
     * Handle the Patient "force deleted" event.
     */
    public function forceDeleted(Patient $patient): void
    {
        //
    }
}
