<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'email', 'place', 'house', 'medical_history', 'doctor_id'];

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function treatment(){
        return $this->hasOne(Treatment::class);
    }
    protected $casts = [
        'appoinment_date' => 'date',
        'check_in' => 'datetime',
    ];

   
}
