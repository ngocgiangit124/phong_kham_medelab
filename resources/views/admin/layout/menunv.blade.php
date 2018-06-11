<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    @if(Auth::check())
        <!-- Sidebar user panel (optional) -->
            <div class="user-panel">

                <div class="pull-left image">
                    <img src="upload/user/{{Auth::user()->user_hinhanh}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
    @endif
    <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->

            <li class="treeview">
                <a href="#"><i class="fa fa-wheelchair"></i> <span>Bệnh Nhân</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/benhnhan/danhsach">Danh Sách</a></li>
                    <li><a href="admin/benhnhan/them">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span>Slide</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/slide/danhsach">Danh Sách</a></li>
                    <li><a href="admin/slide/them">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span>Tin Tức</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/tintuc/danhsach">Danh Sách</a></li>
                    <li><a href="admin/tintuc/them">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span>Comment</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/comment/danhsach">Danh Sách</a></li>
                    <li><a href="admin/comment/them">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span>Nhóm Bệnh</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/nhombenh/danhsach">Danh Sách</a></li>
                    <li><a href="admin/nhombenh/them">Thêm</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>