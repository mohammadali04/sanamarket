@extends('back.index')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">صفحه ی ویرایش دسته</h4>
            <p class="card-description">
                دسته ی {{$category->title}}
            </p>
            <form class="forms-sample" action="{{Route('admin.category.update',$category->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">دسته ی والد</label>
                    <select class="form-control" name="parent">
                        <option value="0">هیچکدام</option>
                        @foreach($categories as $row)
                        @php
                        if($row->id==$category->parent){
                        $x='selected';
                        }else{
                            $x=' ';
                        }
                        @endphp
                        <option value="{{$row->id}}" {{$x}}>{{$row->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">نام دسته</label>
                    <input name="title" value="{{$category->title}}">
                </div>
                <button class="btn btn-primary me-2" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection