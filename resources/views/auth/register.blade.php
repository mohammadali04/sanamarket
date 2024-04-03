@extends('front.index')
@section('content')
<style>
    #login{
        color:#4B3049!important;
    }
</style>
<div id="login" style="color:#4B3049">
        <h3 class="text-center text-white pt-5">فرم ثبت نام</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{Route('register')}}" method="post">
                            @csrf
                            <h3 class="text-center text-info">ثبت نام</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">نام:</label><br>
                                <input type="name"  name="name" value="{{old('email')}}"  id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">ایمیل:</label><br>
                                <input type="email"  name="email" value="{{old('email')}}"  id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">کلمه عبور:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">تکرار کلمه عبور:</label><br>
                                <input type="password"  name="password_confirmation"  id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span></span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="" class="btn btn-info btn-md" value="ثبت نام">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection