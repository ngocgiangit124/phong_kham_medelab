@extends('layout.index')
@section('content')
<section id="blog" class="container">
    <div class="center">
        <h2>Tin tức</h2>
        {{--<p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>--}}
    </div>

    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                @foreach($tintuc as $value)
                <div class="blog-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 text-center">
                            <div class="entry-meta">
                                <span id="publish_date">{{$value->created_at}}</span>
                                <span><i class="fa fa-user"></i> <a href="trangchu/tintuc/#">{{$value->tintuc_tacgia}}</a></span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-10 blog-content">
                            <a ><img class="img-responsive img-blog" src="upload/tintuc/{{$value->tintuc_anh}}" width="100%" alt="" /></a>
                            <h2><a >{{$value->tintuc_tieude}}</a></h2>
                            <h3>{!! $value->tintuc_mota !!}</h3>
                            <a class="btn btn-primary readmore" href="trangchu/tintuc/{{$value->id}}">Xem thêm <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div><!--/.blog-item-->
                @endforeach

                <ul class="pagination pagination-lg">
                    {{--<li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>--}}
                    {{--<li class="active"><a href="#">1</a></li>--}}
                  {{----}}
                    {{--<li><a href="#">Next Page<i class="fa fa-long-arrow-right"></i></a></li>--}}
                    {{ $tintuc->links() }}
                </ul><!--/.pagination-->
            </div><!--/.col-md-8-->

            <aside class="col-md-4">
                {{--<div class="widget search">--}}
                    {{--<form role="form">--}}
                        {{--<input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">--}}
                    {{--</form>--}}
                {{--</div><!--/.search-->--}}

                <div class="widget categories">
                    <h3>Tin Nổi bật</h3>
                    <div class="row">
                        @foreach($tintucnoibat as $value)
                            <div class="col-sm-12">

                                <div class="single_comments">
                                    <img src="upload/tintuc/{{$value->tintuc_anh}}" width="100px" alt=""  />
                                    <p>{{$value->tintuc_tieude}}</p>
                                    <div class="entry-meta small muted">
                                        <span>Bởi <a href="#">{{$value->tintuc_tacgia}} </a></span><span>On <a href="#">Tin ?</a></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!--/.recent comments-->

                <div class="widget blog_gallery">
                </div>
            </aside>
        </div><!--/.row-->
    </div>
</section><!--/#blog-->
    @endsection