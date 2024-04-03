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
            <form class="forms-sample" action="{{Route('admin.user.update',$user->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" class="form-control" name="name" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="name">وضعیت</label>
                    <select class="form-control" name="status">     
                        <option value="0">منتشر نشده</option>
                        @php if(($user->status)==1){
                            $x='selected';
                        }else{
                            $x='';
                        }
                        @endphp
                        <option value="1" {{$x}}>منتشر شده</option>
                    </select>
                </div>
                <button class="btn btn-primary me-2" type="submit">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
