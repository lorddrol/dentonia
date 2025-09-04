<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\Cart;

class Product extends Model
{
    protected $fillable = [
        'id',
        'name',
        'discription',
        'structure',
        'application',
        'advantages',
        'price_user',
        'price_doctor',
        'category_id',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
