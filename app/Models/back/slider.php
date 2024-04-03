<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\back\Product;

class slider extends Model
{
    use HasFactory;
    protected $fillable=['product_id','img'];
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
