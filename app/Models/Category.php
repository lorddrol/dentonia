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
    ];
        public function products(){
            return $this->HasMany(Product::class);
        }
}
