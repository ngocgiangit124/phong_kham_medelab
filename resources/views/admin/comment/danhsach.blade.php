@extends('admin.layout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách
            <small>Comment</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/commnet/danhsach">Comment</a></li>
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
                        <h3 class="box-title">Danh sách các Comment</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ảnh Đại Diện</th>
                                <th>Tên Tác Giả</th>
                                <th>Nội Dung</th>
                                <th>ID Tin Tức</th>
                                <th>Chỉnh Sửa</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comment as $cm)
                                <tr>
                                    <td>{{$cm->id}}</td>
                                    <td>
                                        <div class="pull-left image">
                                            <img src="upload/comment/{{$cm->comment_hinhanh}}" class="img-circle" width="100px" alt="User Image">
                                        </div>
                                    </td>
                                    <td>{{$cm->comment_tentacgia}}</td>
                                    <td>{{$cm->comment_noidung}}</td>
                                    <td>{{$cm->tintuc_id}}</td>
                                    <td><a href="admin/comment/sua/{{$cm->id}}">Chỉnh Sửa</a></td>
                                    <td><a href="admin/comment/xoa/{{$cm->id}}">Xóa</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên Tác Giả</th>
                                <th>Nội Dung</th>
                                <th>ID Tin Tức</th>
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