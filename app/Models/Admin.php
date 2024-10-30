<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

class Admin extends Authenticatable

{
    use HasFactory, Notifiable, HasRoles, HasPermissions;
    
    
    protected $fillable = ['name', 'email', 'phone', 'password'];

   protected function casts(): array
   {
       return [
           'password' => 'hashed',
       ];
   }
}
