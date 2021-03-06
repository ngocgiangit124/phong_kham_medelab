@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa
            <small> Lịch Khám</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="admin/lichkham/danhsachwait">Lịch khám</a></li>
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
                <h3 class="box-title">Thêm Lịch Khám</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="admin/lichkham/sua/{{$lich->id}}" method="post" enctype="multipart/form-data">
                    @if(count($errors)>0)
                        <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                                </span>@endif
                <!-- input states -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class=""> Tên người khám</label>
                        <input  class="form-control" name="txtTen" id="inputError" value="{{$lich->ten_nguoikham}}" placeholder="Tên Người Khám ...">
                    </div>
                    <div class="form-group">
                        <label class=""> Chọn chuyên khoa</label>
                        <select class="form-control" name="txtChuyenKhoa" id="txtKhoa">
                            <option value=""> Lựa chọn chuyên khoa</option>
                            @foreach($chuyenkhoa as $ck)
                                <option @if($lich->bacsy->chuyenkhoa->id==$ck->id)
                                        {{"selected"}}
                                        value="{{$ck->id}}" @endif>{{$ck->ten_khoa}}</option>
                            @endforeach()
                        </select>
                    </div>
                    <div class="form-group">
                        <label class=""> Bác sỹ</label>
                        <select class="form-control" name="txtBacSy" id="txtBacSy">
                            @foreach($bacsy as $bs)
                                <option  @if($lich->bacsy->id==$bs->id)
                                         {{"selected"}}
                                         value="{{$bs->id}}" @endif>{{$bs->bacsy_ten}}</option>
                            @endforeach()
                        </select>
                    </div>
                    <div class="form-group">
                        <label class=""> Ngày khám</label>
                        <input type="date" class="form-control" name="txtNgayKham" value="{{$lich->ngaykham}}" id="inputError" placeholder=" ...">
                    </div>
                    <div class="form-group">
                        <label class=""> Số điện thoại</label>
                        <input type="number" class="form-control" name="txtSDT" id="inputError" value="{{$lich->dienthoai}}" placeholder="Số điện thoại ...">
                    </div>
                    <div class="form-group">
                        <label class=""> Email </label>
                        <input type="email" class="form-control" name="txtEmail" id="inputError" value="{{$lich->email_nguoikham}}" placeholder="Email ...">
                    </div>

                    <!-- ckeditor-->
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="editor1" class="form-control ckeditor"  rows="5" name="txtNoiDung" >{{$lich->noidung}}</textarea>
                    </div>
                    <!-- radio check hoat dộng activity -->
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="txtTrangThai" id="optionsRadios1" value="0"
                                @if($lich->trangthai==0)
                                    {{"checked"}}
                                @endif >
                                Wait
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="txtTrangThai" id="optionsRadios2" value="1"
                                @if($lich->trangthai==1)
                                    {{"checked"}}
                                @endif >
                                OK
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

@section('script')
    <script>
        $(document).ready(function () {
            $("#txtKhoa").change(function () {
                var idKhoa =$(this).val();
                //alert(idKhoa);
                $.get("admin/ajax/chuandoan1/"+idKhoa,function(data){
                    //  alert(data);
                    $("#txtBacSy").html(data);
                });
            });
        });
    </script>
    <script src="admin_asset/bower_components/ckeditor/ckeditor.js"></script>
@endsection