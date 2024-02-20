<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Comment extends Model
{
    protected $fillable = [
        'id',
        'comment',
        'star',
        'user_id',
        'product_id'
    ];
    public function users(){
        return $this->HasMany(User::class);
    }
    public function product(){
        return $this->bilongsTo(Product::class);
    }
}
