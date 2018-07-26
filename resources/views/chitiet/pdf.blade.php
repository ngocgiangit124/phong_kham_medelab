<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--{!! Html::style('css/bootstrap.min.css') !!}--}}
    <style>
        body {

        font-family: 'Times New Roman',"DejaVu Sans";
            font-size: 12px;
        }
        table{
            width: 100%;
            border-collapse: collapse ;
            margin-bottom: 50px;
        }
        td,th{

            padding: 3px;
            border: 1px solid;
        }
        .form
        {
            width: 100%;
            height: auto;
            border-collapse: collapse ;
        }
        .form>.form-group
        {
            border: 1px solid green;
            width: 100%;
            height: auto;
            border-collapse: collapse ;
        }
        .form-group
        {
         border: 1px solid green;
            width: 100%;
            height: auto;
        }
    </style>

</head>
<body>
<div class="form" style="margin: 10px">
    <img src="upload/logo.png">
</div>
<h1> Thông tin bệnh nhân</h1>
<table>
    <tr>
        <th>Mã hóa đơn</th>
        <th>Tên Bệnh Nhân</th>
        <th>Tuổi</th>
        <th>Giới Tính</th>
        <th>Quê</th>
        <th>Ngày Khám</th>

    </tr>
    @foreach($benhnhan as $value)
        <tr>
            <td>{{$value->mahoadon}}</td>
            <td>{{$value->benhnhan_ten}}</td>
            <td>{{$value->benhnhan_tuoi}}</td>
            <td>
                @if($value->benhnhan_gioitinh == 0)
                    <span class="label label-success">Nam</span>
                @else
                    <span class="label label-warning">Nữ</span>
                @endif
            </td>
            <td>{{$value->benhnhan_que}}</td>
            <td>{{$value->ngaykham}}</td>
        </tr>
    @endforeach
</table>
    @foreach($chuandoan as $value)

        <div class="form">
            <h3 class="fix-size h2-color">Hồ sơ bệnh nhân</h3>
            <form action="trangchu/tracuu" class="form" method="POST">
                <div class="">
                    <h3>
                        <h4 class="form-group" style="font-size: 15px ;">
                            <label for="exampleInputEmail1">Chuyên khoa: <span class="span-color-tracuu"> {{$value->bacsy->chuyenkhoa->ten_khoa}}</span> </label><br>
                        </h4>
                        <h4 class="form-group" style="font-size: 15px ;">
                            <label for="exampleInputEmail1">Bác sỹ:  <span class="span-color-tracuu"> {{$value->bacsy->bacsy_ten}}</span> </label><br>
                        </h4>
                        <h4 class="form-group" style="font-size: 15px ;">
                            <label for="exampleInputEmail1"> Bệnh:<span class="span-color-tracuu">{{$value->nhombenh->nhombenh_ten}}</span> </label><br>
                        </h4>
                        <h4  class="form-group" style="font-size: 15px ;">
                            <label for="exampleInputEmail1">Chuẩn đoán :<span class="span-color-tracuu"> {!! $value->chuandoan !!}</span> </label><br>
                        </h4>
                    </h3>
                </div>

            </form>
            <div class="form">
                <h4><label>Ảnh khám :</label></h4>
                @foreach($hinhanh as $anh)
                    @if($anh->nhombenh_id == $value->nhombenh_id)
                        <div class="portfolio-items isotope" style="position: relative; overflow: hidden; height: 145px;">
                            <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);">
                                <div class="recent-work-wrap">
                                    <img style="height: auto;width: 200px;" class="img-responsive" src="upload/benhnhan/{{$anh->hinhanh_ten}}" alt="">
                                </div>
                            </div><!--/.portfolio-item-->
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endforeach
</body>
</html>