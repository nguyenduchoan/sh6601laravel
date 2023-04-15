<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Customer extends Authenticatable
{
    use HasFactory;
     protected  $fillable = ['name', 'email', 'password', 'address'];

/**
 * The attributes that should be hidden for arrays.
 *
 * @var array
 */

 protected $hidden = [
 'password',
 ];

}
