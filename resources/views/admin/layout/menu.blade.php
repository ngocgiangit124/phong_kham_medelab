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
            <li class=" treeview {{ ((Request::path() == 'admin/chuyenkhoa/danhsach')||(Request::path() == 'admin/chuyenkhoa/them')) ? 'active' : '' }}">
                <a href="admin/chuyenkhoa/danhsach"><i class="fa fa-dashboard"></i> <span>Chuyên Khoa</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu ">
                    <li><a href="admin/chuyenkhoa/danhsach">Danh Sách</a></li>
                    <li><a href="admin/chuyenkhoa/them">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview {{ ((Request::path() == 'admin/bacsy/danhsach')||(Request::path() == 'admin/bacsy/thongtin')) ? 'active' : '' }}">
                <a href="admin/bacsy/danhsach"><i class="fa fa-user-secret"></i> <span>Bác Sỹ</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/bacsy/danhsach">Danh Sách</a></li>
                    <li><a href="admin/bacsy/thongtin">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview {{ ((Request::path() == 'admin/benhnhan/danhsach')||(Request::path() == 'admin/benhnhan/them')) ? 'active' : '' }}">
                <a href="admin/benhnhan/danhsach"><i class="fa fa-dashboard"></i> <span>Bệnh Nhân</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/benhnhan/danhsach">Danh Sách</a></li>
                    <li><a href="admin/benhnhan/them">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview {{ ((Request::path() == 'admin/user/danhsach')||(Request::path() == 'admin/user/them')) ? 'active' : '' }}">
                <a href="admin/user/danhsach"><i class="fa fa-users"></i> <span>Users</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/user/danhsach">Danh Sách</a></li>
                    <li><a href="admin/user/them">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview {{ ((Request::path() == 'admin/slide/danhsach')||(Request::path() == 'admin/slide/them')) ? 'active' : '' }}">
                <a href="admin/slide/danhsach"><i class="fa fa-dashboard"></i> <span>Slide</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/slide/danhsach">Danh Sách</a></li>
                    <li><a href="admin/slide/them">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview {{ ((Request::path() == 'admin/tintuc/danhsach')||(Request::path() == 'admin/tintuc/them')) ? 'active' : '' }}">
                <a href="admin/tintuc/danhsach"><i class="fa fa-dashboard"></i> <span>Tin Tức</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/tintuc/danhsach">Danh Sách</a></li>
                    <li><a href="admin/tintuc/them">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview {{ ((Request::path() == 'admin/comment/danhsach')||(Request::path() == 'admin/comment/them')) ? 'active' : '' }}">
                <a href="admin/comment/danhsach"><i class="fa fa-dashboard"></i> <span>Comment</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/comment/danhsach">Danh Sách</a></li>
                    <li><a href="admin/comment/them">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview {{ ((Request::path() == 'admin/nhombenh/danhsach')||(Request::path() == 'admin/nhombenh/them')) ? 'active' : '' }}">
                <a href="admin/nhombenh/danhsach"><i class="fa fa-dashboard"></i> <span>Nhóm Bệnh</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/nhombenh/danhsach">Danh Sách</a></li>
                    <li><a href="admin/nhombenh/them">Thêm</a></li>
                </ul>
            </li>
            <li class="treeview {{ ((Request::path() == 'admin/lichkham/danhsach')||(Request::path() == 'admin/lichkham/them') ||(Request::path() == 'admin/lichkham/them') )? 'active' : '' }}">
                <a href="admin/nhombenh/danhsach"><i class="fa fa-dashboard"></i> <span>Danh sách đặt lịch</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/lichkham/danhsachwait">Danh sách wait</a></li>
                    <li><a href="admin/lichkham/danhsachpassed">Danh sách passed</a></li>
                    <li><a href="admin/lichkham/danhsachfailed">Danh sách failed</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>