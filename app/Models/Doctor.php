<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasPermissions;

class Doctor  extends Authenticatable
{
    use HasFactory,  HasRoles, HasPermissions;
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
