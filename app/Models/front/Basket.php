<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $fillable=['product_id','tedad','cookie'];
}
