@extends('admin.layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa Thông tin
            <small>Bệnh nhân</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="admin/benhnhan/them">Bệnh nhân</a></li>
            <li class="active">sửa</li>
        </ol>
    </section>
    <section class="content">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
            @foreach($chuandoan as $value)
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#timeline" data-toggle="tab" aria-expanded="true">{{$value->bacsy->chuyenkhoa->ten_khoa}}</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane active" id="">
                            <!-- The timeline -->
                            <ul class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-red">
                          {{ \Carbon\Carbon::parse($benhnhan->ngaykham)->format('d/m/Y')}}
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i></span>
                                        <h3 class="timeline-header no-border"><a class="fix-font-weight">Bác Sỹ :</a> <span class="span-color">{{$value->bacsy->bacsy_ten}}</span>
                                        </h3>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-comments bg-yellow"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> </span>
                                        <h3 class="timeline-header"><a >Chuẩn Đoán Bệnh : </a> <span class="span-color">{{$value->nhombenh->nhombenh_ten}}</span></h3>
                                        <div class="timeline-body">
                                            <span class="span-color"> {!! $value->chuandoan !!}</span>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-camera bg-purple"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> </span>
                                        <h3 class="timeline-header"><a >Hình Ảnh:</a> <span class="span-color">Chuẩn đoán bệnh</span></h3>
                                        <div class="timeline-body">
                                            @foreach($hinhanh as $ha)
                                                @if($ha->nhombenh_id==$value->nhombenh_id)
                                                    <img src="upload/benhnhan/{{$ha->hinhanh_ten}}" width="150px" alt="..." class="margin">
                                                    @elseif($ha->nhombenh_id=="")
                                                    <img src="http://placehold.it/150x100.png" alt="..." class="margin">
                                                    @endif
                                                @endforeach
                                        </div>
                                    </div>
                                </li>
                              {{--//  <div class="box-footer fix-btn">--}}
                                    {{--<button type="submit" class="btn btn-warning btn-lg"><a href="admin/benhnhan/sua/benhan/{{$value->id}}">Chỉnh Sửa</a></button>--}}
                                {{--</div>--}}
                                <div class="box-footer fix-btn">
                                    <button type="submit" class="btn btn-warning"><a href="admin/benhnhan/benhan/sua/{{$value->id}}">Chỉnh Sửa</a></button>
                                    <button type="button" class="btn btn-warning"><a href="admin/benhnhan/benhan/xoa/{{$value->id}}">Xóa</a></button>
                                </div>
                                <!-- END timeline item -->
                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->@endforeach
            </div>
            <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <!-- /.box-header -->
                            <h3 class="box-title">Hồ Sơ bệnh nhân</h3>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-body">
                            <form role="form" action="admin/benhnhan/sua/{{$benhnhan->id}}" method="post" enctype="multipart/form-data">
                                <!-- input states -->
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                {{--//mã hóa đơn--}}
                                <div class="form-group">
                                    @if(count($errors)>0)
                                        <span class="has-error help-block">
                                            @foreach($errors->all() as $err)
                                                {{$err}}<br>
                                            @endforeach
                                        </span>@endif
                                    <label class="span-color"> Mã Hóa Đơn</label>
                                    <input  width="300px" class="form-control" name="txtMaHoaDon" id="inputError" value="{{$benhnhan->mahoadon}}" placeholder="Mã hóa dơn ...">
                                </div>
                                {{--tên bênh nhân--}}
                                <div class="form-group">
                                    <label class="span-color"> Tên Bệnh Nhân</label>
                                    <input  class="form-control" name="txtTen" value="{{$benhnhan->benhnhan_ten}}" id="inputError" placeholder="Tên bệnh nhân ...">
                                </div>
                                {{--gioi tinh--}}
                                <div class="form-group">
                                    <label class="span-color">Giới Tính</label>
                                    <select class="form-control" name="txtGioiTinh" id="Khoa">
                                        <option value="0" @if($benhnhan->benhnhan_gioitinh == 0)
                                            {{"selected"}}
                                                @endif>Nữ </option>
                                        <option value="1" @if($benhnhan->benhnhan_gioitinh == 1)
                                            {{"selected"}}
                                                @endif>Nam </option>
                                    </select>
                                </div>
                                {{--tuoi--}}
                                <div class="form-group">
                                    <label class="span-color"> Tuổi</label>
                                    <input type="number" class="form-control" name="txtTuoi" value="{{$benhnhan->benhnhan_tuoi}}" id="inputError" placeholder="Tuổi ...">
                                </div>

                                {{-- dia chi--}}
                                <div class="form-group">
                                    <label class="span-color"> Địa Chỉ</label>
                                    <input  class="form-control" name="txtDiaChi" id="inputError" value="{{$benhnhan->benhnhan_que}}" placeholder="Địa Chỉ ...">
                                </div>
                                {{--ngay kham--}}
                                <div class="form-group">
                                    <label class="span-color">Ngày Khám </label>
                                    <input type="date" class="form-control" name="txtNgayKham" value="{{$benhnhan->ngaykham}}" id="inputError" placeholder=" ...">
                                </div>



                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.end box-body -->
                    </div>
                </div>
        </div>
    </section>

@endsection

<!-- CK Editor -->
<script src="admin_asset/bower_components/ckeditor/ckeditor.js"></script>