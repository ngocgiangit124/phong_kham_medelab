@extends('layout.index')
@section('content')
    {{--slider--}}
    <section id="main-slider" class="no-margin">
        <div class="carousel slide container-fix">
            <ol class="carousel-indicators">
                <?php $i=0; ?>
                @foreach($slide as $value)
                <li data-target="#main-slider" data-slide-to="{{$i}}" @if($i==0) class="active" @endif></li>
                <?php $i++; ?>
                    @endforeach
            </ol>
            <div class="carousel-inner">
                <?php $i = 0; ?>
                    @foreach($slide as $value)
                <div  @if($i==0) class="item active" @else  class="item " @endif style="background-image: url(upload/slide/{!! $value->slide_hinhnen !!})">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">{{$value->slide_ten}}</h1>
                                    <h2 class="animation animated-item-2">{!! $value->slide_noidung !!}</h2>
                                    {{--<a class="btn-slide animation animated-item-3" href="#">Đọc thêm</a>--}}
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    {{--<img src="upload/slide/{{$value->slide_hinhanh}}" class="img-responsive">--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->
                        <?php $i++; ?>
                    @endforeach
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->
    {{--end slider--}}
    {{--đăng ký lịch khám--}}
    <section id="Calendar" class="ServicesColor transparent-bg Services ">
        <div id="Calendar-div" class="container container-fix">
            {{--<div class="get-started  fix-get-started" style="visibility: visible; animation-name: fadeInDown;">--}}
            <div class="row fix-get-started ">
                <div class="col-md-12">
                    <form style="background-color: #fff; padding: 40px 40px 20px 40px" role="form"  action="trangchu/lichkham" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="row">
                            <div class="col-md-12">
                                <span style="font-size: 19px;padding-bottom: 7px;"> ĐẶT LỊCH PHÒNG KHÁM</span>
                            </div>
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tên khoa phòng</label>
                                    <select class="form-control" name="txtKhoa" id="txtKhoa">
                                        <option selected="selected" disabled="disabled">Vui lòng chọn khoa phòng</option>
                                        @foreach($allchuyenkhoa as $allck)
                                            <option value="{{$allck->id}}">{{$allck->ten_khoa}}</option>
                                        @endforeach()
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 ">
                                <div class="form-group">
                                    <label for="room">Bác sĩ</label>
                                    <select class="form-control" name="txtBacSy" id="txtBacSy">
                                        <option selected="selected" disabled="disabled">Chọn Khoa Phòng Trước Khi Chọn Bác Sĩ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">Ngày tháng khám</label>
                                    <input name="txtLich" type="date" id="checkin" value="" class="form-control hasDatepicker" placeholder="Đặt ngày khám">
                                </div>
                            </div>
                            <div class="col-sm-2" id="fix-button">
                                <button type="button" class="btn btn-primary btn-lg book-now" id="button" style="margin-top:28px;">Đặt lịch</button>
                            </div>
                            <div class="col-sm-2 " hidden id="fix-button1" >
                                <button type="submit" class="btn btn-primary btn-lg book-now" id="button" style="margin-top:28px;">Đặt lịch</button>
                            </div>
                            <div class="col-md-6 " id="fix-hidden" hidden >
                                <div class="form-group">
                                    <label for=""><span class="">*</span> Họ tên</label>
                                    <input type="text" name="txtTen" placeholder="Họ tên của bạn" class="form-control input-lg" value="">
                                </div>
                            </div>
                            <div class="col-md-6" id="fix-hidden1" hidden>
                                <div class="form-group">
                                    <label for=""><span class="">*</span> Số điện thoại</label>
                                    <input type="number" name="txtSDT" placeholder="Số điện thoại của bạn"  class="form-control input-lg"  value="">
                                </div>
                            </div>
                            <div class="col-md-6 " id="fix-hidden2" hidden>
                                <div class="form-group">
                                    <label for=""><span class="">*</span> E-mail</label>
                                    <input  type="email" name="txtEmail" placeholder="Email của bạn"  class="form-control input-lg"  value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group fix" id="fix-hidden3"hidden>
                            <label for="contactFormMessage"><span class="">*</span> Nội dung</label>
                            <textarea  rows="6" name="txtNoiDung" class="form-control" id="contactFormMessage">---Đặt lịch---</textarea>
                        </div>
                        <p style="padding:13px; padding-left:4px;">(*) Chuyên viên chăm sóc khách hàng sẽ liên lạc với quý khách để xác nhận lịch khám</p>
                        <p style="padding-left:4px;">
                            @if(count($errors)>0)
                                <span class="has-error help-block">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </span>@endif
                            <a href="tel:19006057" class="btn btn-primary ">HOẶC GỌI NGAY HOTLINE: 1900 6057</a>
                        </p>
                    </form>
                </div>
            </div>
        </div><!--/.container-->
    </section>
    {{-- end đăng ký lịch khám--}}
    <section id="portfolio" class="Services">
    <div class="container container-fix">
        <div class="center">
            <h2 class="h2-color">CÁC DỊCH VỤ</h2>
            <p class="lead"></p>
        </div>

        {{--Hình ảnh--}}
        <div class="row">
            <div class="portfolio-items col-md-11">
                @foreach($chuyenkhoa as $khoa)
                <div class="portfolio-item apps col-xs-12 col-sm-4  col-md-4">
                    <div class="recent-work-wrap col-sm-12">
                        <img class="img-responsive" src="upload/chuyenkhoa/{{$khoa->khoa_hinhanh}}" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#">{{$khoa->ten_khoa}}</a></h3>
                                <p>để xem xét</p>
                                <a class="preview" href="upload/chuyenkhoa/{{$khoa->khoa_hinhanh}}" rel="prettyPhoto"><i class="fa fa-eye"></i> Phóng to</a>
                                <a href="trangchu/dichvu/{{$khoa->id}}"><button type="button" class="btn btn-primary btn-block button-mycss btn-mycss">Xem chi tiết</button></a>
                            </div>
                        </div>
                        <p class="">{{$khoa->ten_khoa}}</p>
                    </div>
                </div><!--/.portfolio-item-->
                    @endforeach
            </div>
            <div class="col-md-1 ">
                <a href="trangchu/dichvu"><button class="center-mycss button-mycss btn-mycss-xemthem" type="button">Xem Thêm</button></a>
            </div>
        </div>
    </div>
    {{--Services--}}
    </section><!--/#portfolio-item-->
    <section id="feature" class="transparent-bg Services ">
        <div class="container container-fix ">
            <div class="center wow fadeInDown">
                <h2 class="h2-color">DỊCH VỤ TẠI MEDELAB</h2>
            </div>
            <div class="row">
                <div class="features">
                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-bullhorn"></i>
                            {{--<i class=""><img src="upload/slide/service_img_1.png" alt=""></i>--}}
                            <h2 class="h2-color">Tư vấn</h2>
                            <h3>Bạn không còn mất thời gian
                                chờ đợi khám chỉ cần điện thoại tư vấn đăng ký.</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-comments"></i>
                            <h2 >Tiếp đón</h2>
                            <h3>Nhân viên lễ tân check thông tin
                                bạn đã đăng ký, in phiếu khám &
                                chỉ dẫn khám</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cloud-download"></i>
                            <h2>Khám bệnh</h2>
                            <h3>Bạn sẽ được các bác sỹ đầu ngành (viện 108, 103, Bạch Mai, Nhi TW, Sản TW...) thăm khám.</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-leaf"></i>
                            <h2>Chăm sóc sau khám</h2>
                            <h3>Nhân viên CSKH sẽ gọi điện thăm hỏi, nhắc lịch khám, tiếp nhận phản hồi sau khám</h3>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->
        </div><!--/.container-->
    </section>
    {{--gioi thieu binh luan--}}

    {{--tu van set nghiem--}}
    <section id="feature" class="ServicesColor transparent-bg  ">
        <div class="container container-fix">
            <div class="get-started center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                <h2 class="ServicesColor">SỐ ĐIỆN THOẠI TƯ VẤN</h2>
                <h2 class="ServicesColor">LẤY MẪU XÉT NGHIỆM TẠI NHÀ
                    VỚI CHẤT LƯỢNG TỐT NHẤT

                    HOTLINE: 1900 6057</h2>
               <div class="request">
                    <h4><a href="tel:19006057">HOTLINE: 1900 6057</a></h4>
                </div>
            </div>
        </div><!--/.container-->
    </section>
    <section id="middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="skill">
                        <h2>Video</h2>
                        <div class="progress-wrap">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/Staicn6N7FQ" frameborder="0" allowfullscreen=""></iframe>
                        </div>

                    </div>

                </div><!--/.col-sm-6-->

                <div class="col-sm-6 wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="accordion">
                        <h2>Nhận xét của khách hàng</h2>
                        <div class="panel-group" id="accordion1">
                            <div class="panel panel-default">
                                <div class="panel-heading active">
                                    <h3 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                                            Nhận xét 1
                                            <i class="fa fa-angle-right pull-right"></i>
                                        </a>
                                    </h3>
                                </div>

                                <div id="collapseOne1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="media accordion-inner">
                                            <div class="pull-left">
                                                <img class="img-responsive" src="images/accordion1.png">
                                            </div>
                                            <div class="media-body">
                                                <p> Hôm qua mình đưa bố mẹ tới Medelab thăm khám sức khỏe tổng quát mình thấy rất hài lòng . Cám ơn phòng khám . Cảm nhận đầu tiên là phòng khám đẹp , sạch sẽ , bác bảo vệ rất thân thiện và nhiệt tình . Mình có đăng ký thăm khám trước qua tổng đài nên lúc đến khám các bạn lễ tân làm thủ tục thanh toán để các cụ đi thăm khám rất nhanh. Nhân viên hỏi han và chỉ dẫn cũng nhiệt tình. Bác sỹ thăm khám cũng tận tình tư vấn nên các cụ về rất hài lòng . 2 tháng sau mình sẽ đưa các cụ nhà mình quay lại thăm khám lại 1 vài các chỉ số mỡ máu và đường máu nhé. Cám ơn các bạn nhìu   </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
                                            Nhận xét 2
                                            <i class="fa fa-angle-right pull-right"></i>
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseTwo1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Mình có bảo hiểm ở phòng khám này, khi chuyển nơi làm việc mình vẫn muốn khám tại pk, vì máy xét nghiệm ở đây phải nói là rất chuẩn, mình rất tin tưởng và vẫn giới thiệu bạn bè và người thân tới đây xét nghiệm.
                                    </div>
                                </div>
                            </div>

                        </div><!--/#accordion1-->
                    </div>
                </div>

            </div><!--/.row-->
        </div><!--/.container-->
    </section>
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
    <script>
        document.getElementById("button")
            .addEventListener("click", function() {
                document.getElementById("fix-button1").hidden = false;
                document.getElementById("fix-hidden").hidden = false;
                document.getElementById("fix-hidden1").hidden = false;
                document.getElementById("fix-hidden2").hidden = false;
                document.getElementById("fix-hidden3").hidden = false;
                document.getElementById("fix-button").hidden = true;
            }, false);
    </script>
@endsection