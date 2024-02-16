<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'id',
        'number',
        'product_id',
        'path'
    ];
    public function product() {
        return $this->HasMany(Product::class)
    }

}
