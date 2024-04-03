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
            <style>
            .date-title {
                border: 1px solid green;
                border-radius: 4px;
                padding: 0 7px;
            }

            select {
                border: 1px solid green;
                border-radius: 4px;
            }
            </style>
            <form class="forms-sample" action="{{Route('admin.process.stat')}}" method="POST">
                @csrf
                <div class="form-group">
                    <lable class="date-title" for="name" style="margin-left:15px">تاریخ شروع</lable class="date-title">
                    <lable class="date-title" for="name" style="">روز</lable class="date-title">
                    <select name="start_day" style="margin-left:15px">
                        @for($i=1 ; $i<32 ; $i++)
                        <option value="{{$i}}">
                            {{$i}}
                            </option>
                            @endfor
                    </select>
                    <lable class="date-title" for="name" style="">ماه</lable class="date-title">
                    <select name="start_mounth" style="margin-left:15px">
                        @for($i=1;$i<13;$i++) <option value="{{$i}}">
                            {{$i}}
                            </option>
                            @endfor
                    </select>
                    <lable class="date-title" for="name" style="">سال</lable class="date-title">
                    <select name="start_year" style="margin-left:15px">
                        @for($i=1400;$i<1403;$i++) <option value="{{$i}}">
                            {{$i}}
                            </option>
                            @endfor
                    </select>
                </div>
                <div class="form-group">
                    <lable class="date-title" for="name" style="margin-left:15px">تاریخ پایان</lable class="date-title">
                    <lable class="date-title" for="name" style="">روز</lable class="date-title">
                    <select name="end_day" style="margin-left:15px">
                        @for($i=1 ; $i<32 ; $i++) @endphp <option value="{{$i}}">
                            {{$i}}
                            </option>
                            @endfor
                    </select>
                    <lable class="date-title" for="name" style="">ماه</lable class="date-title">
                    <select name="end_mounth" style="margin-left:15px">
                        @for($i=1;$i<13;$i++) <option value="{{$i}}">
                            {{$i}}
                            </option>
                            @endfor
                    </select>
                    <lable class="date-title" for="name" style="">سال</lable class="date-title">
                    <select name="end_year" style="margin-left:15px">
                        @php
                        $this_year=verta();
                        $this_year=$this_year->year;
                        @endphp
                        <option value="{{$this_year}}">
                            {{$this_year}}
                        </option>
                    </select>
                </div>
                <button class="btn btn-primary me-2" type="submit">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection