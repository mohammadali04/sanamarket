@extends('front.index')
@section('content')
<section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>{{$baner->title}}</h1>
                            <p>{{strip_tags($baner->description)}}</p>
                            <a href="product_list.html" class="btn_1">همین الان خرید کنید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_img" >
            <img src="{{$baner->img}}" alt="#" class="img-fluid" >
            <img src="/img/banner_pattern.png " alt="#" class="pattern_img img-fluid">
        </div>
    </section>
    <!-- banner part start-->

    <!-- product list start-->
    <section class="single_product_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($specialList as $row)
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="{{$row->img}}" class="img-fluid" alt="#">
                                    <img src="/img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>شروع قیمت از {{$row->price}} تومان</h5>
                                    <h2> <a href="single-product.html"></a> {{$row->title}}</h2>
                                    <a href="{{Route('product.index',$row->id)}}" class="btn_3">{{strip_tags($row->description)}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- product list end-->


    <!-- trending item start-->
    <section class="trending_items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>محصولات جدید</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($newestProducts as $row)
                <div class="col-lg-4 col-sm-6">
                    <div class="single_product_item">
                        <div class="single_product_item_thumb">
                            <img src="{{$row->img}}" alt="#" class="img-fluid">
                        </div>
                        <h3> <a href="{{Route('product.index',$row->slug)}}">{{$row->title}}
                        </a> </h3>
                        <p>شروع قیمت از {{$row->price}} تومان</p>
                    </div>
                </div>   
                @endforeach
            </div>
        </div>
    </section>
    <!-- trending item end-->

    <!-- client review part here -->
    <section class="client_review " style="direction: ltr">
        <div class="container" >
            <div class="row justify-content-center" >
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel " >
                        <div class="single_client_review" dir="rtl" >
                            <div class="client_img" >
                                <img src="/img/client.png" alt="#">
                            </div>
                            <p >"استفاده از بالش های طبی را در سفرهای طولانی مدت پیشنهاد می کنم.</p>
                            <h5  >- رضا محمدی</h5>
                        </div>
                        <div class="single_client_review" dir="rtl">
                            <div class="client_img">
                                <img src="/img/client_1.png" alt="#">
                            </div>
                            <p >"برای جلوگیری از گردن درد گزینه های مناسبی هستند.</p>
                            <h5 >- امیر امیری</h5>
                        </div>
                        <div class="single_client_review" dir="rtl">
                            <div class="client_img">
                                <img src="/img/client_2.png" alt="#">
                            </div>
                            <p >"برای نشستن های طولانی مدت روی مبل قابل قبول اند.</p>
                            <h5 >- محمد موسوی</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->


    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">
                        <h3>با استفاده از مواد ارگانیک، محصولات استانداردی در اینجا تولید می شود.</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>شرکت ما با بهره گیری از استراتژی های مختلف و استفاده از مواد ارگانیک و طبیعی سعی در تولید محصولاتی با کیفیت و مطابق نیاز شما دارد.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="/img/icon/feature_icon_1.svg" alt="#">
                        <h4>پشتیبانی کارت های اعتباری</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="/img/icon/feature_icon_2.svg" alt="#">
                        <h4>سفارش آنلاین</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="/img/icon/feature_icon_3.svg" alt="#">
                        <h4>تحویل رایگان</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="/img/icon/feature_icon_4.svg" alt="#">
                        <h4>محصولات همراه با جایزه</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature part end -->

    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content" style="direction: rtl">
                        <h2>به روز رسانی و مطالب پیشرفته!</h2>
                        <p>ما سعی در ارائه محصولات با کیفیت تر و با دوام تر با توجه با استانداردهای روز جهان داریم .</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="ایمیل خود را وارد کنید">
                            <a href="#" class="btn_1">تایید پرداخت</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection