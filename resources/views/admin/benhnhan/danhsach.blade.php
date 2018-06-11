@extends('admin.layout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách
            <small>Bệnh Nhân</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/benhnhan/danhsach">Bệnh nhân</a></li>
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
                        <h3 class="box-title">Danh sách các bệnh nhân</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã hóa đơn</th>
                                <th>Tên bệnh nhân</th>
                                <th>Giới Tính</th>
                                <th>Tuổi</th>
                                <th>Địa chỉ</th>
                                <th>Ngày Khám</th>
                                <th>Chỉnh Sửa</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($benhnhan as $bb)
                                <tr>
                                    <td>{{$bb->id}}</td>
                                    <td>{{$bb->mahoadon}}</td>
                                    <td>{{$bb->benhnhan_ten}}</td>
                                    <td>{{$bb->benhnhan_gioitinh}}</td>
                                    <td>{{$bb->benhnhan_tuoi}}</td>
                                    <td>{{$bb->benhnhan_que}}</td>
                                    <td>{{$bb->ngaykham}}</td>
                                    <td><a href="admin/benhnhan/sua/{{$bb->id}}">Chỉnh Sửa</a></td>
                                    <td><a href="admin/benhnhan/xoa/{{$bb->id}}">Xóa</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Mã hóa đơn</th>
                                <th>Tên bệnh nhân</th>
                                <th>Giới Tính</th>
                                <th>Tuổi</th>
                                <th>Địa chỉ</th>
                                <th>Ngày Khám</th>
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