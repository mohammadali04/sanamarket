@extends('back.index')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">صفحه ی افزودن دسته</h4>
                  <p class="card-description">
                    
                  </p>
                  <form class="forms-sample" action="{{Route('admin.category.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="">دسته ی والد</label>
                      <select class="form-control" name="parent">
                          <option value="0">هیچکدام</option>
                        @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->title}}</option>
                              @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                      <label for="title">نام دسته</label>
                      <input name="title">
                    </div>                   
                    <button class="btn btn-primary me-2" type="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
@endsection