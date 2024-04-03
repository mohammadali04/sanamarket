@extends('back.index')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            @include('layouts.messages')
            <h4 class="card-title"> صفحه جزییات سفارش
            </h4>
            <p class="card-description">
                لطفا جزییات سفارش را با دقت بررسی کنید.
            </p>
            @php
            $created_at=$order->created_at;
            $pasted=time()-strtotime($created_at);
            $mohlat_pay=24*3600;
            @endphp
            <form class="forms-sample" action="{{Route('admin.order.update',$order->id)}}" method="POST">
                @csrf
                <div class="d-sm-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="card-title card-title-dash">جزییات سفارش کد:{{$order->id}}<a
                                href="{{Route('show.factor',$order->id)}}" style="background:blue">مشاهده فاکتور</a>
                        </h4>
                        @if($pasted>$mohlat_pay)
                        <p>این سفارش منقضی شده است.حداکثر مهلت پرداخت،برابر
                            {{'24'}}
                            ساعت می باشد</p>
                        @endif

                    </div>
                    <div>

                    </div>
                </div>
                <div class="table-responsive  mt-1">
                    <table class="table select-table">
                        <thead>
                            <tr>
                                </th>
                                <th>نام محصول</th>
                                <th>تعداد</th>
                                <th>قیمت</th>
                                <th>تخفیف</th>
                            </tr>
                        </thead>
                        <tbody>

                            @csrf
                            @foreach($basket as $row)
                            <tr>
                                <td>
                                    {{$row->title}}
                                </td>
                                <td>
                                    {{$row->tedad}}
                                </td>
                                <td>
                                    {{$row->price*$row->tedad}}
                                </td>
                                <td>
                                    {{(($row->price*$row->discount)/100)*$row->tedad}}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <h4 class="card-title card-title-dash">وضعیت پرداخت:
                    </h4>

                    <select name="status">
                        @foreach($order_status as $row2)
                        <option value="{{$row2->id}}" @if($order->status == $row2->id){{'selected="selected"'}} @endif>
                            {{$row2->title}} </option>
                        @endforeach


                    </select>
                    @if(($pasted<=$mohlat_pay) and $order->status==3)
                        <p>
                            <a class="btn_green" href="checkout/payonline/<?= $order['id'] ?>">
                                پرداخت آنلاین

                            </a>
                            <a class="btn_green" href="checkout/creditcard/<?= $order['id'] ?>">
                                پردخت با کارت
                            </a>

                        </p>
                        @endif
                        <h4 class="card-title card-title-dash">نوع ارسال:{{$order->post_title}}
                        </h4>
                        <h4 class="card-title card-title-dash">شیوه پرداخت:{{$order->pay_title}}
                            {{'شماره کارت:'.$order->pay_card.'- نام بانک:'.$order->bank_name}}
                        </h4>
                        <h4 class="card-title card-title-dash">شیوه پرداخت:{{$order->pay_title}}
                            {{$order->created_at}}
                        </h4>


                </div>
                <div class="table-responsive  mt-1">
                    <table class="table select-table">
                        <thead>
                            <tr>
                                </th>
                                <th>نام گیرنده</th>
                                <th>آدرس</th>
                                <th>شهر</th>
                                <th>کد پستی</th>
                                <th>موبایل</th>
                                <th>تلفن ثابت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @csrf
                            <tr>
                                <td>
                                    {{$order->family}}
                                </td>
                                <td>
                                    <input type="text" name="address" value="{{$order->address}}">
                                </td>
                                <td>
                                    {{$order->city}}
                                </td>
                                <td>
                                    <input type="text" name="code_posti" value=" {{$order->code_posti}}">
                                </td>
                                <td>
                                    <input type="text" name="mobile" value="{{$order->mobile}}">
                                </td>
                                <td>
                                    <input type="text" name="tel" value="{{$order->tel}}">
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary me-2" type="submit">ذخیره اطلاعات</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection