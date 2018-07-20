@extends('layout.index')
@section('content')
    <section id="portfolio">
        <div class="container">
            <div class="row">{{--// <div class="portfolio-items">--}}
                    <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap col-xs-12">
                                <img class="img-responsive" src="upload/bacsy/{{$bacsy->bacsy_hinhanh}}" alt="">
                            <p class="text-center">{{$bacsy->bacsy_ten}}</p>
                        </div>
                    </div><!--/.portfolio-item-->
                {{--</div>--}}
                    <div class=" col-sm-4 col-md-6">
                        <div class="panel  panel-primary">
                            <div class="panel-heading"><i class="fa fa-hand-o-right"></i> CHUYÊN NGÀNH</div>
                            <div class="panel-body">
                                <p>{!! $bacsy->bacsy_gioithieu !!}</p>
                           </div>
                        </div>
                        <div class="panel  panel-primary">
                            <div class="panel-heading"><i class="fa fa-info-circle"></i> THÔNG TIN CÁ NHÂN</div>
                            <div class="panel-body">
                                <p>Giới tính: @if($bacsy->user->user_gioitinh==1)
                                        Nam
                                @elseif($bacsy->user->user_gioitinh==0)
                                       Nữ
                                @endif</p>
                                <p>Ngày sinh: {{\Carbon\Carbon::parse($bacsy->user->user_ngaysinh)->format('d/m/Y')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center"><a href="/pages/lien-he">Đặt lịch hẹn</a></div>
                            <div class="panel-body">
                                <a href="tel:19006057">Hotline 19006057</a>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
@endsection