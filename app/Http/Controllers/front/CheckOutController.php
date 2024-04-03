<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\lib\zarinpal;
use App\Models\Address;
use App\Models\front\Code;
use App\Models\front\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\helpers\Shipping;
use Auth;
class CheckOutController extends Controller
{
   
   public function index(){
      $basketInfo=parent::getBasket();
      $baskets=$basketInfo[0];
      $totalPrice=$basketInfo[1];
      $totalDiscount=$basketInfo[2];
      $userId=Auth::user()->id;
      $user=User::where('id',$userId)->get();
      $userAddress=Address::where('user_id',$userId)->get();
     return view('front.checkout.index',compact('baskets','totalPrice','totalDiscount','userAddress'));
   }
   public function checkCode($code){
      $result=Code::where('code',$code)->where('used',0)->where('user_id',Auth::user()->id)->pluck('darsad');
      if(sizeof($result)>0){
        return $result[0];
      }else{
         return 0;
      }
      

   }
   public function checkCodeResponse(Request $request){
$response= $this->checkCode($request->code);
$totalPrice=$this->calculateTotalPrice($request->code);
$responseAll=[$response,$totalPrice];
echo json_encode($responseAll);

   }
   public function calculateTotalPriceAll(Request $request){
      $totalPrice= $this->calculateTotalPrice($request->code);
      return $totalPrice;
   }
   public function calculateTotalPrice($code){
      $request=new Request();
      $basketInfo=parent::getBasket();
      $totalPrice=$basketInfo[1];
      $totalDiscount=$basketInfo[2];
      $totalPriceDiscount=$totalPrice-$totalDiscount;
      // $postPrice=$this->calculatePostPrice();
      if(session('post_price')){
         $postPrice=session()->get('post_price');
      };
      $code=$this->checkCode($code);
      $codeDiscount = 0;
        if ($code != 0) {
            $codeDiscount = ($code * $totalPriceDiscount) / 100;
            $codeDiscount = intval($codeDiscount);
        }
      $totalPriceAll = $totalPriceDiscount-$codeDiscount+$postPrice;
      return $totalPriceAll;
   }
   public function calculatePostPrice(){
      return parent::calculatePostPrice();
   }
   public function saveOrder(Request $request){
      
      // $order = new zarinpal();
      // $res = $order->pay($request->price,"myroxo24@gmail.com","0912111111");
      // return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
      $userId=Auth::user()->id;
      $addressInfo=Address::where('user_id',$userId)->get();
      $addressInfo=$addressInfo[0];
      if(isset($request->accept))
      {
      $basketInfo=parent::getBasket();
      $basket=$basketInfo[0];
      $basket=serialize($basket);
   $ostan=$addressInfo['ostan'];
   $city=$addressInfo['city'];
   $family=$addressInfo['family'];
   $code_posti=$addressInfo['post_code'];
   $mobile=$addressInfo['mobile'];
   $tel=$addressInfo['tel'];
   $address=$addressInfo['address'];
   $amount=$request->amount;
   $post_type=1;
   $postPrice=$request->post_price;
   $userId=Auth::user()->id;
   $status=1;
   $payType=$request->pay_type;
   $orderObject=new Order();
   $orderObject->create(['family'=>$family,'ostan'=>$ostan,'city'=>$city,'code_posti'=>$code_posti,'mobile'=>$mobile,'tel'=>$tel,'address'=>$address,'basket'=>$basket,'amount'=>$amount,'post_type'=>$post_type,'post_price'=>$postPrice,'user_id'=>$userId,'status'=>$status,'pay_type'=>$payType]);
      }
      else{
         $msg='لطفا قوانین را خوانده و تیک مربوطه را بزنید';
         return redirect()->back()->with('warning',$msg);
      }
   }
   public function add_order(Request $request)
    {

        $order = new zarinpal();
        $res = $order->pay($request->price,"myroxo24@gmail.com","0912111111");
        return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);

    }
}