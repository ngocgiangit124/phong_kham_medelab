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
                                <label for="exampleInputFile" class="col-md-12"> Hình Ảnh </label>
                                <?php $i=0; ?>
                            @foreach($hinhanh as $value)


                                <div class="col-md-3">
                                    <p><img src="upload/benhnhan/{{$value->hinhanh_ten}}" class="img-fix" id="image" type="file" alt="">
                                        {{--<input type="file" id="files{{$i}}" class="_n files" for="{{$i}}" name="arrayImg[]" ></p>--}}
                                    <a href="admin/benhnhan/benhan/xoahinhanh/{{$value->id}}"> <i class="fa fa-times time " ></i></a>
                                </div>
                                    <?php $i++; ?>
                            @endforeach
                            </div>
                            <div class="form-group col-md-12 addimg" id="insert">
                                <label for="exampleInputFile" class="col-md-12">Thêm Hình Ảnh</label>
                                @if(session('Bug'))
                                    <p class="help-block">{{session('Bug')}}</p>
                                @endif
                                <div class="col-md-3 " >
                                    <p><img src="upload/user/medelab.png" class="img-fix" id="image_0" type="file" alt="">
                                        <input type="file" id="files0" class="_n files" for="0" name="arrayImg[]" ></p>
                                    <span id="previewImg_0"></span>
                                </div>
                                <div class="col-md-3">
                                    <p><img src="upload/user/medelab.png" class="img-fix"  for="1" id="image_1" type="file" alt="">
                                        <input type="file" id="files1" class="_n files" for="1" name="arrayImg[]" ></p>
                                    <span id="previewImg_1"></span>
                                </div>
                                <div class="col-md-3">
                                    <p><img src="upload/user/medelab.png" class="img-fix" for="2"  id="image_2" type="file" alt="">
                                        <input type="file" id="files2" class="_n files" for="2" name="arrayImg[]" ></p>
                                    <span id="previewImg_2"></span>
                                </div>
                                <div class="col-md-3">
                                    <p><img src="upload/user/medelab.png" class="img-fix" for="3"  id="image_3" type="file" alt="">
                                        <input type="file" id="files3" class="_n files" for="3" name="arrayImg[]" ></p>
                                    <span id="previewImg_3"></span>
                                </div>
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
    <script type="text/javascript">
        $(document).on('click',".time_0" ,function() {
            var id =$(this).attr('for');
//            alert(id);
            if(confirm("Bạn Có Muốn Xóa ?"))
            {
                document.getElementById("image_"+id).src = "upload/user/medelab.png";
                $(this).closest("span" ).fadeOut();
                $("#files"+id).val(null); //xóa tên của file trong input

            }
            else
                return false;
        });
    </script>
    <script type="text/javascript">
        $(document).on('click',".time" ,function() {
//            alert(id);
            if(confirm("Bạn Có Muốn Xóa ?"))
            {
//                document.getElementById("image_"+id).src = "upload/user/medelab.png";
//                $(this).closest("span" ).fadeOut();
//                $("#files"+id).val(null); //xóa tên của file trong input

            }
            else
                return false;
        });
    </script>
@endsection

