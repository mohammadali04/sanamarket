<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['title','parent'];
    public function parents(){
        return $this->hasMany(Category::class,'id','parent');
    }
    public function children(){
        return $this->hasMany(Category::class,'parent','id');
    }
}
