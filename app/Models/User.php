<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

use App\Models\Firestore;

class User extends Firestore
{
    // use HasApiTokens, Notifiable;

    protected static $collection = 'users';
    
    public function __construct() {
        parent::construct();
    }
}
