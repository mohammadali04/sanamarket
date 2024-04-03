@extends('back.index')
@section('content')
<div class="main-panel">
    <div class="row flex-grow">
        <div class="col-10 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    @include('layouts.messages')
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">آمار سفارشات در بازه ی زمانی:{{$start_date}} تا
                                {{$end_date}}</h4>
                            </div>
                            <div>
                                <p>تعداد کل صفارشات:{{sizeof($result)}}</p>
                                <p>تعداد صفارشات پرداخت شده:{{$order_payed}}</p>
                                @php
                                if(sizeof($result)==0){
                                $size_of_result=1;
                                }else{
                                    $size_of_result=sizeof($result);
                                }
                                @endphp
                            <p>درصد سفارشات پرداخت شده:{{($order_payed/$size_of_result)*100}}</p>
                            <p>مبلغ کل فروش:{{$amount}}</p>
                        </div>
                    </div>
                    <div class="table-responsive  mt-1">
                        <table class="table select-table">
                            <thead>
                                <tr>
                                    </th>
                                    <th>کد</th>
                                    <th>تاریخ</th>
                                    <th>تحویل گیرنده</th>
                                    <th>مبلغ کل</th>
                                    <th>استان</th>
                                    <th>شهر</th>
                                    <th>جزییات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $row)
                                <tr>
                                    <td>
                                        {{$row->id}}
                                    </td>
                                    <td style="direction:rtl">
                                        {{verta($row->updated_at)}}
                                    </td>
                                    <td>
                                        {{$row->family}}
                                    </td>
                                    <td>
                                        {{$row->amount}}
                                    </td>
                                    <td>
                                        {{$row->ostan}}
                                    </td>
                                    <td>
                                        {{$row->city}}
                                    </td>
                                    <td><a href="{{Route('admin.order.edit',$row->id)}}">ویرایش</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('back.footer')
    <!-- partial -->
</div>
@endsection