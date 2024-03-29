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
        'fio',
        'email',
        'user_id',
        'product_id',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
