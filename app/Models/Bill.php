<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'patient_bills';
    protected $fillable = ['treatment_id', 'doctor_fees', 'additional_charges', 'total_amount'];

    public function treatment(){
        return $this->belongsTo(Treatment::class, 'treatment_id', 'id');
    }
}
