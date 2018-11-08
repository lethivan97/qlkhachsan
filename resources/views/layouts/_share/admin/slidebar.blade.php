<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('admin')}}" class="brand-link">
    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">Trang quản trị</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('image/user/admin.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div>
        <a href="{{route('admin')}}" class="d-block" style="margin: 10px ;font-size: 20px">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Quản lý loại phòng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.phong')}}" class="nav-link">
              <i class="nav-icon fa fa-h-square"></i>
              <p>
                Quản lý phòng
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('admin.thietbi')}}" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Quản lý thiết bị
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('admin.user')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Quản lý user
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('thong-ke-khach')}}" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Thống kê khách
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('admin.user')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Quản lý user
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('thong-tin-phong')}}" class="nav-link">
             <i class="nav-icon fa fa-th"></i>
             <p>
              Thông tin phòng
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{route('bao-cao')}}" class="nav-link">
           <i class="nav-icon fa fa-pie-chart"></i>
           <p>
            Báo cáo
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="{{route('client')}}" class="nav-link">
          <i class="nav-icon fa fa-undo"></i>
          <p>
            Về trang web
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>