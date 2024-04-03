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
                            <h4 class="card-title card-title-dash">صفحه مدیریت بنر</h4>
                        </div>
                        <div>
                            <a href="{{Route('admin.baner.create')}}" type="button"
                                class="btn btn-primary btn-lg text-white mb-0 me-0"><i
                                    class="mdi mdi-account-plus"></i>افزودن بنر جدید</a>
                            <a onclick="submitForm()" type="button" class="btn btn-primary btn-lg text-white mb-0 me-0"
                                style="background:red"><i class="mdi mdi-account-plus"></i>حذف</a>
                        </div>
                    </div>
                    <style>
                    .img-td-baner {
                        width: 100px !important;
                        height: 50px !important;
                    }
                    </style>
                    <div class="table-responsive  mt-1">
                        <table class="table select-table">
                            <thead>
                                <tr>
                                    </th>
                                    <th>کد</th>
                                    <th>نام</th>
                                    <th>توضیحات</th>
                                    <th>تصویر</th>
                                    <th>ویرایش</th>
                                    <th>انتخاب</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{Route('admin.baner.destroy')}}" method="get">
                                    @csrf
                                    @foreach($baners as $baner)
                                    <tr>
                                        <td>
                                            {{$baner->id}}
                                        </td>
                                        <td>
                                            {{$baner->title}}
                                        </td>
                                        <td>
                                        @php echo mb_substr($baner->description,0,60).'...' @endphp
                                        </td>
                                        <td>
                                            <img class="img-td-baner" src="{{$baner->img}}">
                                        </td>
                                        <td><a href="{{Route('admin.baner.edit',$baner->id)}}">ویرایش</a></td>
                                        <td>
                                            <div class="form-check form-check-flat mt-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="ids[]" value="{{$baner->id}}"
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