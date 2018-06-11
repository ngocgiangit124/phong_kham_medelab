@extends('admin.layout.index')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa
            <small>Bệnh </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/nhombenh/danhsach">Nhóm Bệnh</a></li>
            <li class="active">Sửa</li>
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
                <h3 class="box-title">Sửa Bệnh</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="admin/nhombenh/sua/{{$nhombenh->id}}" method="post" enctype="multipart/form-data">
                    <!-- input states -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{--khoa--}}
                    <div class="form-group">
                        <label class="">Chuyên Khoa</label>
                        <select class="form-control" name="txtChuyenKhoa" id="Khoa">
                            @foreach($chuyenkhoa as $ck)
                                <option @if($nhombenh->khoa_id==$ck->id)
                                        {{"selected"}}
                                        @endif
                                        value="{{$ck->id}}">{{$ck->ten_khoa}}</option>
                            @endforeach()
                        </select>
                    </div>
                    {{--tên bệnh--}}
                    <div class="form-group">
                        <label class=""> Tên Bệnh</label>
                        <input  class="form-control" name="txtTen" value="{{$nhombenh->nhombenh_ten}}" id="inputError" placeholder="Tên bệnh ...">
                        @if(count($errors)>0)
                            <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                                </span>@endif
                    </div>
                    {{--button--}}
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