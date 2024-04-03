<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\front\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminStatController extends Controller
{
    public function getStat(){
        return view('back.stat.getstat');
    }
    public function compaire($date1,$date2){
       $date1=new Carbon($date1);
       $date1=$date1->format('Y-m-d');
       $date2=new Carbon($date2);
       $date2=$date2->format('Y-m-d');
       if($date1 > $date2){
        return 1;
       }
       if($date1 == $date2){
        return 2;
       }
       if ($date1 < $date2){
        return 3;
       }
    }
    public function processStat(Request $request){
        $date1=$request->start_year.'-'.$request->start_mounth.'-'.$request->start_day;
        $date2=$request->end_year.'-'.$request->end_mounth.'-'.$request->end_day;
        $result=Order::all();
        $result_total=[];
        $amount_total=0;
        $order_payed=0;
        foreach($result as $row){
            $order_date=$row->updated_at;
            $order_date=verta($order_date)->format('Y-m-d');   
            $compaire1=$this->compaire($order_date,$date1);
            $compaire2=$this->compaire($order_date,$date2);
            if(($compaire1==1 or $compaire1==2) and ($compaire2==2 or $compaire2==3)){
                array_push($result_total,$row);
                if($row->status==4){
                    $order_payed=$order_payed+1;
                }
                  $amount_total=$amount_total+$row->amount;
            }
        }
                $response= ['result'=>$result_total,'amount'=>$amount_total,'order_payed'=>$order_payed,'date1'=>$date1,'date2'=>$date2];
                return redirect(Route('admin.show.stat'))->with('response',$response);
            }
            public function showStat(Request $request){
                if($request->session()->exists('response')){
                    $result_total=$request->session()->get('response');
                    $result=$result_total['result'];
                    $amount=$result_total['amount'];
                    $order_payed=$result_total['order_payed'];
                    $start_date=$result_total['date1'];
                    $end_date=$result_total['date2'];
                }
                else{
                    $result=[];
                    $amount=0;
                    $order_payed=0;
                    $start_date=0;
                    $end_date=0;
                }
               
        return view('back.stat.showstat',compact('result','amount','order_payed','start_date','end_date'));
    }
}