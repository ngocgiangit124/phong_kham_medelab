@extends('layout.index')
@section('content')
<section id="feature" class="transparent-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt50" id="layout-page">
                <div class="content-page panel-mycss">

                    <div class="panel panel-default panel-mycss ">
                        <div class="panel-heading-mycss panel-heading">
                            <h3 class="panel-title">TRA CỨU KẾT QUẢ</h3>
                        </div>
                        <div class="panel-body panel-body-mycss">
                            <div class="row">
                                <div class="col-md-5">
                                    <!--Form-->
                                    <form action="trangchu/tracuu" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <label for="exampleInputEmail1">Số biên lai</label>
                                            <input type="text" class="form-control input-mycss" id="exampleInputEmail1" name="mahoadon" placeholder="Số biên lai">
                                        </div>

                                        <button type="reset" class="btn btn-default button-mycss">Nhập Lại</button>
                                        <button type="submit" class="btn btn-default  button-mycss">Tra Kết quả</button>
                                    </form>
                                    <!--End:Form-->
                                </div>

                                <div class="col-md-7">
                                    <img src="//theme.hstatic.net/1000152908/1000233475/14/logo.png?v=297">
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