@extends('back.index')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            @include('layouts.messages')
            <h4 class="card-title">Default form</h4>
            <p class="card-description">
                Basic form layout
            </p>
            <form class="forms-sample" action="{{Route('admin.product.update',$product->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" class="form-control" name="title" value="{{$product->title}}">
                </div>
                <div class="form-group">
                    <label for="name">شاخص</label>
                    <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
                </div>
                <div class="form-group">
                    <label for="name">نام دسته</label>
                    <select class="form-control" name="cat_id">
                        @foreach($categories as $category)
                        @php if($product->cat_id==$category->id){
                            $x='selected';
                        }
                        else{
                            $x='';
                        }

                        @endphp
                        <option value="{{$category->id}}" {{$x}}>{{$category->title}}</option>
                       @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">توضیحات</label>

                    <textarea class="form-control" name="description" id="summernote">{{$product->description}}</textarea>

                </div>
                <div class="form-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="img" value="{{$product->img}}">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
                <div class="form-group">
                    <label for="name">قیمت</label>
                    <input type="text" class="form-control" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="name">وزن</label>
                    <input type="text" class="form-control" name="weight" value="{{$product->weight}}">
                </div>
                <div class="form-group">
                    <label for="name">تخفیف</label>
                    <input type="text" class="form-control" name="discount" value="{{$product->discount}}">
                </div>
                <div class="form-group">
                    <label for="name">وضعیت</label>
                    <select class="form-control" name="status">
                        @php
                        if($product->status=1){
                            $x='selected';
                        }else{
                            $x='';
                        }

                        @endphp
                        <option value="0">ناموجود</option>
                        <option value="1" {{$x}}>موجود</option>
                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">محصول ویژه</label>
                    <select class="form-control" name="special">
                        @php
                        if($product->speial=1){
                            $x='selected';
                        }else{
                            $x='';
                        }
                        @endphp
                        <option value="0" {{$x}}>غیر ویژه</option>
                        <option value="1" {{$x}}>ویژه</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">بازدید</label>
                    <input type="text" class="form-control" name="hit" value="{{$product->hit}}">
                </div>
                <button class="btn btn-primary me-2" type="submit">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
