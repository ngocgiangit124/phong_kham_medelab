@extends('layout.index')
@section('content')
<section id="blog" class="container">
    <div class="center">
        <h2>{{$chuyenkhoa->ten_khoa}}</h2>
        <p class="lead"></p>
    </div>

    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-item">
                    <img class="img-responsive img-blog" src="upload/chuyenkhoa/{{$chuyenkhoa->khoa_hinhanh}}" width="100%" alt="" />
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 text-center">
                            <div class="entry-meta">
                                <span id="publish_date">{{$chuyenkhoa->created_at}}</span>
                                <span><i class="fa fa-user"></i> <a href="#"> Spectre</a></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 blog-content">
                            <h2>Chi tiết:</h2>
                            {!! $chuyenkhoa->khoa_gioithieu !!}
                            <div class="post-tags">
                                <strong>Tag:</strong> <a href="#">Cool</a> / <a href="#">Creative</a> / <a href="#">Dubttstep</a>
                            </div>

                        </div>
                    </div>
                </div><!--/.blog-item-->

            </div>
            <div class="col-sm-12 col-md-4 ServicesColor">

                <!--fIX NEW FORM-->
                <form accept-charset="UTF-8" action="trangchu/lichkham" class="contact-form" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="col-md-12">
                            <span style=" font-size: 19px;padding-bottom: 7px;display: inline-block;"> ĐẶT LỊCH KHÁM</span>
                        </div>
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    @if(count($errors)>0)
                        <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                                </span>@endif
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="room">Tên khoa phòng</label>
                                <select class="form-control" name="txtKhoa" id="txtKhoa">
                                    <option selected="selected" disabled="disabled">Vui lòng chọn khoa phòng</option>
                                    @foreach($allchuyenkhoa as $allck)
                                        <option value="{{$allck->id}}">{{$allck->ten_khoa}}</option>
                                    @endforeach()
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="room">Bác sĩ</label>
                                <div class="popover-icon"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                                <select class="form-control" name="txtBacSy" id="txtBacSy">
                                    <option selected="selected" disabled="disabled">Chọn Khoa Phòng Trước Khi Chọn Bác Sĩ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="checkin">Ngày tháng khám</label>
                                <div class="popover-icon" > <i class="fa fa-info-circle fa-lg"> </i> </div>
                                <div class="popover-icon" > <i class="fa fa-info-circle fa-lg"> </i> </div>
                                <input name="txtLich" type="date" id="checkin" value="" class="form-control hasDatepicker" placeholder="Đặt ngày khám">
                            </div>
                                <div class="form-group">
                                    <label for=""><span class="">*</span> Họ tên</label>
                                    <input type="text" name="txtTen" placeholder="Họ tên của bạn" class="form-control input-lg" value="">
                                </div>

                                <div class="form-group">
                                    <label for=""><span class="">*</span> Số điện thoại</label>
                                    <input type="number" name="txtSDT" placeholder="Số điện thoại của bạn"  class="form-control input-lg"  value="">
                                </div>
                                <div class="form-group">
                                    <label for=""><span class="">*</span> E-mail</label>
                                    <input  type="email" name="txtEmail" placeholder="Email của bạn"  class="form-control input-lg"  value="">
                                </div>

                                <div class="form-group ">
                                    <label for="contactFormMessage"><span class="">*</span> Nội dung</label>
                                    <textarea  rows="6" name="txtNoiDung" class="form-control" id="contactFormMessage">---Đặt lịch---</textarea>
                                </div>
                            <div class="col-sm-12">
                                <label for="checkin" class="sr-only">Đặt lịch</label>
                                <button type="submit" class="btn btn-primary btn-lg book-now" style="margin-top:28px;">Đặt lịch</button>
                            </div>
                            <p style="padding:5px">(*) Chuyên viên chăm sóc khách hàng sẽ liên lạc với quý khách để xác nhận lịch khám</p>
                            <p>
                                <a href="tel:19006057" class="btn btn-primary ">HOẶC GỌI NGAY HOTLINE: 1900 6057</a>
                            </p>


                            <!--End:Fix NEW FORM-->
                        </div>
                </form>
            </div>
        </div><!--/.row-->

    </div><!--/.blog-->

</section><!--/#blog-->
    @endsection
@section('script')
<script>
    $(document).ready(function () {
        $("#txtKhoa").change(function () {
            var idKhoa =$(this).val();
//                alert(idKhoa);
            $.get("trangchu/ajax/chuyenkhoa/"+idKhoa,function(data){
                //alert(data);
                $("#txtBacSy").html(data);
            });
        });
    });
</script>
    @endsection