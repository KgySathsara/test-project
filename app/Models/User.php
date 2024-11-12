<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'address', 'contact_no', 'dob', 'password', 'role'
    ];

    protected $hidden = ['password'];

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class, 'pharmacy_id');
    }
}

