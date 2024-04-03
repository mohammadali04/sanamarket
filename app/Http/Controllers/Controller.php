<?php

namespace App\Http\Controllers;

use Cookie;
use App\Models\front\Product;
use App\Models\front\Basket;
use Illuminate\Http\Request;
use illumnaite\Support\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public static function getCookieBasket(){
        if(Cookie::has('basket')!=false){
            $cookie=Cookie::get('basket');
        }else{
            $expire=time()*7*60*3600;
            $value=time();
            $cookie=Cookie::queue(Cookie::make('basket',$value,$expire));
        }
        return $cookie;
    }
    // public static function getBasketCount(Request $request){
    //     // if($request->session()->has('basket_count')){
    //     //     // dd($request->session()->get('basket_count'));
    //     //     $request->session()->forget('basket_count');
            
    //     // }else{
    //     //     $cookie=self::getCookieBasket();
    //     //     $basket_count=Basket::where('cookie',$cookie)->count();
    //     //               $request->session()->put('basket_count',$basket_count);

    //     //           }
    //     return $request->session()->put('basket_count',4);
    // }فعلا این متد بلا استفاده است
    public function getBasket(){
        $basket_cookie=self::getCookieBasket();
        $baskets=DB::table('baskets')->leftJoin('products','baskets.product_id','=','products.id')->select('Products.*','baskets.id as basket_id','baskets.tedad')->where('cookie',$basket_cookie)->get();
        $totalDiscount=0;
        foreach($baskets as $basket){
            $darsadDiscount=$basket->discount;
            $price=$basket->price;
            $discount=($price * $darsadDiscount)/100;
            $discountOnTedad=$basket->tedad*$discount;
            $totalDiscount=$totalDiscount+$discountOnTedad;
        }
        $totalPriceAll=0;
        foreach($baskets as $basket){
            $price=$basket->price;
            $tedad=$basket->tedad;
            $totalPrice=$tedad*$price;
            $totalPriceAll=$totalPriceAll+$totalPrice;
        }
        $totalWeightAll=0;
        foreach($baskets as $basket){
            $weight=$basket->weight;
            $tedad=$basket->tedad;
            $totalWeight=$tedad*$weight;
            $totalWeightAll=$totalWeightAll+$totalWeight;
        }
        return [$baskets,$totalPriceAll,$totalDiscount,$totalWeightAll];
    }
    public function calculatePostPrice(){
        return 10000;
    }
}