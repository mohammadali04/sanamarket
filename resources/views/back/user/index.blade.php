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
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>تلفن</th>
                                    <th>نقش</th>
                                    <th>وضعیت</th>
                                    <th>مدیریت</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{Route('admin.product.destroy')}}" method="get">
                                    @csrf
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{$user->id}}
                                        </td>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            {{$user->created_at}}
                                        </td>
                                        @switch($user->role)
                                        @case(1)
                                        @php
                                        $role='مدیر';
                                        @endphp
                                        @break
                                        @case(1)
                                        @php
                                        $role='کاربر';
                                        @endphp
                                        @break
                                        @endswitch

                                        @switch($user->status)
                                        @case(1)
                                        @php
                                        $url=Route('admin.user.status',$user->id);
                                        $status='<a href="'.$url.'" class="badge badge-success">فعال</a>';
                                        @endphp
                                        @break
                                        @case(0)
                                        @php
                                        $url=Route('admin.user.status',$user->id);
                                        $status='<a href="'.$url.'" class="badge badge-warning">غیر فعال</a>';
                                        @endphp
                                        @break
                                        @endswitch
                                        <td>
                                            {{$role}}  
                                        </td> 
                                        <td>
                                            {!! $status !!}  
                                        </td> 
                                        <td><a href="{{Route('admin.user.edit',$user->id)}}">ویرایش</a></td>
                                        <td>
                                            <div class="form-check form-check-flat mt-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="ids[]" value="{{$user->id}}"
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