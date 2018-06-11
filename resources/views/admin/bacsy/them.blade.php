
@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tạo Mới
            <small>{{$user->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/bacsy/danhsach">Bác Sỹ</a></li>
            <li class="active">Tạo Mới</li>
        </ol>
    </section>
    <section class="content">
        <div class=" box box-warning">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="box-header with-border">
                <h3 class="box-title">Tạo Mới Bác Sỹ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body  ">
                <form role="form" action="admin/bacsy/them/{{$user->id}}" method="post" enctype="multipart/form-data">
                    <!-- input states -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class=""> Tên Bác Sỹ</label>
                        <input  class="form-control" name="txtTen" id="inputError"  placeholder="Tên Bác Sỹ ...">
                        @if(count($errors)>0)
                            <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                                </span>@endif

                    </div>
                    <div class="form-group">
                        <label>Chuyên Khoa</label>
                        <select class="form-control" name="txtKhoa" id="Khoa">
                            @foreach($chuyenkhoa as $ck)
                                <option value="{{$ck->id}}">{{$ck->ten_khoa}}</option>
                            @endforeach()
                        </select>

                    </div>
                    {{--ten user--}}
                    <div class="form-group">
                        <label class=""> Tên Tài Khoản</label>
                        <input  class="form-control" name="txtUser" id="inputError" value="{{$user->user_tendaydu}}" disabled="" placeholder="Tên user ...">

                    </div>

                    <!-- ckeditor-->
                    <div class="form-group">
                        <label>Giới Thiệu</label>
                        <textarea id="editor1" class="form-control ckeditor" rows="5" name="txtGioiThieu" ></textarea>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label for="exampleInputFile">File Hình Ảnh</label>--}}
                        {{--<p><img src="upload/bacsy/{{$bacsy->bacsy_hinhanh}}" width=400px alt=""></p>--}}
                        {{--<input type="file" name="txtHinh" id="exampleInputFile" class="form-control">--}}
                        {{--@if(session('bug'))--}}
                            {{--<p class="help-block">{{session('bug')}}</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    <div class="form-group col-md-12">
                        <label for="exampleInputFile" class="col-md-12">File Hình Ảnh</label>
                        <div class="col-md-3">
                            <p><img src="upload/user/medelab.png" class="img-fix" id="image_0" type="file" alt="">
                                <input type="file" id="files0" for="0" class="_m" name="txtHinh" ></p>
                        </div>

                    </div>
                    <!-- radio check hoat dộng activity -->
                    <div class="form-group col-md-12">
                        <div class="radio">
                            <label>
                                <input type="radio" name="trangthai" id="optionsRadios1" value="0" checked="">
                                    Chưa
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="trangthai" id="optionsRadios2" value="1">
                                       Hoạt động!
                            </label>
                        </div>
                    </div>
                    {{--// submit reset--}}
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