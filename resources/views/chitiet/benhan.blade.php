@extends('layout.index')
@section('content')
    <section id="feature" class="transparent-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt50" id="layout-page">
                    <div class="content-page panel-mycss">
                        <div class="panel panel-default panel-mycss ">
                            <div class="panel-heading-mycss panel-heading">
                                <h3 class="panel-title">KẾT QUẢ</h3>
                            </div>
                            <div class="panel-body panel-body-mycss">

                                <div class="row">
                                    <div class="col-md-5">
                                        <h3 class="fix-size h2-color">Hồ sơ bệnh nhân</h3>
                                        <!--Form-->
                                        <form action="trangchu/tracuu" class="kqk-fix-boder" method="POST">
                                            @foreach($benhnhan as $value)
                                            <div class="form-group">
                                                <fieldset>
                                                    <legend style="font-size: 15px ;">
                                                            <label for="exampleInputEmail1">Số biên lai: <span class="span-color-tracuu"> {{$value->mahoadon}}</span> </label><br>
                                                    </legend>
                                                    <legend style="font-size: 15px ;">
                                                        <label for="exampleInputEmail1">Tên bệnh nhân: <span class="span-color-tracuu"> {{$value->benhnhan_ten}}</span> </label><br>
                                                    </legend>
                                                    <legend style="font-size: 15px ;">
                                                        <label for="exampleInputEmail1">Giới tính:
                                                            <span> @if($value->benhnhan_gioitinh== 1)
                                                                       Nam
                                                                       @elseif($value->benhnhan_gioitinh==0)
                                                                       Nữ
                                                            @endif
                                                            </span> </label><br>
                                                    </legend>
                                                    <legend style="font-size: 15px ;">
                                                        <label for="exampleInputEmail1">Tuổi: <span class="span-color-tracuu"> {{$value->benhnhan_tuoi}}</span> </label><br>
                                                    </legend>
                                                    <legend style="font-size: 15px ;">
                                                        <label for="exampleInputEmail1">Địa chỉ: <span class="span-color-tracuu"> {{$value->benhnhan_que}}</span> </label><br>
                                                    </legend>
                                                    <legend style="font-size: 15px ;">
                                                        <label for="exampleInputEmail1">Ngày khám: <span class="span-color-tracuu"> {{ \Carbon\Carbon::parse($value->ngaykham)->format('d/m/Y')}}</span> </label><br>
                                                    </legend>
                                                </fieldset>
                                            </div>
                                            @endforeach
                                            <button type="button" class="btn btn-default  button-mycss">Xuất pdf</button>
                                        </form>
                                        <!--End:Form-->
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col-ms-12" style="margin: 10px">
                                            <img src="//theme.hstatic.net/1000152908/1000233475/14/logo.png?v=297">
                                        </div>
                                        @foreach($chuandoan as $value)
                                            <h3 class="fix-size h2-color">Kết quả khám</h3>
                                        <div  class="col-ms-12 kqk-fix-boder">
                                            <div class="col-ms-12">
                                                <form action="trangchu/tracuu" method="POST">

                                                    <div class="form-group">
                                                        <fieldset>
                                                            <legend style="font-size: 15px ;">
                                                                <label for="exampleInputEmail1">Chuyên khoa: <span class="span-color-tracuu"> {{$value->bacsy->chuyenkhoa->ten_khoa}}</span> </label><br>
                                                            </legend>
                                                            <legend style="font-size: 15px ;">
                                                                <label for="exampleInputEmail1">Bác sỹ:  <span class="span-color-tracuu"> {{$value->bacsy->bacsy_ten}}</span> </label><br>
                                                            </legend>
                                                            <legend style="font-size: 15px ;">
                                                                <label for="exampleInputEmail1"> Bệnh:<span class="span-color-tracuu"> {{$value->nhombenh->nhombenh_ten}}</span> </label><br>
                                                            </legend>
                                                            <legend style="font-size: 15px ;">
                                                                <label for="exampleInputEmail1">Chuẩn đoán :<span class="span-color-tracuu"> {!! $value->chuandoan !!}</span> </label><br>
                                                            </legend>
                                                        </fieldset>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-ms-12">
                                                <label>Ảnh khám :</label>
                                                <div class="portfolio-items">
                                                    @foreach($hinhanh as $anh)
                                                        @if($anh->nhombenh_id == $value->nhombenh_id)
                                                            <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3">
                                                                <div class="recent-work-wrap">
                                                                    <img class="img-responsive" src="upload/benhnhan/{{$anh->hinhanh_ten}}" alt="">
                                                                    <div class="overlay">
                                                                        <div class="recent-work-inner">
                                                                            <a class="preview" href="upload/benhnhan/{{$anh->hinhanh_ten}}" rel="prettyPhoto"><i class="fa fa-eye"></i> Phóng to</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!--/.portfolio-item-->
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection