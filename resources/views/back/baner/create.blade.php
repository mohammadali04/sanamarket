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
            <form class="forms-sample" action="{{Route('admin.baner.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" class="form-control" name="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="name">توضیحات</label>

                    <textarea class="form-control" name="description" id="summernote">{{old('description')}}</textarea>

                </div>
                <div class="form-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="img" value="{{old('img')}}">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;"> 
                <button class="btn btn-primary me-2" type="submit">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection