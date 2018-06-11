@extends('layout.index')
@section('content')
    <section id="portfolio">
        <div class="container">
            <div class="center">
                <h2>Lựa chọn chuyên khoa</h2>
            </div>

            <div class="row">
               {{--// <div class="portfolio-items">--}}
                @foreach($chuyenkhoa as $khoa)
                    <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-4">
                        <div class="recent-work-wrap col-sm-12 ">
                            <a href="trangchu/thongtin/{{$khoa->id}}"><img class="img-responsive" src="upload/chuyenkhoa/{{$khoa->khoa_hinhanh}}" alt=""></a>
                            <p class="">{{$khoa->ten_khoa}}</p>
                        </div>
                    </div><!--/.portfolio-item-->
                    @endforeach
                {{--</div>--}}
            </div>
        </div>
    </section><!--/#portfolio-item-->
    @endsection