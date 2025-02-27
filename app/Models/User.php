<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey='id';
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'address',
        'phone',
    ];
    
}
