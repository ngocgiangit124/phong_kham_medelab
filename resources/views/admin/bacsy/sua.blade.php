@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bác Sỹ
            <small>{{$bacsy->bacsy_ten}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/bacsy/danhsach">Bác Sỹ</a></li>
            <li class="active">Danh sách</li>
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
                <form role="form" action="admin/bacsy/sua/{{$bacsy->id}}" method="post" enctype="multipart/form-data">
                    <!-- input states -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class=""> Tên Bác Sỹ</label>
                        <input  class="form-control" name="Ten" id="inputError" value="{{$bacsy->bacsy_ten}}" placeholder="Tên Bác Sỹ ...">
                        @if(count($errors)>0)
                            <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                                </span>@endif

                    </div>
                    <div class="form-group">
                        <label>Chuyên Khoa</label>
                        <select class="form-control" name="Khoa" id="Khoa">
                            @foreach($chuyenkhoa as $ck)
                            <option  @if($bacsy->chuyenkhoa->id == $ck->id)
                                         {{"selected"}}
                            @endif
                                    value="{{$ck->id}}">{{$ck->ten_khoa}}</option>
                                @endforeach()
                        </select>

                    </div>
                    {{--ten user--}}
                    <div class="form-group">
                        <label class=""> Tên Tài Khoản</label>
                        <input  class="form-control" name="user" id="inputError" value="{{$bacsy->user->user_tendaydu}}" disabled="" placeholder="Tên user ...">

                    </div>

                    <!-- ckeditor-->
                    <div class="form-group">
                        <label>Giới Thiệu</label>
                        <textarea id="editor1" class="form-control ckeditor" rows="5" name="GioiThieu" >{{$bacsy->bacsy_gioithieu}}</textarea>
                    </div>
                    {{--hinh anh bac sy--}}
                    <div class="form-group col-md-12 addimg">
                        <label for="exampleInputFile" class="col-md-12">File Hình Ảnh</label>
                        <div class="col-md-3">
                            <p><img src="upload/bacsy/{{$bacsy->bacsy_hinhanh}}" class="img-fix" id="image_0" type="file" alt="">
                                <input type="file" id="files0" class="_m files" for="0" name="Hinh" >
                            </p>
                            @if(session('Bug'))
                                <p class="help-block">{{session('Bug')}}</p>
                            @endif
                        </div>
                    </div>


                    <!-- radio check hoat dộng activity -->
                    <div class="form-group  col-md-12 ">
                        <div class="radio">
                            <label>
                                <input type="radio" name="trangthai" id="optionsRadios1" value="0"
                                @if($bacsy->trangthai==0)
                                    {{"checked"}}
                                        @endif>
                                Chưa đi vào hoạt động!

                            </label>
                        </div>
                        <div class="radio">
                            <label>

                                <input type="radio" name="trangthai" id="optionsRadios2" value="1"
                                @if($bacsy->trangthai==1)
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