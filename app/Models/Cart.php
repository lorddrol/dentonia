<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class cart extends Model
{
    protected $fillable = [
    'id',
    'count',
    'user_id',
    'product_id',
    ];
    public function products(){
        return $this->belongsTo(Product::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
