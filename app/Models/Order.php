<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
    'id',
    'count',
    'number_order',
    ];
    public function psers(){
        return $this->HasMany(User::class);
    }
    public function product(){
        return $this->bilongsTo(Product::class);
    }
}
