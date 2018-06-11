@extends('admin.layout.index')
@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tạo Mới
                <small>Người Dùng</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="admin"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li><a href="admin/user/danhsach">Người dùng</a></li>
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
                    <h3 class="box-title">Thêm Người Dùng</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="admin/user/them1" method="post"  enctype="multipart/form-data">
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
                            <input  class="form-control" name="name" id="inputError" placeholder="Tên người dùng ...">
                        </div>
                        <!-- email-->
                        <div class="form-group">
                            <label class=""> Email</label>
                            <input  type="email" class="form-control" name="Email" id="inputError" placeholder="Nhập email@email.com ...">
                        </div>
                        <!-- password-->
                        <div class="form-group">
                            <label class=""> Mật Khẩu</label>
                            <input  type="password" class="form-control" name="Password" id="inputError" placeholder="Nhập mật khẩu ...">
                        </div>
                        <!--password again-->
                        <div class="form-group">
                            <label class=""> Nhập lại Mật Khẩu</label>
                            <input  type="password" class="form-control" name="PasswordAgain" id="inputError" placeholder="Nhập lại mật khẩu ...">
                        </div>
                        <!-- fullname-->
                        <div class="form-group">
                            <label class=""> Tên Đầy Đủ</label>
                            <input  class="form-control" name="TenDayDu" id="inputError" placeholder="Tên đầy đủ ...">
                        </div>
                            {{--ngay sinh--}}
                            <div class="form-group">
                                <label class="">Ngày Tháng Năm Sinh </label>
                                <input type="date" class="form-control" name="txtNgaySinh" id="inputError" placeholder=" ...">
                            </div>
                        <!-- gioitinh-->
                        <div class="form-group">
                            <label>Giới Tính</label>
                            <select class="form-control" name="GioiTinh">
                                <option   value="1">Nam</option>
                                <option  value="0" selected>Nữ</option>
                            </select>
                        </div>
                        <!-- number Phone-->
                        <div class="form-group">
                            <label class=""> Số Điện Thoại</label>
                            <input  class="form-control" name="SDT" id="inputError" placeholder="Nhập số điện thoại ...">
                        </div>
                        <!-- Level-->
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="Level">
                                <option  selected value="0">Admin</option>
                                <option  value="1">Nhân Viên</option>
                                <option  value="2">Bác Sỹ</option>
                            </select>

                        </div>
                        <!--file img-->
                            <div class="form-group">
                                <label for="exampleInputFile">File Hình Ảnh</label>
                                <img src="" id="image_0" alt="" class="fix-img-user">
                                <input type="file" name="Hinh" id="files0" for="0">
                                @if(session('Bug'))
                                    <p class="help-block">{{session('Bug')}}</p>
                                @endif
                            </div>

                        <!-- radio check hoat dộng activity -->
                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="TrangThai" id="optionsRadios1" value="0" checked>
                                    Chưa!
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="TrangThai" id="optionsRadios2" value="1">
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