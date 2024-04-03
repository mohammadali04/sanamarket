<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\front\Basket;
use App\Http\Requests\StoreBasketRequest;
use App\Http\Requests\UpdateBasketRequest;
use Aghandeh\IranShippingPrice\Shipping;
use Exception;
use Illuminate\Http\Request;
class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
      $this->requireFile();
      $shipping = new Shipping();
      $states=$shipping->getStates();
        $basketInfo=parent::getBasket();
        $baskets=$basketInfo[0];
        $totalPrice=$basketInfo[1];
        $totalDiscount=$basketInfo[2];
        $totalWeight=$basketInfo[3];
       return view('front.basket.index',compact('baskets','totalPrice','totalDiscount','states','totalWeight'));
    }
    public function deleteBasket(Basket $basket)
    {
      try{
       $basket->delete();
      // parent::getBasketCount();
      }
      catch(Exception $exception){
        return redirect()->back()->with('warning',$exception->getCode());
      }
        $msg = 'آیتم مورد نظر با موفقیت حذف گردید';
       return redirect()->back()->with('success',$msg);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Basket $basket)
    {   
      

      try{
      if($request->tedad==0){
        $basket->delete();
      }
      else{
        $basket->update(['tedad'=>$request->tedad]);
        // parent::getBasketCount();
      }
     }
     catch(Exception $exception){
      return redirect()->back()->with('warning',$exception->getCode());
     }
     $msg='آیتم مورد نظر با موفقیت بروز رسانی شد';
     return redirect()->back()->with('success',$msg);
    }
   public function calculatePost(Request $request){
    $this->requireFile();
    $shipping = new Shipping();
    try{
      if($request->source_state && $request->target_state && $request->code_posti){
        $shipping->setCart($request->source_state , $request->code_posti , $request->target_state);

        //assume that total weight of the package would be 1000 gram
        $shipping->addWeight($request->weight); //weight must be in gram
        
        $result=$shipping->getSefareshiPrice();
        $request->session()->put('post_price',$result);
        return response()->json($result);
      }else{ throw new Exception('لطفا فیلد ها را پر کنید');}

    }catch(Exception $e){
      return response()->json([$e->getCode(),$e->getMessage()]);
    }
    
   }
   public function requireFile(){
    require 'G:\newxampp\htdocs\sanamarket\vendor\Aghandeh\IranShippingPrice\src\Shipping.php';
   }
}