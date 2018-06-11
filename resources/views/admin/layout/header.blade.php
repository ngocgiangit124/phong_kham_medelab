


        @if(Auth::check())
        <!-- mini logo for sidebar mini 50x50 pixels -->
        {{--<span class="logo-mini"><b></b></span>--}}
        <!-- logo for regular state and mobile devices -->
            @if(Auth::user()->user_level == 0)
                <a href="admin" class="logo">
                    <span class="logo-lg"><b>Admin</b></span>
                </a>
                @elseif(Auth::user()->user_level == 1)
                    <a href="admin" class="logo">
                        <span class="logo-lg"><b>Nhân Viên</b></span>
                    </a>
                    @elseif(Auth::user()->user_level == 2)
                        <a href="bacsy" class="logo">
                            <span class="logo-lg"><b>Bác Sỹ</b></span>
                        </a>
            @endif
        @endif


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- Notifications Menu -->
                <!-- Tasks Menu -->
                @if(Auth::check())
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="upload/user/{{Auth::user()->user_hinhanh}}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="upload/user/{{Auth::user()->user_hinhanh}}" class="img-circle" alt="User Image">

                            <p>
                                {{Auth::user()->name}} <br>
                                {{Auth::user()->email}}
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">

                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="admin/chinhsua/{{Auth::user()->id}}" class="btn btn-default btn-flat">Chỉnh sửa</a>
                            </div>
                            <div class="pull-right">
                                <a href="admin/logout" class="btn btn-default btn-flat">Đăng xuất</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                    @endif
            </ul>
        </div>
    </nav>

