@extends('admin.layout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách
            <small>Nhóm Bệnh</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/nhombenh/danhsach">Nhóm bệnh</a></li>
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
                        <h3 class="box-title">Danh sách các nhóm bệnh</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Bệnh</th>
                                <th>Khoa Khám</th>
                                <th>Chỉnh Sửa</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nhombenh as $nb)
                                <tr>
                                    <td>{{$nb->id}}</td>
                                    <td>{{$nb->nhombenh_ten}}</td>
                                    <td>{{$nb->chuyenkhoa->ten_khoa}}</td>
                                    <td><a href="admin/nhombenh/sua/{{$nb->id}}">Chỉnh Sửa</a></td>
                                    <td><a href="admin/nhombenh/xoa/{{$nb->id}}">Xóa</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên Bệnh</th>
                                <th>Khoa Khám</th>
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