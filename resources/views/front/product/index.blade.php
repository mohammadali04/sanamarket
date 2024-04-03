@extends('front.index')
@section('content')

<!-- breadcrumb part start-->
<section class="breadcrumb_part single_product_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>صفحه داخلی محصول</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="product_img_slide owl-carousel" dir="ltr">
                    @foreach($slider as $row)
                    <div class="single_product_img">
                        <img src="{{$row->img}}" alt="#" class="img-fluid">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-8">
                @include('layouts.messages')
                <div class="single_product_text text-center">
                    <h3>{{$product->title}}</h3>
                    <p>
                        {{strip_tags($product->description)}} </p>
                    <form action="{{Route('add.basket',$product->slug)}}" method="POST">
                        @csrf
                        <div class="card_area">
                            <div class="product_count_area">
                                <p>تعداد</p>
                                <div class="product_count d-inline-block">
                                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input id="basket_count_value" class="product_count_item input-number" type="text"
                                        name="tedad" value="1" min="0" max="10">
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <p>{{$product->price}} تومان</p>
                            </div>
                            <div class="add_to_cart">
                                <button type="submit" class="btn_3">اضافه کردن به سبد خرید</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->
<!-- subscribe part here -->
<section class="subscribe_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="subscribe_part_content">
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
<!-- subscribe part end -->
<!-- users commnets -->

<!-- section for comment -->
<section style="background-color: #d94125;">
    <div class="container my-5 py-5 text-dark">
        @include('layouts.messages')
        <div class="pt-5">
            <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">به ما پیام دهید</h3>
                <form class="p-5 bg-light" action="{{route('comment.store',$product->slug)}}" method="POST">
                    @csrf
                    @auth
                    <div class="form-group">
                        <label for="name">اسم *</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{Auth::user()->name}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    </div>
                    <div class="form-group">
                        <label for="email">ایمیل *</label>
                        <input type="email" id="email" class="form-control" name="email"
                            value="{{Auth::user()->email}}">
                    </div>
                    @else
                    <div class="form-group">
                        <label for="name">اسم *</label>
                        <input type="text" id="name" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">ایمیل *</label>
                        <input type="email" id="email" class="form-control" name="email">
                        <input type="hidden" name="status" value="0">
                    </div>
                    @endauth
                    <div class="form-group">
                        <label for="message">پیام</label>
                        <textarea class="form-control" rows="10" cols="30" id="message" name="body"></textarea>
                        <input name="product_id" value="{{$product->id}}" type="hidden">
                        <input type="hidden" name="status" value="0">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="ثبت نظر">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<section style="background-color: #ad655f;">
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card text-dark">
                    <style>
                    .name-user-style {
                        border: 1px solid gray;
                        border-radius: 50px;
                        font-weight: bold;
                        height: 60px !important;
                        line-height: 50px;
                        margin: 5px;
                        text-align: center;
                        width: 60px !important;

                    }
                    </style>
                    <p style="margin:20px" class="fw-light mb-4 pb-2">نظرات کاربران</p>
                    @foreach($comments as $comment)
                    <div class="card-body p-4">
                        <div class="d-flex flex-start">

                            <span class="name-user-style">
                                @php
                                $names=explode(' ',$comment->name);
                                foreach($names as $key=>$name){
                                $first = mb_substr(strip_tags($names[$key]),0,1,'utf8');
                                $names[$key]=$first;
                                }
                                $total=implode(' ',$names);
                                echo $total;
                                @endphp
                            </span>
                            <div>
                                <h6 class="fw-bold mb-1">
                                    {{$comment->name}}
                                </h6>
                                <div class="d-flex align-items-center mb-3">
                                    <p class="mb-0">
                                        {{$comment->created_at}}
                                        <!-- users commnets <span class="badge bg-primary">Pending</span> -->
                                    </p>
                                </div>
                                <p class="mb-0">
                                    {{$comment->body}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection