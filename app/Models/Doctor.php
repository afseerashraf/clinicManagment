<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Doctor extends Authenticatable
{
    use HasFactory,  HasPermissions, HasRoles;

    protected $fillable = ['name', 'email', 'phone', 'specialized', 'password', 'image'];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function treatment()
    {
        return $this->hasMany(Treatment::class);
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
