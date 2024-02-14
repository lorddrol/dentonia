<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    protected $fillable = [
        'id',
        'name',
        'discription',
        'price',
        'category_id'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->HasMany(Comment::class)
    }
}
