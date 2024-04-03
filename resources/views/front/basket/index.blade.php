@extends('front.index')
@section('content')
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>سبد خرید</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section dir="rtl" class="cart_area section_padding">
    <div class="container">
        <div class="cart_inner">
            @include('layouts.messages')
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">محصول</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">تخقیف برای هر قلم</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">جمع کل</th>
                            <th scope="col">جمع کل با تخفیف</th>
                            <th scope="col">بروزرسانی</th>
                            <th scope="col">حذف سفارش</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($baskets as $basket)
                      <form action="{{Route('update.basket',$basket->basket_id)}}" method="POST">
                         @csrf
                            <tr class="tr-row">
                                <td>
                                    <div class="media">
                                        @php
                                        $tedad=$basket->tedad;
                                        $price=$basket->price;
                                        $discount=$basket->discount;
                                        $discount_amount_for_one=($price*$discount)/100;
                                        $discount_amount_on_tedad=$tedad*$discount_amount_for_one;
                                        $price_on_tedad=$tedad*$price;
                                        @endphp
                                        <div class="d-flex">
                                            <img alt="" src="{{$basket->img}}">
                                        </div>
                                        <div class="media-body">
                                            <p>{{$basket->title}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{$price}} تومان</h5>
                                </td>
                                <td>
                                    <h5>{{$discount_amount_for_one}} تومان</h5>
                                </td>
                                <td>
                                    <div dir="ltr" class="product_count">
                                        <!-- <input type="text" value="1" min="0" max="10" title="Quantity:"
                      class="input-text qty input-number" />
                    <button
                      class="increase input-number-increment items-count" type="button">
                      <i class="ti-angle-up"></i>
                    </button>
                    <button
                      class="reduced input-number-decrement items-count" type="button">
                      <i class="ti-angle-down"></i>
                    </button> -->
                                        <span class="input-number-decrement input-button-span" onclick="setVal(this)"> <i class="ti-minus"></i></span>
                                        <input name="tedad" type="text" max="10" min="0" value="{{$basket->tedad}}"
                                            class="input-number">
                                        <span class="input-number-increment input-button-span" onclick="setVal(this)"> <i class="ti-plus"></i></span>
                                        <script>
                                            function setVal(tag){
                                                var value_input=$(tag).parents('td').find('.input-number').val();
                                                $(tag).parents('td').find('.input-number').setVal(value_input);
                                            }

                                            </script>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{$price_on_tedad}} تومان</h5>
                                </td>
                                <td>
                                    <h5>{{$price_on_tedad-$discount_amount_on_tedad}} تومان</h5>
                                </td>
                                <td>
                                    <button type="submit"  style="color:blue">بروزرسانی</button>
                                </td>
                                <td>
                                    <a href="{{Route('destroy.basket',$basket->basket_id)}}" style="color:red">حذف</a>
                                </td>
                            </tr>
</form>
                            @endforeach
                        <tr class="bottom_button">
                            <td>
                                <a href="#" class="btn_1">اضافه کردن به سبد</a>
                            </td>

                            <td>
                                <div class="cupon_text float-right">
                                    <a href="#" class="btn_1">اعمال تغییرات سبد خرید</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>مجموع</h5>
                            </td>
                            <td>
                                <h5>{{$totalPrice}} تومان</h5>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>مجموع تخفیف</h5>
                            </td>
                            <td>
                                <h5>{{$totalDiscount}} تومان</h5>
                            </td>
                        </tr>
                        <tr dir="ltr" class="shipping_area">
                            
                            <td></td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <form id="basket-form" action="" method="POST">
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li>
                                            تعرفه ثابت: 30000 تومان
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li>
                                            ارسال کالای رایگان
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li>
                                            تعرفه ثابت: 30000 تومان
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li class="active">
                                            تحویل محلی: 20000 تومان
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                    </ul>
                                    <h6>
                                        هزینه ارسال کالا
                                        <i aria-hidden="true" class="fa fa-caret-down"></i>
                                    </h6>
                                    <select class="shipping_select" style="display: none;">
                                        <option>استان مبدا</option>
                                    </select>
                                    <div class="nice-select shipping_select" tabindex="0"><span
                                            class="current">استان مبدا</span>
                                        <ul id="source" class="list">
                                            @foreach($states as $key=>$state)
                                            <li data-value="{{$state}}" name="source_state" class="option">{{$key}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <select class="shipping_select section_bg" style="display: none;">
                                    </select>
                                    <div class="nice-select shipping_select section_bg" tabindex="0"><span
                                            class="current">استان مفصد</span>
                                        <ul id="target" class="list">
                                            @foreach($states as $key => $state)
                                            <li data-value="{{$state}}" class="option">{{$key}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <input id="code-posti-input" type="text" placeholder="کدپستی" class="post_code">
                                    <input id="total-weight" type="hidden" name="total-weight" value="{{$totalWeight}}">
                                    <span class="btn_1 w-25" type="submit" onClick="submitBasket()" style="float:right;padding:10px 20px;cursor:pointer">محاسبه</span></span>
                                    <td></td>
                                </div>
                            </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="checkout_btn_inner float-right">
                    <a href="{{Route('checkout.checkout')}}" class="btn_1">ادامه خرید</a>
                    <a href="{{Route('search.index')}}" class="btn_1 checkout_btn_1">رفتن به صقحه جست و جو </a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    
    function submitBasket(){
        var data=$('#basket-form').serializeArray();
        var source=$('#source .selected').attr('data-value');
        var target=$('#target .selected').attr('data-value');
        var code_posti=$('#code-posti-input').val();
        var total_weight=$('#total-weight').val();
        var data={'source_state':source,'target_state':target,'code_posti':code_posti,'total_weight':total_weight,'_token':'{{csrf_token()}}'};
        var url='{{Route('post.price')}}';
        $.post(url,data,function(msg){
             $('.post-price-parag').remove();
             if(msg[0]==0){
                $('.shipping_box').append('<p class="post-price-parag" style="float:right;margin-right:3px;color:red">'+msg[1]+'</p>');
            }else{
                $('shipping_box').append('<p class="post-price-parag" style="float:right;margin-right:10px;color:blue">:هزینه ی پست</p>');
                $('.shipping_box').append('<p class="post-price-parag" style="float:right;margin-right:3px;color:green">'+msg+'</p>');
                $('.shipping_box').append('<p class="post-price-parag" style="float:right;margin-right:3px;color:red">تومان</p>');
            }
        });
    }
</script>
@endsection