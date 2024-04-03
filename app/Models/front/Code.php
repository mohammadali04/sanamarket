<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Code extends Model
{
    use HasFactory;
    function user(){
        return $this->belongsTo(User::class,'id','user_id');
    }
}
