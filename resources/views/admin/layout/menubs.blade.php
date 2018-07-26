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
            <li class="">
                <a href="bacsy/benhnhan"><i class="fa fa-dashboard"></i> <span>Bệnh Nhân</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>

            </li>
            <li class=" ">
                <a href="bacsy/lichkham"><i class="fa fa-dashboard"></i> <span>Danh sách đặt lịch</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>

            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>