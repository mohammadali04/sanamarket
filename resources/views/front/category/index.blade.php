@extends('front.index')
@section('content')
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>لیست محصولات</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product_list section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="product_sidebar">
                    <div class="single_sedebar">
                        <form id="search_form" action="{{Route('search')}}" method="POST">
                            @csrf
                            <input type="text" placeholder="جست و جو" name="keyword" id="key">
                            <i class="ti-search"></i>
                            <button type="submit">search</button>
                        </form>
                    </div>

                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">دسته ها <i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown" style="display: none;">
                                @php
                                use App\Models\front\Category;
                                $categories=Category::all();
                                @endphp
                                @foreach($categories as $category)
                                <p><a href="#">{{$category->title}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">مدل <i class="right fa-caret-down fas"></i> </div>
                            <div class="select_option_dropdown" style="display: none;">
                                <p><a href="#">مدل 1</a></p>
                                <p><a href="#">مدل 2</a></p>
                                <p><a href="#">مدل 3</a></p>
                                <p><a href="#">مدل 4</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="product_list">
                    <div class="row">
                        @foreach($products as $row)
                        <div class="col-lg-6 col-sm-6">
                            <div class="single_product_item">
                                <img class="img-fluid" alt="" src="{{$row->img}}">
                                <h3> <a href="{{Route('product.index',$row->slug)}}">{{$row->title}}</a> </h3>
                                <p>شروع قیمت از {{$row->price}} تومان</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="load_more_btn text-center" style="text-align:center">
                        {{ $products->links() }}
                    </div>
                    <div class="load_more_btn text-center">
                        <a class="btn_3" href="#">جزئیات بیشتر</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection