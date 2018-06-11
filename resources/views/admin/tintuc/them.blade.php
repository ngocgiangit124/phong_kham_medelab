@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm
            <small>Tin Tức</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/tintuc/them">Slide</a></li>
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
                <h3 class="box-title">Thêm Tin tức</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="admin/tintuc/them" method="post" enctype="multipart/form-data">
                    @if(count($errors)>0)
                        <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                                </span>@endif
                    <!-- input states -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class=""> Tên Slide</label>
                        <input  class="form-control" name="txtTieuDe" id="inputError" placeholder="Tiêu Đề  ...">

                    </div>
                    {{--input tac gia--}}
                    <div class="form-group">
                        <label class=""> Tên Tác Giả</label>
                        <input  class="form-control" name="txtTacGia" id="inputError" placeholder="Tên Tác Giả  ...">


                    </div>
                    {{--input mo ta--}}
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea id="editor1" class="form-control ckeditor" rows="5" name="txtMoTa" ></textarea>
                    </div>
                    {{--hinh anh --}}
                    {{--<div class="form-group">--}}
                        {{--<label for="exampleInputFile"> Hình Ảnh</label>--}}
                        {{--<input type="file" name="txtHinh" id="exampleInputFile" class="form-control">--}}
                        {{--@if(session('thongbao'))--}}
                            {{--<p class="help-block">{{session('thongbao')}}</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    <div class="form-group col-md-12">
                        <label for="exampleInputFile" class="col-md-12">File Hình Ảnh</label>
                        <div class="col-md-3">
                            <p><img src="upload/user/medelab.png" class="img-fix" id="image_0" type="file" alt="">
                                <input type="file" id="files0" class="_m" for="0" name="txtHinh" ></p>
                        </div>
                        @if(session('Bug'))
                            <p class="help-block">{{session('Bug')}}</p>
                        @endif

                    </div>

                    {{--<!-- ckeditor--> noi dung--}}
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea id="editor1" class="form-control ckeditor" rows="5" name="txtNoiDung" ></textarea>
                    </div>
                    <!-- radio check hoat dộng activity -->
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="trangthai" id="optionsRadios1" value="0" checked>
                                Chưa đi vào hoạt động!
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