<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id', 'patient_id', 'treatment_description', 'additional_notes', 'check_in', 'check_out'];
}
