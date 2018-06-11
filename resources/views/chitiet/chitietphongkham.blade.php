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

        </div><!--/.row-->

    </div><!--/.blog-->

</section><!--/#blog-->
    @endsection