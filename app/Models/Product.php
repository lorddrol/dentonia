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
        'structure',
        'application',
        'advantages',
        'price',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->HasMany(Comment::class);
    }
    public function photo(){
        return $this->bilongsTo(Photo::class);
    }
}
