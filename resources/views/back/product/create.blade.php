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
            <form class="forms-sample" action="{{Route('admin.product.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" class="form-control" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="name">شاخص</label>
                    <input type="text" class="form-control" name="slug" value="{{old('slug')}}" class="form-control @error('slug') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="name">نام دسته</label>
                    <select class="form-control" name="cat_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                       @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">توضیحات</label>

                    <textarea class="form-control" name="description" id="summernote" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>

                </div>
                <div class="form-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="img" value="{{old('img')}}" class="form-control @error('img') is-invalid @enderror">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
                <div class="form-group">
                    <label for="name">قیمت</label>
                    <input type="text" class="form-control" name="price" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="name">وزن</label>
                    <input type="text" class="form-control" name="weight" value="{{old('wieght')}}" class="form-control @error('weight') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="name">تخفیف</label>
                    <input type="text" class="form-control" name="discount" value="{{old('discount')}}" class="form-control @error('discount') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="name">وضعیت</label>
                    <select class="form-control" name="status">
                        <option value="1">موجود</option>
                        <option value="0">ناموجود</option>
                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">محصول ویژه</label>
                    <select class="form-control" name="special">
                        <option value="1">ویژه</option>
                        <option value="0">غیر ویژه</option>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">بازدید</label>
                    <input type="text" class="form-control" name="hit" value="{{old('hit')}}" class="form-control @error('hit') is-invalid @enderror">
                </div>
                <button class="btn btn-primary me-2" type="submit">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection