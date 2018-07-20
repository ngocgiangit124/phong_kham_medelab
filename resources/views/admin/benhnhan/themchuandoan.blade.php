@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm
            <small>Chuẩn đoán bệnh</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/benhnhan/them">Bệnh nhân</a></li>
            <li class="active">Hồ sơ</li>
            <li class="active">Thêm</li>
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
              {{--thêm chuẩn đoán--}}
              <div class="col-md-9">
                  <div class="box">
                      <div class="box-body">
                          <form role="form"  name="add" action="admin/benhnhan/them/benhan/{{$benhnhan->id}}" method="post" enctype="multipart/form-data">
                              @if(count($errors)>0)
                                  <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                          {{$err}}<br>
                                      @endforeach
                                </span>@endif
                              <!-- input states -->
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              {{--khoa--}}
                              <div class="form-group">
                                  <label class="">Chuyên Khoa</label>
                                  <select class="form-control" name="txtChuyenKhoa" id="txtKhoa">
                                      <option value="null"></option>
                                      @foreach($chuyenkhoa as $ck)
                                      <option value="{{$ck->id}}">{{$ck->ten_khoa}}</option>
                                      @endforeach()
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label class="">Bác Sỹ</label>
                                  <select class="form-control" name="txtBacSy" id="txtBacSy">
                                      {{--@foreach($bacsy as $bs)--}}
                                      {{--<option value="{{$bs->id}}">{{$bs->bacsy_ten}}</option>--}}
                                      {{--@endforeach()--}}
                                  </select>
                              </div>
                              {{--tên bệnh--}}
                              <div class="form-group">
                                  <label class="">Nhóm Bệnh</label>
                                  <select class="form-control" name="txtBenh" id="txtTenBenh">
                                      {{--@foreach($nhombenh as $b)--}}
                                      {{--<option value="{{$b->id}}">{{$b->nhombenh_ten}}</option>--}}
                                      {{--@endforeach()--}}
                                  </select>
                              </div>
                              {{--<!-- ckeditor--> noi dung--}}
                              <div class="form-group">
                                  <label>Chuẩn Đoán </label>
                                  <textarea id="editor1" class="form-control ckeditor" rows="5" name="txtChuanDoan" ></textarea>
                              </div>
                              {{--img--}}
                              {{--<label for="exampleInputFile"> Hình Ảnh</label>--}}
                              {{--<div class="input-group margin" id="insert">--}}
                                  {{--<div class="input-group margin" id="insert">--}}
                                  {{--<input type="file" name="arrayImg[]" class="form-control">--}}
                                  {{--<span class="input-group-btn">--}}
                                    {{--<button type="button" class="btn btn-info btn-flat addImages" >Add Img</button>--}}
                                      {{--<button type="button" class="btn btn-info btn-flat " >Delete</button>--}}
                                  {{--</span>--}}
                                  {{--</div>--}}
                              {{--</div>--}}
                              {{--hinh anh--}}
                              <div class="form-group col-md-12 addimg" id="insert">
                                  <label for="exampleInputFile" class="col-md-12">File Hình Ảnh</label>
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
                                  {{--button-adđ--}}
                                  {{--<div class="box-footer col-md-12">--}}
                                      {{--<button type="button" class="btn btn-primary pull-right" id="addImages"  >Thêm ảnh</button>--}}
                                  {{--</div>--}}
                                  <div class="box-footer col-md-12">
                                      <span id="previewImg"></span> <!-- span hứng images chọn từ fle -->
                                      <img class="hinh1" type="image" src="upload/user/medelab.png" width="100px"/> <!-- ảnh để chọn file -->
                                      <input type="image" name="" id="">
                                      <input style="display: none " type='file' id="files" name="arrayImg[]" multiple="multiple" />
                                  </div>

                              <div class="box-footer col-md-12">
                                  <button type="submit" class="btn btn-primary">Tạo</button>
                                  <button type="reset" class="btn btn-primary">Làm mới</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              {{--thông tin bệnh nhân--}}
              <div class="col-md-3">
                  <div class="box box-primary">
                      <div class="box-header with-border">
                          <h3 class="box-title">Hồ sơ bệnh nhân </h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          {{--Mã hóa đơn :--}}
                          <strong><i class="fa fa-book margin-r-5"></i> Mã hóa đơn : </strong>
                          <p class="text-muted">
                              <strong> <span class="span-color">{{$benhnhan->mahoadon}}</span></strong>
                          </p>
                          <hr>
                          {{--Tên bệnh nhân :--}}
                          <strong><i class="fa fa-book margin-r-5"></i> Tên bệnh nhân : </strong>
                          <p class="text-muted">
                              <strong><span class="span-color">{{$benhnhan->benhnhan_ten}}</span></strong>
                          </p>
                          <hr>
                          {{--Tuổi--}}
                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tuổi</strong>
                          <p class="text-muted">
                              <strong> <span class="span-color">{{$benhnhan->benhnhan_tuoi}}</span></strong>
                          </p>
                          <hr>
                          {{--Giới tính--}}
                          <strong><i class="fa fa-map-marker margin-r-5"></i> Giới tính</strong>
                          <p class="text-muted">
                              @if($benhnhan->benhnhan_gioitinh ==1)
                                  <span class="label label-danger">Nam</span>
                                @elseif($benhnhan->user_gioitinh==0)
                                  <span class="label label-danger">Nữ</span>
                                @endif
                          </p>
                          <hr>
                          {{--Địa chỉ--}}
                          <strong><i class="fa fa-map-marker margin-r-5"></i> Địa chỉ</strong>
                          <p class="text-muted">
                              <span class="span-color">{{$benhnhan->benhnhan_que}}</span>
                          </p>
                          <hr>
                          {{--ngaykham--}}
                          <strong><i class="fa fa-map-marker margin-r-5"></i> Địa chỉ</strong>
                          <p class="text-muted">
                              <strong><span class="span-color">{{ \Carbon\Carbon::parse($benhnhan->ngaykham)->format('d/m/Y')}}</span></strong>
                          </p>
                          <hr>
                          {{--<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>--}}
                          {{--<p>--}}
                          {{--<span class="label label-danger">UI Design</span>--}}
                          {{--<span class="label label-success">Coding</span>--}}
                          {{--<span class="label label-info">Javascript</span>--}}
                          {{--<span class="label label-warning">PHP</span>--}}
                          {{--<span class="label label-primary">Node.js</span>--}}
                          {{--</p>--}}

                          {{--<hr>--}}

                          {{--<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>--}}

                          {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>--}}
                      </div>
                      <!-- /.box-body -->
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
    <script>
        $(document).ready(function () {
            $("#txtKhoa").change(function () {
                var idKhoa =$(this).val();
                //alert(idKhoa);
                $.get("admin/ajax/chuandoan2/"+idKhoa,function(data){
                    //  alert(data);
                    $("#txtTenBenh").html(data);
                });
            });
        });
    </script>
    <script src="admin_asset/bower_components/ckeditor/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("img[type='image']").click(function() {
                $("input[id='files']").click();
//                    alert($('#files').val());
            });
        });
    </script>
    <!-- hàm chọn ảnh -->
    <script type="text/javascript" >
        function handleFileSelect(evt) {
            var files = evt.target.files; // FileList object

            // Loop through the FileList and render image files as thumbnails.
            for (var i = 0, f; f = files[i]; i++) {
                // Only process image files.
                if (!f.type.match('image.*')) {
                    continue;
                }
                var reader = new FileReader(); //biến hiện images ra
                // Closure to capture the file information.
                reader.onload = (function (theFile) {
                    return function (e) {
                        // render thumbnail.
                        var inputsrc = $('#files').val();
                        var span = document.createElement('span');
                        span.innerHTML = ['<div class="col-md-3"><input style="display: none " type="file" id="files" value='+inputsrc+' name="arrayImg[]" multiple="multiple"/><img class="thumb img-fix" src="', e.target.result,'" title="', escape(theFile.name), '"/>' ,'<i class="fa fa-times time " ></i></div>'].join('');
                        document.getElementById('previewImg').insertBefore(span, null); //chèn images vào span dựng sẵn có ID previewImg

                    };
                })
                (f);
                // Read in the image file as a data URL.
                reader.readAsDataURL(f);
            }
        }
        document.getElementById('files').addEventListener('change', handleFileSelect, false);
    </script>
    <!-- hàm xóa ảnh -->
    {{--<script type="text/javascript">--}}
        {{--$(document).on('click',".time" ,function() {--}}
            {{--if(confirm("Bạn Có Muốn Xóa ?"))--}}
            {{--{--}}
                {{--$(this).closest("span" ).fadeOut();--}}
                {{--$("#files").val(null); //xóa tên của file trong input--}}
            {{--}--}}
            {{--else--}}
                {{--return false;--}}
        {{--});--}}
    {{--</script>--}}
    <script type="text/javascript">
        $(document).on('click',".time_0" ,function() {
            var id =$(this).attr('for');
            alert(id);
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
    document.getElementById("files4").onchange = function () {
    var reader = new FileReader();
    var stt =$(this).attr('for');
    reader.onload = function (e) {
    document.getElementById("image_"+stt).src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
    };
    </script>

@endsection

