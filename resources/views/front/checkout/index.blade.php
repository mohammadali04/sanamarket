@extends('front.index')
@section('content')
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>چک کردن نهایی</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="checkout_area section_padding">
    <div class="container">
        <div class="returning_customer">
            <div class="check_title">
                <h2>
                    قبلا خرید داشته اید؟
                    <a href="#">برای ورود اینجا کلیک کنید</a>
                </h2>
            </div>
            <p>
                اگر تجربه خرید با ما را داشته اید، لطفا جزئیات آن را در کادر زیر وارد کنید. اگر اولین تجربه خرید شماست،
                به قسمت ارسال کالا و پرداخت بروید.
            </p>
            <form novalidate="novalidate" method="post" action="#" class="row contact_form">
                <div class="col-md-6 form-group p_star">
                    <input type="text" value=" " name="name" id="name" class="form-control">
                    <span data-placeholder="نام کاربری یا ایمیل" class="placeholder"></span>
                </div>
                <div class="col-md-6 form-group p_star">
                    <input type="password" value="" name="password" id="password" class="form-control">
                    <span data-placeholder="رمز عبور" class="placeholder"></span>
                </div>
                <div class="col-md-12 form-group">
                    <button class="btn_3" value="submit" type="submit">
                        ورود
                    </button>
                    <div class="creat_account">
                        <input type="checkbox" name="selector" id="f-option">
                        <label for="f-option">مرا به خاطر بسپار</label>
                    </div>
                    <a href="#" class="lost_pass">آیا رمز عبور خود را فراموش کرده اید؟</a>
                </div>
            </form>
        </div>
        <div class="cupon_area">
            <div class="check_title">
                <h2>
                    آیا کد تخفیف دارید؟
                    <a href="#">کد خود را اینجا وارد کنید</a>
                </h2>
            </div>
            <style>
            #discount-code.green {
                border: 2px solid green;
            }

            #discount-code.red {
                border: 2px solid red;
            }
            </style>
            <input name="code" id="discount-code" type="text" placeholder="کد تخفیف را وارد کنید">
            <a class="tp_btn" onclick="checkCode()">درج کد تخفیف</a>
            <script>
            function checkCode() {
                var tag = $('#discount-code');
                var code = tag.val();
                var url = '{{Route('check.discount.code')}}';
                var data = {
                    '_token': '{{csrf_token()}}',
                    'code': code
                };
                $.post(url, data, function(msg) {
                    console.log(msg);
                    if (msg[0] != 0) {
                        tag.addClass('green');
                    } else {
                        tag.addClass('red');
                    }
                    $('#totalprice').html(msg[1]);
                    $('#amount-for-pay').val(msg[1]);
                }, 'json');
            }

            function calculateTotalPrice() {
                var url = '{{Route('calculate.total.price')}}';
                var tag = $('#discount-code');
                var code = tag.val();
                var data = {
                    '_token': '{{csrf_token()}}',
                    'code': code
                };
                $.post(url, data, function(msg) {
                    $('#totalprice').text(msg);
                    $('#amount-for-pay').val(msg);
                });
            }
            calculateTotalPrice();
            </script>
        </div>
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>جزئیات صورتحساب</h3>
                    <form action="" novalidate="novalidate" method="post" action="#" class="row contact_form">
                        @csrf
                        <div class="col-md-6 form-group p_star">
                            <input type="text" name="name" id="first" class="form-control">
                            <span data-placeholder="نام" class="placeholder"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" name="name" id="last" class="form-control">
                            <span data-placeholder="نام خانوادگی" class="placeholder"></span>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" placeholder="نام شرکت" name="company" id="company" class="form-control">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" name="number" id="number" class="form-control">
                            <span data-placeholder="شماره تلفن" class="placeholder"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" name="compemailany" id="email" class="form-control">
                            <span data-placeholder="ایمیل" class="placeholder"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" name="add1" id="add1" class="form-control">
                            <span data-placeholder="آدرس" class="placeholder"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" name="add2" id="add2" class="form-control">
                            <span data-placeholder="آدرس" class="placeholder"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" name="city" id="city" class="form-control">
                            <span data-placeholder="شهر" class="placeholder"></span>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" placeholder="کدپستی" name="zip" id="zip" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" name="selector" id="f-option2">
                                <label for="f-option2">ایجاد حساب کاربری</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <h3>جزئیات صورتحساب</h3>
                                <input type="checkbox" name="selector" id="f-option3">
                                <label for="f-option3">ارسال به آدرس جدید؟</label>
                            </div>
                            <textarea placeholder="یادداشت مربوط به سفارش" rows="1" id="message" name="message"
                                class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <form action="{{Route('save.order')}}" method="post">
                            @csrf
                            <h2>سفارش شما</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">محصولات
                                        <span>مجموع</span>
                                    </a>
                                </li>
                                @foreach($baskets as $basket)
                                @php
                                $tedad=$basket->tedad;
                                $price=$basket->price;
                                $discount=$basket->discount;
                                $discount_amount_for_one=($price*$discount)/100;
                                $discount_amount_on_tedad=$tedad*$discount_amount_for_one;
                                $price_on_tedad=$tedad*$price;
                                @endphp
                                <li>
                                    <a href="#">
                                        <span class="first">{{$price_on_tedad-$discount_amount_on_tedad}} تومان</span>
                                        <span class="last">{{$basket->title}}</span>
                                        <span class="middle">{{$basket->tedad}} عدد</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">مجموع خرید با تخفیف
                                        <span style="margin-left:5px">{{$totalPrice-$totalDiscount}} تومان </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">هزینه ارسال
                                        <span style="margin-left:5px"> @php if(session('post_price')){
                                            echo $postPrice=session('post_price');
                                            }; @endphp تومان </span>
                                        <input type="hidden" name="post_price" value="10000">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">مبلغ قابل پرداخت
                                        <span id="totalprice"
                                            style="margin-left:5px">{{$totalPrice-$totalDiscount+$postPrice}}
                                            تومان</span>
                                        <input id="amount-for-pay" type="hidden" name="amount"
                                            value="{{$totalPrice-$totalDiscount+$postPrice}}">
                                    </a>
                                </li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" name="pay_type" value="1" id="f-option5">
                                    <label for="f-option5">کارت به کارت</label>
                                    <div class="check"></div>
                                </div>
                                <p>
                                    لطفا یک چک به نام مغازه و به آدرس شهر و کشور و کدپستی مغازه بفرستید.
                                </p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" name="pay_type" value="2" id="f-option6">
                                    <label for="f-option6">درگاه بانک </label>
                                    <img alt="" src="img/product/single-product/card.jpg">
                                    <div class="check"></div>
                                </div>
                                <p>
                                    لطفا یک چک به نام مغازه و به آدرس شهر و کشور و کدپستی مغازه بفرستید.
                                </p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" name="accept" value="1" id="f-option4">
                                <label for="f-option4">شرایط را خوانده و قبول دارم </label>
                                <a href="#">ضوابط و شرایط*</a>
                            </div>
                            <button type="submit" class="btn_3">رفتن به درگاه بانک</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection