<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        $order_stat=$this->getStat();
      return view('back.dashboard.chart2',compact('order_stat'));
    }
    public function getOrder(){
       $orders = Order::all();
       return $orders;
    }
    public function getStat(){
        $today=Carbon::now();
        $last_week = $today->subDays(7);
        $orders=$this->getOrder();
        $dates=$this->getRange($last_week);
        $orderStat=[];
        foreach ($dates as $date) {
            $date=Carbon::create($date);
            $jalali_date=$date->toJalali()->format('Y-m-d');
            $orderStat[$jalali_date]=0;
        }
        $days=[];
        foreach ($orders as $order) {
            $order_date=$order->updated_at;
            $order_date=Carbon::create($order_date);
            $order_date=$order_date->format('Y-m-d');
            $order_date_jalali=verta($order_date)->format('Y-m-d');
            if(in_array($order_date,$dates)){
                // $orderStat[$order_date_jalali]=$orderStat[$order_date_jalali]+1;
                $orderStat[$order_date_jalali]=$orderStat[$order_date_jalali]+1;
            }
        }
        return $orderStat;


    }
    public function getRange($date1){
        $dates=[];
        $i=1;
        while($i < 8){
            array_push ($dates,$date1->addDay()->format('Y-m-d'));
            $i++;
        }
        return $dates;
    }
}
