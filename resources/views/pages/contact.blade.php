@extends('layout.index')
@section('content')
<section id="contact-info">
    <div class="center">
        <h2>Làm sao để tìm thấy chúng tôi?</h2>
        <p class="lead">Bản đồ ở bên dưới hoặc điện thoại theo số bên dưới để được tư vấn!</p>
    </div>
    <div class="gmap-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 text-center">
                    <div class="gmap">
                        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=JoomShaper,+Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=joomshaper&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,80.332031&amp;ie=UTF8&amp;hq=JoomShaper,&amp;hnear=Dhaka,+Dhaka+Division,+Bangladesh&amp;ll=23.73854,90.385504&amp;spn=0.001515,0.002452&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1073661719450182870&amp;output=embed"></iframe>
                    </div>
                </div>
                <div class="col-sm-7 map-content">
                    <ul class="row">
                        <li class="col-sm-6">
                            <address>
                                <h5>Phòng khám đa khoa MEDELAB</h5>
                                Số 86 - 88 Nguyễn Lương Bằng, Đống Đa, Hà Nội.
                                P: 024.3845.6868
                                E: info@medelab.vn
                                W: http://medelab.vn/
                            </address>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->
<section id="feature" class="ServicesColor transparent-bg  ">
    <div class="container container-fix-top">
        <div class="get-started center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
            <h2 class="ServicesColor">SỐ ĐIỆN THOẠI TƯ VẤN</h2>
            <h2 class="ServicesColor">
                HOTLINE: 1900 6057</h2>
            <div class="request">
                <h4><a href="#">HOTLINE: 1900 6057</a></h4>
            </div>
        </div>
    </div><!--/.container-->
</section>
    @endsection
