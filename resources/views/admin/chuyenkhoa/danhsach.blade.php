@extends('admin.layout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh sách
                <small>Chuyên khoa</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chhủ</a></li>
                <li><a href="admin/chuyenkhoa/danhsach">Chuyên khoa</a></li>
                <li class="active">danh sách</li>
            </ol>
        </section>

        <!-- Main content -->
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách các Khoa</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Khoa</th>
                                    <th>Nổi Bật</th>
                                    <th>Hành Động</th>
                                    <th>Chỉnh Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chuyenkhoa as $ck)
                                <tr>
                                    <td>{{$ck->id}}</td>
                                    <td>{{$ck->ten_khoa}}</td>
                                    <td>@if($ck->trangthai==0)
                                    {{'Không'}}
                                            @else
                                        {{'Có'}}
                                            @endif
                                    </td>
                                    <td style="width: 100px">
                                        <div class="fix-noi-bat ">
                                            <div class="col-md-6">
                                            <form action="admin/chuyenkhoa/noibat/{{$ck->id}}" method="post">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                             <button @if($ck->trangthai == 0)disabled="" @endif type="submit" value="0" name="txtTrangThai" class="btn btn-danger" >Tắt</button>
                                            </form>
                                            </div>
                                            <div class="col-md-6">
                                            <form action="admin/chuyenkhoa/noibat/{{$ck->id}}" method="post">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button @if($ck->trangthai == 1)disabled="" @endif type="submit"  value="1" name="txtTrangThai" class="btn btn-danger" >Bật</button>
                                            </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="admin/chuyenkhoa/sua/{{$ck->id}}">Chỉnh Sửa</a></td>
                                    <td><a href="admin/chuyenkhoa/xoa/{{$ck->id}}">Xóa</a></td>
                                </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Khoa</th>
                                    <th>Nổi Bật</th>
                                    <th>Hành Động</th>
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