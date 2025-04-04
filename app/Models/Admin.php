<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasPermissions, HasRoles, Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'password'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
