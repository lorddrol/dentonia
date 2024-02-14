<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id',
        'comment',
    ];
    public function users(){
        return $this->HasMany(User::class);
    }
    public function prouct(){
        return $this->bilongsTo(Product::class);
    }
}
