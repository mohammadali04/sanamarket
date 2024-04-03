<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['product_id','user_id','body','name','email','status'];
    public function product (){
        return  $this->belongsTo(User::class,'user_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}