@extends('admin.layout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh sách
                <small>Tài Khoản Người Dùng</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chhủ</a></li>
                <li><a href="admin/user/danhsach">Tài Khoản Người Dùng</a></li>
                <li class="active">danh sách</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách các người dùng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Người Dùng</th>
                                    <th>Email</th>
                                    <th>Tên Đầy Đủ</th>
                                    <th>Giới Tính</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Level</th>
                                    <th>Trạng Thái</th>
                                    <th>Hành Động</th>
                                    <th>Chỉnh Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->user_tendaydu}}</td>
                                    <td>@if($u->user_gioitinh==0)
                                            {{'Nữ'}}
                                        @else
                                            {{'Nam'}}
                                        @endif
                                    </td>
                                    <td>{{$u->user_dt}}</td>
                                    <td>@if($u->user_level==0)
                                            {{'Admin'}}
                                            @elseif($u->user_level==1)
                                            {{'Nhân Viên'}}
                                                @elseif($u->user_level==2)
                                                    {{'Bác Sỹ'}}
                                                    @endif


                                    </td>
                                    <td>@if($u->user_trangthai==0)
                                    {{'Không'}}
                                        @elseif($u->user_trangthai==1)
                                        {{'Hoạt động'}}
                                            @endif
                                    </td>
                                    <td style="width: 80px">
                                        <div class="fix-trang-thai ">
                                            <div class="col-md-6">
                                                <form action="admin/user/trangthai/{{$u->id}}" method="post">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button @if($u->user_trangthai == 0)disabled="" @endif type="submit" value="0" name="txtTrangThai" class="btn btn-danger" >Tắt</button>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="admin/user/trangthai/{{$u->id}}" method="post">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button @if($u->user_trangthai == 1)disabled="" @endif type="submit"  value="1" name="txtTrangThai" class="btn btn-danger" >Bật</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="admin/user/sua/{{$u->id}}">Chỉnh Sửa</a></td>
                                    <td><a href="admin/user/xoa/{{$u->id}}">Xóa</a></td>
                                </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Người Dùng</th>
                                    <th>Email</th>
                                    <th>Tên Đầy Đủ</th>
                                    <th>Giới Tính</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Level</th>
                                    <th>Trạng Thái</th>
                                    <th>Chỉnh Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection
@section('script')
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection