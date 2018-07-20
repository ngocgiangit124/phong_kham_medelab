@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách
            <small> Danh sách chấp nhận đặt lịch</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/lichkham/danhsachpassed">Lịch khám</a></li>
            <li class="active">Danh sách passed</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-9">

                <div class="box">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="box-header">
                        <h3 class="box-title">Danh sách Chấp nhận khám</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên người khám</th>
                                <th>Bác sỹ</th>
                                <th>Số điện thoại</th>
                                <th>Chờ xử lý</th>
                                <th>Xử lý Đạt</th>
                                <th>Xử lý Hỏng</th>
                                <th>Xem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lich as $l)
                                <tr>
                                    <td>{{$l->id}}</td>
                                    <td>{{$l->ten_nguoikham}}</td>
                                    <td>{{$l->bacsy->bacsy_ten}}</td>
                                    <td>{{$l->dienthoai}}</td>
                                    <td>
                                        <form action="admin/lichkham/kiemtra/{{$l->id}}" method="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <button @if($l->trangthai == 0)disabled="" @endif type="submit" value="0" name="txtTrangThai" class="btn btn-block btn-info ">Chờ</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="admin/lichkham/kiemtra/{{$l->id}}" method="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <button @if($l->trangthai == 1)disabled="" @endif type="submit" value="1" name="txtTrangThai" class="btn btn-block btn-info ">Chờ</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="admin/lichkham/kiemtra/{{$l->id}}" method="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <button @if($l->trangthai == 2)disabled="" @endif type="submit" value="2" name="txtTrangThai" class="btn btn-block btn-info ">Chờ</button>
                                        </form>
                                    </td>
                                    <td><button type="button" for='{{$l->id}}' class="btn btn-block btn-info button">Xem</button></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên người khám</th>
                                <th>Bác sỹ</th>
                                <th>Số điện thoại</th>
                                <th>Chờ xử lý</th>
                                <th>Xử lý Đạt</th>
                                <th>Xử lý Hỏng</th>
                                <th>Xem</th>
                                \
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <!-- About Me Box -->
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile" id="profile">
                        <h3 class="profile-username text-center">Phiếu đặt lịch của id=1</h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Họ tên :</b> <a class="pull-right">--------------------</a>
                            </li>
                            <li class="list-group-item">
                                <b>Chọn bác sỹ :</b> <a class="pull-right">------------@gmail.com</a>
                            </li>

                            <li class="list-group-item" >
                                <b>Đặt ngày khám :</b> <a class="pull-right">00--00-0000</a>
                            </li>
                            <li class="list-group-item" id="GT">
                                <b>Số điện thoại :</b> <a class="pull-right">----</a>
                            </li>
                            <li class="list-group-item" id="GT">
                                <b>Email :</b> <a class="pull-right">------------@gmail.com</a>
                            </li>
                            <li class="list-group-item" id="GT">
                                <strong> Nội Dung</strong>
                                <p class="text-muted">
                                    <span  class="" style="color: #000">Nội dung</span>
                                </p>
                            </li>
                        </ul>
                        <a href="admin/lichkham/chinhsua/#" class="btn btn-primary btn-block" disabled=""><b>Chỉnh sửa</b></a>
                        <a href="admin/lichkham/xoa/#" class="btn btn-primary btn-block" disabled=""><b>Xóa</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
@section('script')
    <script>
        $(function () {
            // $('#example1').DataTable();
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            });
        });
        $(document).ready(function () {
            $(".button").click(function () {
                var lich =$(this).attr('for');
                $.get("admin/ajax/xemlich/"+lich,function (data) {
                    $("#profile").html(data);
                });
            });
        });
    </script>
@endsection