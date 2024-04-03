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
                                    <th>نویسنده</th>
                                    <th>برای محصول</th>
                                    <th>تاریخ ثبت</th>
                                    <th>وضعیت</th>
                                    <th>خلاصه نظر</th>
                                    <th>ویرایش</th>
                                    <th>انتخاب</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{Route('admin.product.destroy')}}" method="get">
                                    @csrf
                                    @foreach($comments as $comment)
                                    <tr>
                                        <td>
                                            {{$comment->id}}
                                        </td>
                                        <td>
                                            {{$comment->user->name}}
                                        </td>
                                        <td>
                                            {{$comment->product->title}}
                                        </td>
                                        <td>
                                            {{$comment->created_at}}
                                        </td>
                                        <td>
                                        @php echo mb_substr($comment->body,0,60).'...' @endphp
                                        </td> 
                                        @switch($comment->status)
                                        @case(1)
                                        @php
                                        $url=Route('admin.comment.status',$comment->id);
                                        $status='<a href="'.$url.'" class="badge badge-success">فعال</a>';
                                        @endphp
                                        @break
                                        @case(0)
                                        @php
                                        $url=Route('admin.comment.status',$comment->id);
                                        $status='<a href="'.$url.'" class="badge badge-warning">غیر فعال</a>';
                                        @endphp
                                        @break
                                        @endswitch
                                        <td>
                                            {!! $status !!}  
                                        </td> 
                                        <td><a href="{{Route('admin.comment.edit',$comment->id)}}">ویرایش</a></td>
                                        <td>
                                            <div class="form-check form-check-flat mt-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="ids[]" value="{{$comment->id}}"
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