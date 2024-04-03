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
                            <h4 class="card-title card-title-dash">صفحه مدیریت محصولات</h4>
                        </div>
                        <div>
                            <a onclick="submitForm()" type="button"
                                class="btn btn-primary btn-lg text-white mb-0 me-0"  style="background:red"><i
                                    class="mdi mdi-account-plus"></i>حذف</a>
                        </div>
                    </div>

                    <div class="table-responsive  mt-1">
                        <table class="table select-table">
                            <thead>
                                <tr>
                                    </th>
                                    <th>کد</th>
                                    <th>تحویل گیرنده</th>
                                    <th>مبلغ</th>
                                    <th>استان</th>
                                    <th>شهر</th>
                                    <th>ویرایش</th>
                                    <th>انتخاب</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{Route('admin.product.destroy')}}" method="get">
                                    @csrf
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            {{$order->id}}
                                        </td>
                                        <td>
                                            {{$order->family}}
                                        </td>
                                        <td>
                                            {{$order->amount}}
                                        </td>
                                        <td>
                                            {{$order->ostan}}
                                        </td>
                                        <td>
                                            {{$order->city}}
                                        </td>
                                        <td><a href="{{Route('admin.order.edit',$order->id)}}">ویرایش</a></td>
                                        <td>
                                            <div class="form-check form-check-flat mt-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="ids[]" value="{{$order->id}}"
                                                        aria-checked="false" class="form-check-input"><i
                                                        class="input-helper"></i></label>
                                            </div>
                                        </td>
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
<script>
function submitForm() {
    $('form').submit();
}
</script>