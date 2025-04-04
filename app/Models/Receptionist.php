<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Receptionist extends Authenticatable
{
    use HasFactory,  HasPermissions, HasRoles;

    protected $fillable = ['name', 'email', 'place', 'phone', 'password'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
