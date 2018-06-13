@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa
            <small>Người Dùng</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="admin/user/danhsach">Người dùng</a></li>
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
                <h3 class="box-title">Sửa Người Dùng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="admin/user/sua/{{$user->id}}" method="post"  enctype="multipart/form-data">
                    @if(count($errors)>0)
                        <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                                </span>@endif
                    <!-- input states -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class=""> Tên Người Dùng</label>
                        <input  class="form-control" name="name" id="inputError" value="{{$user->name}}">
                    </div>
                    <!-- email-->
                    <div class="form-group">
                        <label class=""> Email</label>
                        <input  type="email" class="form-control" name="Email" id="inputError" value="{{$user->email}}" disabled="" placeholder="Nhập email@email.com ...">
                    </div>
                    <!-- password-->
                    <div class="form-group">
                        <label class=""> Mật Khẩu</label>
                        <input  type="password" class="form-control" name="Password" id="inputError" disabled ="" placeholder="Nhập mật khẩu ...">
                    </div>
                    <!--password again-->
                    <div class="form-group">
                        <label class=""> Nhập lại Mật Khẩu</label>
                        <input  type="password" class="form-control" name="PasswordAgain" id="inputError"  disabled ="" placeholder="Nhập lại mật khẩu ...">
                    </div>
                    <!-- fullname-->
                    <div class="form-group">
                        <label class=""> Tên Đầy Đủ</label>
                        <input  class="form-control" name="TenDayDu" id="inputError" value="{{$user->user_tendaydu}}" placeholder="Tên đầy đủ ...">
                    </div>
                        {{--Ngay thang nam sinh--}}
                        <div class="form-group">
                            <label class="">Ngày Sinh </label>
                            <input type="date" class="form-control" name="txtNgaySinh" id="inputError" value="{{$user->user_ngaysinh}}" placeholder=" ...">
                        </div>
                    <!-- gioitinh-->
                    <div class="form-group">
                        <label>Giới Tính</label>
                        <select class="form-control" name="GioiTinh">
                            <option     value="1"
                            @if($user->user_gioitinh==1)
                                {{"selected"}}
                                    @endif>Nam</option>
                            <option  value="0"
                            @if($user->user_gioitinh==0)
                                {{"selected"}}
                                    @endif>Nữ</option>
                        </select>
                    </div>
                    <!-- number Phone-->
                    <div class="form-group">
                        <label class=""> Số Điện Thoại</label>
                        <input  class="form-control" name="SDT" id="inputError" value=" 0{{$user->user_dt}}" placeholder="Nhập số điện thoại ...">
                    </div>
                    <!-- Level-->
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="Level">
                            <option   value="0"
                            @if($user->user_level==0)
                                {{"selected"}}
                                        @endif >Admin</option>
                            <option  value="1"
                            @if($user->user_level==1)
                                {{"selected"}}
                                    @endif>Nhân Viên</option>
                            <option  value="2"
                            @if($user->user_level==2)
                                {{"selected"}}
                                    @endif>Bác Sỹ</option>
                        </select>

                    </div>
                    <!--file img-->
                    <div class="form-group">
                        <label for="exampleInputFile">File Hình Ảnh</label>
                        <p><img src="upload/user/{{$user->user_hinhanh}}" id="image_0"  class="fix-img-user" alt=""></p>
                        <input type="file" name="Hinh" id="files0" for="0" class="">
                        @if(session('bug'))
                            <p class="help-block">{{session('bug')}}</p>
                        @endif
                    </div>

                    <!-- radio check hoat dộng activity -->
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input name="TrangThai" id="optionsRadios2" value="0"
                                       @if($user->user_trangthai == 0)
                                       {{"checked"}}
                                       @endif
                                       type="radio">
                                Chưa!
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input name="TrangThai" id="optionsRadios2" value="1"
                                       @if($user->user_trangthai == 1)
                                       {{"checked"}}
                                       @endif
                                       type="radio">
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

{{--<!-- CK Editor -->--}}
{{--<script src="admin_asset/bower_components/ckeditor/ckeditor.js"></script>--}}