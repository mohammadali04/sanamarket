@extends('back.index')
@section('content')
<div class="main-panel">
    <div class="row flex-grow">
        <div class="col-10 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
@php
$keys=array_keys($order_stat);
$values=array_values($order_stat);
$values=implode(',',$values);

@endphp
<p class="title">
    <a>
        داشبورد
    </a>

    
    </p>
<style>
        #container * {
            direction: ltr;
        }
        </style>
<script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                title: {
                    text: 'نمودار آمار فروش در 7 روز گذشته',
                    x: -20 //center
                },
                subtitle: {
                    text: 'فروشگاه کلیک سایت',
                    x: -20
                },
                xAxis: {
                    categories: [@php foreach ($keys as $date){echo "'$date',";} @endphp]
                },
                yAxis: {
                    title: {
                        text: 'تعداد سفارش'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#f00'
                    }]
                },
                tooltip: {
                    valueSuffix: ''
                },
                
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                
                series: [{
                    name: 'تعداد فروش',
                    data: [{{ $values }}]
                }]
            });
        });
    </script>

    <script src="{{asset('back/highcharts/highcharts.js')}}"></script>
        <script src="{{asset('back/highcharts/exporting.js')}}"></script>
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
