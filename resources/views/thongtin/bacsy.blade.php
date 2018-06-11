@extends('layout.index')
@section('content')
    <section id="feature" class="transparent-bg">
        <div class="container">
            <div class="row">
                @foreach($bacsy as $value)
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="upload/bacsy/{{$value->bacsy_hinhanh}}" class="img-circle" alt="">
                        <h3>{!! $value->bacsy_gioithieu !!}</h3>
                        <h4><span>{{$value->bacsy_ten}}  /</span> <a href="trangchu/thongtin/bacsy/{{$value->id}}">Xem thêm</a></h4>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </section>
@endsection