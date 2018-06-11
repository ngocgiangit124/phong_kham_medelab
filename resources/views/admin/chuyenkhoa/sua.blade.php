@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chuyên Khoa
            <small>{{$chuyenkhoa->ten_khoa}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="admin/chuyenkhoa/danhsach">Chuyên Khoa</a></li>
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
                <h3 class="box-title">Sửa Chuyên Khoa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="admin/chuyenkhoa/sua/{{$chuyenkhoa->id}}" method="post" enctype="multipart/form-data">
                    @if(count($errors)>0)
                        <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                                </span>@endif
                    <!-- input states -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class=""> Tên Chuyên Khoa</label>
                        <input  class="form-control" name="ten_khoa" id="inputError" value="{{$chuyenkhoa->ten_khoa}}" placeholder="Tên Khoa ...">


                    </div>
                    <!-- ckeditor-->
                    <div class="form-group">
                        <label>Giới Thiệu</label>
                        <textarea id="editor1" class="form-control ckeditor" rows="5" name="GioiThieu" >{{$chuyenkhoa->khoa_gioithieu}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File Hình Ảnh</label>
                        <p><img src="upload/chuyenkhoa/{{$chuyenkhoa->khoa_hinhanh}}" width=400px alt=""></p>
                        <input type="file" name="Hinh" id="exampleInputFile" class="form-control">
                        @if(session('Bug'))
                            <p class="help-block">{{session('Bug')}}</p>
                        @endif
                    </div>

                    <!-- radio check hoat dộng activity -->
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="trangthai" id="optionsRadios1" value="0"
                                       @if($chuyenkhoa->trangthai==0)
                                           {{"checked"}}
                                               @endif>
                                Chưa đi vào hoạt động!

                            </label>
                        </div>
                        <div class="radio">
                            <label>

                                <input type="radio" name="trangthai" id="optionsRadios2" value="1"
                                @if($chuyenkhoa->trangthai==1)
                                    {{"checked"}}
                                        @endif>
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