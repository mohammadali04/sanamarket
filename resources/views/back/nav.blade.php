<nav id="sidebar" class="sidebar sidebar-offcanvas" style="padding:0 20px">
        <ul class="nav">
          <li class="nav-item">
            <a href="index.html" class="nav-link">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item nav-category">مدیریت</li>
          <li class="nav-item">
            <a aria-controls="form-elements" aria-expanded="false" href="#form-elements" data-bs-toggle="collapse" class="nav-link">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">دسته ها</span>
              <i class="menu-arrow"></i>
            </a>
            <div id="form-elements" class="collapse">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a  href="{{Route('admin.category.index')}}" class="nav-link">مدیریت دسته ها</a></li>
                <li class="nav-item"><a  href="{{Route('admin.category.create')}}" class="nav-link">ایجاد دسته ی جدید</a></li>
                <li class="nav-item"><a  href="{{Route('admin.baner.index')}}" class="nav-link">مدیریت بنر</a></li>
                <li class="nav-item"><a  href="{{Route('admin.baner.create')}}" class="nav-link">افزودن بنر</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a aria-controls="charts" aria-expanded="false" href="#charts" data-bs-toggle="collapse" class="nav-link">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">محصولات</span>
              <i class="menu-arrow"></i>
            </a>
            <div id="charts" class="collapse">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a  href="{{Route('admin.product.index')}}" class="nav-link">مدیریت محصولات</a></li>
                <li class="nav-item"> <a  href="{{Route('admin.product.create')}}" class="nav-link">ایجاد محصول</a></li>
                <li class="nav-item"> <a  href="{{Route('admin.slider.index')}}" class="nav-link">مدیریت اسلایدر</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a aria-controls="tables" aria-expanded="false" href="#tables" data-bs-toggle="collapse" class="nav-link">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">سفارشات</span>
              <i class="menu-arrow"></i>
            </a>
            <div id="tables" class="collapse">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a href="{{Route('admin.order.index')}}" class="nav-link">مدیریت سفارشات</a></li>
                <li class="nav-item"> <a href="{{Route('admin.category.create')}}" class="nav-link">گزارشات</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a aria-controls="icons" aria-expanded="false" href="#icons" data-bs-toggle="collapse" class="nav-link">
              <i class="menu-icon mdi mdi-layers-outline"></i>
              <span class="menu-title">سفارشات</span>
              <i class="menu-arrow"></i>
            </a>
            <div id="icons" class="collapse">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a href="{{Route('admin.category.create')}}" class="nav-link">مدیریت صفارشات</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">کاربران</li>
          <li class="nav-item">
            <a aria-controls="auth" aria-expanded="false"  href="{{Route('admin.user.index')}}" data-bs-toggle="collapse" class="nav-link">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">مدیریت کاربران</span>
              <i class="menu-arrow"></i>
            </a>
            <div id="auth" class="collapse">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a href="pages/samples/login.html" class="nav-link"> Login </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">نظرات</li>
          <li class="nav-item">
            <a  href="{{Route('admin.comment.index')}}" class="nav-link">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">مدیریت نظرات</span>
            </a>
          </li>
        </ul>
      </nav>