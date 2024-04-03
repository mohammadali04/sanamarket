@extends('back.index')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            @include('layouts.messages')
            <h4 class="card-title">افزودن اسلایدر</h4>
            
            <form class="forms-sample" action="{{Route('admin.slider.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">نام محصول</label>
                    <label for="name" style="font-weight:bold;color:red;margin-right:20px"> {{$product->title}}</label>
                    <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">
                </div>
                <div class="form-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="img" value="{{old('img')}}">
                    <img id="holder" style="margin-top:15px;max-height:100px;"> 
                </div>
                <button class="btn btn-primary me-2" type="submit">ارسال</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection