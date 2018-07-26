@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách
            <small> Bệnh nhân </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="bacsy"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="bacsy/benhnhan">Danh Sách</a></li>
            <li class="active">Bệnh Nhân</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-9">
                <div class="col-md-12">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile" id="">
                            <div class="col-md-3 ">
                                <b><p style="font-size: 16px;">Tìm kiếm theo ngày:</p></b>
                            </div>
                            <form action="bacsy/timkiem1" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="col-md-3 ">
                                    <input type="date" value="" name="txtNgayKham" class="form-control">
                                </div>
                                <div class="col-md-2 ">
                                    <button type="submit"   class="btn btn-block btn-info ">Tìm Kiếm</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-12">
                    <div class="box">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <div class="box-header">
                            <h3 class="box-title">Danh sách chờ</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Mã hóa đơn</th>
                                    <th>Tên </th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày khám</th>
                                    <th>Xem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chuandoan as $cd)
                                    @foreach($benhnhan[$cd->benhnhan_id] as $bn)
                                        <tr>
                                            <td>{{$bn->mahoadon}}</td>
                                            <td>{{$bn->benhnhan_ten}}</td>
                                            <td>{{$bn->benhnhan_sodienthoai}}</td>
                                            <td>{{$bn->ngaykham}}</td>
                                            <td><button type="button" for='{{$bn->id}}' class="btn btn-block btn-info button">Xem</button></td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên người khám</th>
                                    <th>Bác sỹ</th>
                                    <th>Số điện thoại</th>
                                    <th>Xem</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
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
                        <a href="bacsy/benhnhan/chitiet/#" class="btn btn-primary btn-block" disabled=""><b> Chi Tiết</b></a>
                        {{--<a href="bacsy/benhnhan/xoa/#" class="btn btn-primary btn-block" disabled=""><b>Xóa</b></a>--}}
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
                $.get("bacsy/ajax/xembenhnhan/"+lich,function (data) {
                    $("#profile").html(data);
                });
            });
        });
    </script>
@endsection