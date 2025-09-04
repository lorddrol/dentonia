<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $fillable = [
        'id',
        'name',
        'categories_id',
        'have_under_category',
    ];
        public function products(){
            return $this->hasOne(Product::class);
        }
}
