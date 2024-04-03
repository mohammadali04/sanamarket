<div style="padding:40px;text-align:right">

    <nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{route('categories')}}" class="btn btn-warning">دسته بندی ها</a>
            </li>
            <li class="nav-item">
                <a href="{{route('create')}}" class="btn btn-primary">دسته بندی جدید</a>
            </li>
            <li>
                <a href="{{route('register')}}" class="btn btn-primary">ثبت نام کاربر جدید</a>
            </li>
            <li>
                <a href="{{route('login')}}" class="btn btn-primary">فرم ورود</a>
            </li>
            <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">خروج</button>
                </form>
            </li>
        </ul>
    </nav>


    <hr>
</div>