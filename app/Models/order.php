<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'product_name', 'price', 'user_id'];
    protected $table = 'order'; 

  
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public static function countorder()
    {
        return self::count();
    }
}
