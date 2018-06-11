@extends('admin.layout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách
            <small> Bác Sỹ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/bacsy/danhsach">Bác Sỹ</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-9">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách Bác Sỹ</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="example2_length">
                                    <div class="col-md-2" style="margin-left: 40px; margin-top: 5px">
                                        <label >Show:</label>
                                    </div>
                                    <div class="col-md-3"  style="margin-left: -10px;">
                                        <select  class="form-control input-sm ">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-4"><label style="margin-left: 20px;margin-top: 5px">Tìm kiếm :</label></div>
                                <div id="example2_filter" class="dataTables_filter col-md-8" >
                                    <input type="search" class="form-control input-sm" style="margin-left: -30px;">
                                </div>
                            </div>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Tên Đầy Đủ</th>
                                <th>Xem</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $u)
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->user_tendaydu}}</td>
                                    <td><button type="button" for='{{$u->id}}' class="btn btn-block btn-info button">Xem</button></td></a>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Tên Đầy Đủ</th>
                                <th>Xem</th>

                            </tr>
                            </tfoot>
                        </table>
                        {{ $user->links() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            {{--profile--}}
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile" id="profile">
                        <img class="profile-user-img img-responsive img-circle" id="img" src="upload/user/medelab.png" alt="User profile picture">

                        <h3 class="profile-username text-center">Tên bác sỹ</h3>

                        {{--<p class="text-muted text-center">Software Engineer</p>--}}

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Tên Đầy Đủ :</b> <a class="pull-right">--------------------</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email :</b> <a class="pull-right">------------@gmail.com</a>
                            </li>
                            <li class="list-group-item" >
                                <b>Ngày Sinh :</b> <a class="pull-right">00--00-0000</a>
                            </li>
                            <li class="list-group-item" id="GT">
                                <b>Giới Tính :</b> <a class="pull-right">----</a>
                            </li>
                        </ul>

                        <a href="admin/bacsy/thongtin/#" class="btn btn-primary btn-block" disabled=""><b>Tạo Thông Tin Bác Sỹ</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-success">Coding</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        {{--endprofile--}}
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection
@section('script')
    <script>
        $(function () {
          //  $('#example1').DataTable();
            $('#example2').DataTable({
                'paging'      : false,
                'lengthChange': true,
                'searching'   : false,
                'ordering'    : false,
                'info'        : false,
                'autoWidth'   : false
            })
        });
        $(document).ready(function () {
           $(".button").click(function () {
              var bacsy =$(this).attr('for');
              $.get("admin/ajax/bacsy/"+bacsy,function (data) {
                  $("#profile").html(data);
              });
           });
        });
    </script>
@endsection