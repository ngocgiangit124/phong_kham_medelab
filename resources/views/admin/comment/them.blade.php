@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm
            <small>Comment</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/comment/them">Comment</a></li>
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
                <h3 class="box-title">Thêm Slide</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="admin/comment/them" method="post" enctype="multipart/form-data">
                    @if(count($errors)>0)
                        <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                                </span>@endif
                    <!-- input states -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class=""> Tên Tác Giả</label>
                        <input  class="form-control" name="txtTen" id="inputError" placeholder="Tên tác giả ...">
                    </div>
                    {{--hinh anh dai dien--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="exampleInputFile">Ảnh Đại Diện</label>--}}
                        {{--<input type="file" name="txtHinh" id="exampleInputFile" class="form-control">--}}
                        {{--@if(session('thongbao'))--}}
                            {{--<p class="help-block">{{session('thongbao')}}</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    <div class="form-group col-md-12">
                        <label for="exampleInputFile" class="col-md-12">Ảnh Đại Diện</label>
                        <div class="col-md-3">
                            <p><img src="upload/user/medelab.png" class="img-fix" id="image_0" type="file" alt="">
                                <input type="file" id="files0" for="0" class="_m" name="txtHinh" ></p>
                        </div>
                        @if(session('Bug'))
                            <p class="help-block">{{session('Bug')}}</p>
                        @endif

                    </div>
                    {{-- noi dung--}}
                    <div class="form-group">
                        <label class=""> Nội Dung</label>
                        <input  class="form-control" name="txtNoiDung" id="inputError" placeholder="Nội Dung ...">
                    </div>
                    <div class="form-group">
                        <label class="">Tin Tức</label>
                        <select class="form-control" name="txtTinTuc" id="Khoa">
                            @foreach($tintuc as $tt)
                                <option value="{{$tt->id}}">{{$tt->tintuc_tieude}}</option>
                            @endforeach()
                        </select>
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