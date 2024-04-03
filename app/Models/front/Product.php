<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function comments(){
        return $this->hasMany(Comment::class,'product_id','id');
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}
