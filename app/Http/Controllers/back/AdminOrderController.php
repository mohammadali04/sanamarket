<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index(){
        $orders=Order::all();
        return view('back.order.index',compact('orders'));
    }
    public function edit(Order $order){
        $order=DB::table('orders')
        ->rightJoin('pay_type','orders.pay_type','=','pay_type.id')
        ->rightJoin('post_type','orders.post_type','=','post_type.id')
        ->select('orders.*','post_type.title as post_title','post_type.id as post_id','pay_type.title as pay_title','pay_type.id as pay_id')
        ->where('orders.id',$order->id)->first();
        // $order=$orderInfo[0];
        $basket=$order->basket;
        $basket=unserialize($basket);
       $order_status=DB::table('order_status')->get();
        return view('back.order.edit',compact('order','order_status','basket'));

    }
    public function update (Request $request,Order $order){
       try{
        $order->status=$request->status;
        $order->address=$request->address;
        $order->mobile=$request->mobile;
        $order->code_posti=$request->code_posti;
        $order->tel=$request->tel;
        $order->save();
       }catch(Exception $exception){
        return redirect()->back()->with('warning',$exception->getCode());
       }
       $msg='سفارش مورد نظر با موفقیت ویرایش شد';
       return redirect(Route('admin.order.index'))->with('success',$msg);

    }
    public function showFactor(Order $order){

    }
    public function destory(){

    }
}
