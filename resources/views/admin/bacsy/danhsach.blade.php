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
            <div class="col-xs-12">


                <div class="box">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="box-header">
                        <h3 class="box-title">Danh sách Bác Sỹ</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Bác Sỹ</th>
                                <th>Tên Khoa</th>
                                <th>Tên Đầy Đủ</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                                <th>Chỉnh Sửa</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bacsy as $bs)
                                <tr>
                                    <td>{{$bs->id}}</td>
                                    <td>{{$bs->bacsy_ten}}</td>
                                    <td>{{$bs->chuyenkhoa->ten_khoa}}</td>
                                    <td>{{$bs->user->user_tendaydu}}</td>

                                    <td>@if($bs->trangthai==0)
                                            {{'Ngừng hoạt động'}}
                                        @else
                                            {{'Đang hoạt động'}}
                                        @endif
                                    </td>
                                    <td style="width: 100px">
                                        <div class="fix-noi-bat ">
                                            <div class="col-md-6">
                                                <form action="admin/bacsy/noibat/{{$bs->id}}" method="post">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button @if($bs->trangthai == 0)disabled="" @endif type="submit" value="0" name="txtTrangThai" class="btn btn-danger" >Tắt</button>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="admin/bacsy/noibat/{{$bs->id}}" method="post">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button @if($bs->trangthai == 1)disabled="" @endif type="submit"  value="1" name="txtTrangThai" class="btn btn-danger" >Bật</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="admin/bacsy/sua/{{$bs->id}}">Chỉnh Sửa</a></td>
                                    <td><a href="admin/bacsy/xoa/{{$bs->id}}">Xóa</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên Bác Sỹ</th>
                                <th>Tên Khoa</th>
                                <th>Tên Đầy Đủ</th>
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
           // $('#example1').DataTable();
           $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
               'autoWidth'   : true
           })
        })
    </script>
@endsection