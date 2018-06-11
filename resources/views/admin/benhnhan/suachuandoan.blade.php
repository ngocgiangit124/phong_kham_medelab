@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Sửa
            <small>Chuẩn đoán bệnh</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/benhnhan/them">Bệnh nhân</a></li>
            <li class="active">Hồ sơ</li>
            <li class="active">Sửa</li>
        </ol>
    </section>
    <section class="content">
        {{--<div class="box box-warning">--}}
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
    <!-- /.box-header -->
        <div class="row">
            {{--thông tin bệnh nhân--}}
            {{--thêm chuẩn đoán--}}
            <div class="col-md-9">
                <div class="box">
                    <div class="box-body">
                        <form role="form"  name="add" action="admin/benhnhan/benhan/sua/{{$chuandoan->id}}" method="post" enctype="multipart/form-data">
                            <!-- input states -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{--khoa--}}
                            <div class="form-group">
                                <label class="">Chuyên Khoa</label>
                                <select class="form-control" name="txtChuyenKhoa" id="txtKhoa1" disabled>
                                    @foreach($chuyenkhoa as $ck)
                                        <option @if($chuandoan->bacsy->chuyenkhoa->id==$ck->id)
                                                {{"selected"}}
                                                value="{{$ck->id}}" @endif>{{$ck->ten_khoa}}</option>
                                    @endforeach()
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="">Bác Sỹ</label>
                                <select class="form-control" name="txtBacSy" id="txtBacSy1">
                                    @foreach($bacsy as $bs)
                                        <option  @if($chuandoan->bacsy->id==$bs->id)
                                                 {{"selected"}}
                                                value="{{$bs->id}}" @endif>{{$bs->bacsy_ten}}</option>
                                    @endforeach()
                                </select>
                            </div>
                            {{--tên bệnh--}}
                            <div class="form-group">
                                <label class="">Tên Bệnh</label>
                                <select class="form-control" name="txtBenh" id="txtTenBenh1">
                                    @foreach($nhombenh as $b)
                                        <option @if($chuandoan->nhombenh_id==$b->id)
                                                {{"selected"}}
                                                value="{{$b->id}}" @endif>{{$b->nhombenh_ten}}</option>
                                    @endforeach()

                                </select>
                            </div>
                            {{--<!-- ckeditor--> noi dung--}}
                            <div class="form-group">
                                <label>Chuẩn Đoán </label>
                                <textarea id="editor1" class="form-control ckeditor" rows="5" name="txtChuanDoan" >
                                    {{$chuandoan->chuandoan}}
                                </textarea>
                            </div>
                            {{--img--}}
                            {{--<label for="exampleInputFile"> Hình Ảnh</label>--}}
                            {{--@foreach($hinhanh as $value)--}}
                            {{--<div class="input-group margin" id="insert">--}}
                                {{--<p><img src="upload/benhnhan/{{$value->hinhanh_ten}}" width="200px" alt=""></p>--}}
                                {{--<div class="input-group margin" id="insert">--}}
                                    {{--<input type="file" name="arrayImg[]" class="form-control">--}}
                                    {{--<span class="input-group-btn">--}}
                                    {{--<button type="button" class="btn btn-info btn-flat addImages" >Add Img</button>--}}
                                      {{--<button type="button" class="btn btn-info btn-flat " >Delete</button>--}}
                                  {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--@endforeach--}}
                            <div class="form-group col-md-12 addimg">
                                <label for="exampleInputFile" class="col-md-12">File Hình Ảnh</label>
                                <?php $i=0; ?>
                            @foreach($hinhanh as $value)


                                <div class="col-md-3">
                                    <p><img src="upload/benhnhan/{{$value->hinhanh_ten}}" class="img-fix" id="image_{{$i}}" type="file" alt="">
                                        <input type="file" id="files{{$i}}" class="_n files" for="{{$i}}" name="arrayImg[]" ></p>
                                    <a href="admin/benhnhan/benhan/xoahinhanh/{{$value->id}}"> <i class="fa fa-times time " ></i></a>
                                </div>
                                    <?php $i++; ?>
                            @endforeach
                            </div>

                            {{--button--}}
                            <div class="box-footer col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.box-body -->
        {{--</div>--}}
    </section>

@endsection

<!-- CK Editor -->
@section('script')
    <script>
        $(document).ready(function () {
            $("#txtKhoa1").change(function () {
                var idKhoa =$(this).val();
                //alert(idKhoa);
                $.get("admin/ajax/chuandoan1/"+idKhoa,function(data){
                    //  alert(data);
                    $("#txtBacSy1").html(data);
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#txtKhoa1").change(function () {
                var idKhoa =$(this).val();
                //alert(idKhoa);
                $.get("admin/ajax/chuandoan2/"+idKhoa,function(data){
                    //  alert(data);
                    $("#txtTenBenh1").html(data);
                });
            });
        });
    </script>
    <script src="admin_asset/bower_components/ckeditor/ckeditor.js"></script>
@endsection

