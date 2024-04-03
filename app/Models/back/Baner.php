<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baner extends Model
{
    use HasFactory;
    protected $fillable=['title','description','img'];
}
