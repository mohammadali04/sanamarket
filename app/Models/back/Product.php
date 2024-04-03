<?php

namespace App\Models\back;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,Sluggable;
    protected $fillable=['title','slug','cat_id','description','img','price','weight','discount','status','special','hit'];
    public function comments(){
        return $this->hasMany(Comment::class,'product_id','id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ''
            ]
        ];
    }
}
