<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];
    protected $table = 'users'; // Ensure this matches your database table name

    // Define the relationship with the Order model
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
