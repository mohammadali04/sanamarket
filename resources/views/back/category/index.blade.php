@extends('back.index')
@section('content')
<div class="main-panel">
    <div class="row flex-grow">
        <div class="col-10 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <ul class="nav justify-content-end">
                          @if(isset($category->id))
                        <li class="nav-item">
                                <a class="nav-link active" href="{{Route('admin.category.index')}}">دسته های اصلی</a>
                            </li>
                            @endif
                         @if(isset($parents))
                         @foreach($parents as $parent)
                            <li class="nav-item">
                                <a class="nav-link active" href="{{Route('admin.category.children',$parent[0]->id)}}">{{$parent[0]->title}}</a>
                            </li>
                            @endforeach
                         @endif    
                         @if(isset($category->id))               
                         <li class="nav-item">
                                <a class="nav-link active" style="color:red" href="{{Route('admin.category.children',$category->id)}}">{{'دسته ی'}} {{$category->title}}</a>
                            </li>
                           @else             
                         <li class="nav-item">
                                <a class="nav-link active" style="color:red" href="{{Route('admin.category.index')}}">{{'دسته ی اصلی'}}</a>
                            </li>
                            @endif
                        </ul>
                        <div>
                            <h4 class="card-title card-title-dash">صفحه مدیریت دسته ها</h4>
                        </div>
                        <div>
                            <a href="{{Route('admin.category.create')}}" type="button"
                                class="btn btn-primary btn-lg text-white mb-0 me-0">افزودن دسته ی جدید</a>
                            <a onclick="submitForm()" type="button"
                                class="btn btn-primary btn-lg text-white mb-0 me-0"><i
                                    class="mdi mdi-account-plus"></i>حذف</a>
                        </div>
                    </div>

                    <div class="table-responsive  mt-1">
                        <table class="table select-table">
                            <thead>
                                <tr>
                                    </th>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>مشاهده زیر دسته</th>
                                    <th>مشاهده ویژگی ها</th>
                                    <th>ویرایش</th>
                                    <th>انتخاب</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{Route('admin.category.destroy')}}" method="get">
                                    @csrf
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            {{$category->id}}
                                        </td>
                                        <td>
                                            {{$category->title}}
                                        </td>
                                        <td>
                                            <a href="{{Route('admin.category.children',$category->id)}}">مشاهده</a>
                                        </td>
                                        <td><a>مشاهده</a></td>
                                        <td><a href="{{Route('admin.category.edit',$category->id)}}">ویرایش</a></td>
                                        <td>
                                            <div class="form-check form-check-flat mt-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="ids[]" value="{{$category->id}}"
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