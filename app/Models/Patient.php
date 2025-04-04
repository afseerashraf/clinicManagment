<?php

namespace App\Models;

use App\Observers\PatientCreateMail;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([PatientCreateMail::class])]

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email', 'place', 'house', 'medical_history', 'doctor_id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function treatment()
    {
        return $this->hasOne(Treatment::class);
    }

    protected $casts = [
        'appoinment_date' => 'date',
        'check_in' => 'datetime',
    ];
}
