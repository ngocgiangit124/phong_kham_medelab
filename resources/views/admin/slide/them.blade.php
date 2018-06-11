@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm
            <small>Slide</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chhủ</a></li>
            <li><a href="admin/slide/them">Slide</a></li>
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
                <form role="form" action="admin/slide/them" method="post" enctype="multipart/form-data">
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
                        <input  class="form-control" name="txtTen" id="inputError" placeholder="Tên Slide ...">
                    </div>
                    {{--hinh anh nen--}}
                    <div class="form-group">
                        <label for="exampleInputFile">File Hình Ảnh Nền</label>
                        <p><img src="" width="400px" id="image_0" alt=""></p>
                        <input type="file" name="txtHinhNen" for="0" id="files0" class="form-control">
                        @if(session('Bug'))
                            <p class="help-block">{{session('bug')}}</p>
                        @elseif(session('bugloi'))
                            <p class="help-block">{{session('bugloi')}}</p>
                        @endif
                    </div>
                    {{--hinh anh dong--}}
                    <div class="form-group">
                        <label for="exampleInputFile">File Hình Ảnh Động</label>
                        <p><img src="" width="200px" id="image_1" alt=""></p>
                        <input type="file" name="txtHinhAnh" id="files1" for="1"  class="form-control">
                        @if(session('Bug'))
                            <p class="help-block">{{session('bug')}}</p>

                        @endif
                    </div>
                    {{--<!-- ckeditor--> noi dung--}}
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea id="editor1" class="form-control ckeditor" rows="5" name="txtNoiDung" ></textarea>
                    </div>
                    {{--link--}}
                    <div class="form-group">
                        <label class=""> Link</label>
                        <input  class="form-control" name="txtLink" id="inputError" placeholder="Tên Link ...">
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