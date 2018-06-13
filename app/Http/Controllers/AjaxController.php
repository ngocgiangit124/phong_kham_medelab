<?php

namespace App\Http\Controllers;

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

}
