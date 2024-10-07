<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable

{
    use HasFactory;

   protected $fillable = ['name', 'email', 'phone', 'password'];

   protected function casts(): array
   {
       return [
           'password' => 'hashed',
       ];
   }
}
