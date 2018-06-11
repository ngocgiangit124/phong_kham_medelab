
@extends('admin.layout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách
            <small>Slide</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chhủ</a></li>
            <li><a href="admin/tintuc/danhsach">Slide</a></li>
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
                        <h3 class="box-title">Danh sách các Slide</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Slide</th>
                                <th>Hinh Nền</th>
                                <th>Hình Ảnh Động</th>
                                <th width="200px">Nội Dung</th>
                                <th>Link</th>
                                <th>Hoạt Động</th>
                                <th>Chỉnh Sửa</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slide as $sl)
                            <tr>
                            <td>{{$sl->id}}</td>
                            <td>{{$sl->slide_ten}}</td>
                            <td>{{$sl->slide_hinhnen}}</td>
                            <td>{{$sl->slide_hinhanh}}</td>
                            <td width="200px">{{$sl->slide_noidung}}</td>
                            <td>{{$sl->slide_link}}</td>
                                <td style="width: 100px">
                                    <div class="fix-noi-bat ">
                                        <div class="col-md-6">
                                            <form action="admin/slide/noibat/{{$sl->id}}" method="post">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button @if($sl->trangthai == 0)disabled="" @endif type="submit" value="0" name="txtTrangThai" class="btn btn-danger" >Tắt</button>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="admin/slide/noibat/{{$sl->id}}" method="post">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button @if($sl->trangthai == 1)disabled="" @endif type="submit"  value="1" name="txtTrangThai" class="btn btn-danger" >Bật</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            <td><a href="admin/slide/sua/{{$sl->id}}">Chỉnh Sửa</a></td>
                            <td><a href="admin/slide/xoa/{{$sl->id}}">Xóa</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên Slide</th>
                                <th>Hinh Nền</th>
                                <th>Hình Ảnh Động</th>
                                <th>Nội Dung</th>
                                <th>Link</th>
                                <th>Hoạt Động</th>
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
            //$('#example1').DataTable()
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