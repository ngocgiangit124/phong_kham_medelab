@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm
            <small>Bệnh nhân</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/benhnhan/them">Bệnh nhân</a></li>
            <li class="active">Thêm</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-warning">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="box-header with-border">
                <h3 class="box-title">Thêm hồ Sơ bệnh nhân</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="admin/benhnhan/them" method="post" enctype="multipart/form-data">
                    @if(count($errors)>0)
                        <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                                </span>@endif
                    <!-- input states -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{--//mã hóa đơn--}}
                    <div class="form-group">
                        <label class=""> Mã Hóa Đơn</label>
                        <input  width="300px" class="form-control" name="txtMaHoaDon" id="inputError" placeholder="Mã hóa dơn ...">
                    </div>
                    {{--tên bênh nhân--}}
                    <div class="form-group">
                        <label class=""> Tên Bệnh Nhân</label>
                        <input  class="form-control" name="txtTen" id="inputError" placeholder="Tên bệnh nhân ...">
                    </div>
                    {{--gioi tinh--}}
                    <div class="form-group">
                        <label class="">Giới Tính</label>
                        <select class="form-control" name="txtGioiTinh" id="Khoa">
                                <option value="0" selected="">Nữ </option>
                                <option value="1">Nam </option>
                        </select>
                    </div>
                    {{--tuoi--}}
                    <div class="form-group">
                        <label class=""> tuoi</label>
                        <input  type="number" class="form-control" name="txtTuoi" id="inputError" placeholder="Tuoi ...">tuổi
                    </div>
                    {{-- dia chi--}}
                    <div class="form-group">
                        <label class=""> Địa Chỉ</label>
                        <input  class="form-control" name="txtDiaChi" id="inputError" placeholder="Địa Chỉ ...">
                    </div>
                    {{--ngay kham--}}
                    <div class="form-group">
                        <label class="">Ngày Khám </label>
                        <input type="date" class="form-control" name="txtNgayKham" id="inputError" placeholder=" ...">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>



                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </section>

@endsection

<!-- CK Editor -->
<script src="admin_asset/bower_components/ckeditor/ckeditor.js"></script>