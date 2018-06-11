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
                                    <img src="upload/slide/{{$value->slide_hinhanh}}" class="img-responsive">
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
    {{--portfolio--}}
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


    @endsection