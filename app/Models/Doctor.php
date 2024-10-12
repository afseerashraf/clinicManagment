<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'specialized', 'password' ,'image'];

    public function patients(){
        return $this->hasMany(Patient::class);
    }

    public function treatment(){
        return $this->hasMany(Treatment::class);
    }

    protected function casts(): array
   {
       return [
           'password' => 'hashed',
       ];
   }
}
