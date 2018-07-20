@extends('layout.index')
@section('content')
<section id="blog" class="container">
    <div class="center">
        <h2>Tin tức</h2>
    </div>

    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-item">
                    <img class="img-responsive img-blog" src="upload/tintuc/{{$tintuc->tintuc_anh}}" width="100%" alt="" />
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 text-center">
                            <div class="entry-meta">
                                <span id="publish_date">{{\Carbon\Carbon::parse($tintuc->created_at)->format('d/m/Y')}}</span>
                                <span><i class="fa fa-user"></i> <a> {{$tintuc->tintuc_tacgia}}</a></span>
                                <span><i class="fa fa-comment"></i> <a >2 Comments</a></span>
                                <span><i class="fa fa-heart"></i><a >56 Likes</a></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 blog-content">
                            <h2>{{$tintuc->tintuc_tieude}}</h2>
                            {!! $tintuc->tintuc_noidung !!}
                            <div class="post-tags">
                                {{--<strong>Tag:</strong> <a href="#">Cool</a> / <a href="#">Creative</a> / <a href="#">Dubttstep</a>--}}
                            </div>

                        </div>
                    </div>
                </div><!--/.blog-item-->


                <h1 id="comments_title">5 Comments</h1>
                @foreach($comment as $value)
                <div class="media comment_section">
                    <div class="pull-left post_comments">
                        <a href="#"><img src="upload/comment/{{$value->comment_hinhanh}}" class="img-circle" alt="" /></a>
                    </div>
                    <div class="media-body post_reply_comments">
                        <h3>{{$value->comment_tentacgia}}</h3>
                        <h4>{{$value->created_at}}</h4>
                        {!! $value->comment_noidung !!}
                        {{--<a href="#">Trả lời</a>--}}
                    </div>
                </div>
                    @endforeach




            </div><!--/.col-md-8-->

            <aside class="col-md-4">
                {{--<div class="widget search">--}}
                    {{--<form role="form">--}}
                        {{--<input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">--}}
                    {{--</form>--}}
                {{--</div><!--/.search-->--}}

                <div class="widget categories">
                    <h3>Tin nổi bật</h3>
                    <div class="row">
                        @foreach($tintucnoibat as $value)
                        <div class="col-sm-12">
                            <div class="single_comments">
                                <a href="trangchu/tintuc/{{$value->id}}"><img src="upload/tintuc/{{$value->tintuc_anh}}" width="100px" alt=""  /></a>
                                <p>{{$value->tintuc_tieude}}</p>
                                <div class="entry-meta small muted">
                                    <span>Bởi <a >{{$value->tintuc_tacgia}} </a></span><span>On <a>Tin ?</a></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><!--/.recent comments-->
                {{--<div class="widget blog_gallery">--}}
                    {{--<h3>Our Gallery</h3>--}}
                    {{--<ul class="sidebar-gallery">--}}
                        {{--<li><a href="#"><img src="images/blog/gallery1.png" alt="" /></a></li>--}}
                        {{--<li><a href="#"><img src="images/blog/gallery2.png" alt="" /></a></li>--}}
                        {{--<li><a href="#"><img src="images/blog/gallery3.png" alt="" /></a></li>--}}
                        {{--<li><a href="#"><img src="images/blog/gallery4.png" alt="" /></a></li>--}}
                        {{--<li><a href="#"><img src="images/blog/gallery5.png" alt="" /></a></li>--}}
                        {{--<li><a href="#"><img src="images/blog/gallery6.png" alt="" /></a></li>--}}
                    {{--</ul>--}}
                {{--</div><!--/.blog_gallery-->--}}
            </aside>

        </div><!--/.row-->

    </div><!--/.blog-->

</section><!--/#blog-->
@endsection