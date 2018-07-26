<?php

namespace App\Http\Controllers;

use App\BenhNhan;
use App\LichKham;
use App\NhomBenh;
use Illuminate\Http\Request;
use App\BacSy;
use App\User;
use App\ChuyenKhoa;
use Illuminate\Support\Carbon;

class AjaxController extends Controller
{
    public function getBacSy($id)
    {
        $user=User::find($id);
        if($user->user_gioitinh==0)
        {
            $GT="Nữ";
        }
        else
        {
            $GT="Nam";
        };
        //$ngaysinh=Carbon::parse($user->user_ngaysinh);
        $ngaysinh =Carbon::parse($user->user_ngaysinh)->format('d/m/Y');
        //echo $ngaysinh;

                echo "<img class=\"profile-user-img img-responsive img-circle\" id=\"img\" src=\"upload/user/{$user->user_hinhanh}\" alt=\"User profile picture\">

                        <h3 class=\"profile-username text-center\">{$user->name}</h3>

                        <p class=\"text-muted text-center\"></p>

                        <ul class=\"list-group list-group-unbordered\">
                            <li class=\"list-group-item\">
                                <b>Tên Đầy Đủ :</b> <a class=\"pull-right\">{$user->user_tendaydu}</a>
                            </li>
                            
                            <li class=\"list-group-item\">
                                <b>Email :</b> <a class=\"pull-right\">{$user->email}</a>
                            </li>
                            <li class=\"list-group-item\">
                                <b>Sinh Ngày :</b> <a class=\"pull-right\" type=\"date\">$ngaysinh</a>
                            </li>
                            
                            <li class=\"list-group-item\" id=\"GT\">
                                <b>Giới Tính :</b> <a class=\"pull-right\">{$GT}</a>
                            </li>
                        </ul>
                        <a href=\"admin/bacsy/them/{$user->id}\" class=\"btn btn-primary btn-block\"><b>Tạo Thông Tin Bác Sỹ</b></a>";
         //  echo "<img src=upload/bacsy/{{$bacsy->user_hinhanh}} >";
    }
    public function postChuyenKhoa1($id)
    {
//        if (Request::ajax()) {
//            // $idMonHoc=(int)Request::get('idMonHoc');
//            $arr = BacSy::select('bacsy_ten', 'id')->where('id', $id)->get()->toArray();
//        }
//        dd($arr);
//        //return $arr;
    }

    public function getChuyenKhoa($id)
    {
        $bacsy=BacSy::where('khoa_id',$id)->get();
        foreach ($bacsy as $bs)
        {
            echo "<option value='".$bs->id."'>".$bs->bacsy_ten."</option>";
        }
        //return $bacsy;
    }
    public function getNhomBenh($id)
    {
        $benh=NhomBenh::where('khoa_id',$id)->get();
        foreach ($benh as $b)
        {
            echo "<option value='".$b->id."'>".$b->nhombenh_ten."</option>";
        }
        //return $bacsy;
    }
    public function getLich($id)
    {
        $lich =LichKham::find($id);
        $ngaykham =Carbon::parse($lich->ngaykham)->format('d/m/Y');
        echo "  <h3 class=\"profile-username text-center\">Phiếu đặt lịch của id= {$lich->id}</h3>

                        <ul class=\"list-group list-group-unbordered\">
                            <li class=\"list-group-item\">
                                <b>Họ tên :</b> <a class=\"pull-right\">{$lich->ten_nguoikham}</a>
                            </li>
                            <li class=\"list-group-item\">
                                <b>Chọn bác sỹ :</b> <a class=\"pull-right\">{$lich->bacsy->bacsy_ten}</a>
                            </li>

                            <li class=\"list-group-item\" >
                                <b>Đặt ngày khám :</b> <a class=\"pull-right\">$ngaykham</a>
                            </li>
                            <li class=\"list-group-item\" >
                                <b>Số điện thoại :</b> <a class=\"pull-right\">{$lich->dienthoai}</a>
                            </li>
                            <li class=\"list-group-item\" >
                                <b>Email :</b> <a class=\"pull-right\">{$lich->email_nguoikham}</a>
                            </li>
                            <li class=\"list-group-item\" >
                            <strong> Nội Dung</strong>
                            <p class=\"text-muted\">
                                <span  class=\"\" style=\"color: #000\">{$lich->noidung}</span>
                            </p>
                            </li>
                        </ul>

                        <a href=\"admin/lichkham/sua/{$lich->id}\" class=\"btn btn-primary btn-block\"><b>Chỉnh sửa</b></a>
                        <a href=\"admin/lichkham/xoa/{$lich->id}\" class=\"btn btn-primary btn-block\"><b>Xóa</b></a>";
    }
    public function getXemBenhNhan($id)
    {
        $benhnhan =BenhNhan::find($id);
        $ngaykham =Carbon::parse($benhnhan->ngaykham)->format('d/m/Y');
        echo "  <h3 class=\"profile-username text-center\">Số hóa đơn: {$benhnhan->mahoadon}</h3>

                        <ul class=\"list-group list-group-unbordered\">
                            <li class=\"list-group-item\">
                                <b>Họ tên :</b> <a class=\"pull-right\">{$benhnhan->benhnhan_ten}</a>
                            </li>
                            <li class=\"list-group-item\">
                                <b>Giới Tính:</b> <a class=\"pull-right\">{$benhnhan->benhnhan_gioitinh}</a>
                            </li>
                             <li class=\"list-group - item\">
                                <b>Tuổi:</b> <a class=\"pull - right\">{$benhnhan->benhnhan_tuoi}</a>
                            </li>

                            <li class=\"list-group-item\" >
                                <b>Ngày khám :</b> <a class=\"pull-right\">$ngaykham</a>
                            </li>
                            <li class=\"list-group-item\" >
                                <b>Số điện thoại :</b> <a class=\"pull-right\">{$benhnhan->benhnhan_sodienthoai}</a>
                            </li>
                            <li class=\"list-group-item\" >
                                <b>Email :</b> <a class=\"pull-right\">{$benhnhan->benhnhan_email}</a>
                            </li>
                            <li class=\"list-group-item\" >
                              <b>Quê :</b> <a class=\"pull-right\">{$benhnhan->benhnhan_que}</a>
                            </li>
                        </ul>
                        <a href=\"bacsy/benhnhan/chitiet/{$benhnhan->id}\" class=\"btn btn-primary btn-block\"><b>Chi Tiết</b></a>";
    }
}
