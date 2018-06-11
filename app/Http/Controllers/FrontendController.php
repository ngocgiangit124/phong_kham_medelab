<?php

namespace App\Http\Controllers;

use App\BacSy;
use App\BenhNhan;
use App\ChuyenKhoa;
use App\Comment;
use App\HinhAnh;
use App\Slide;
use App\TinTuc;
use App\ChuanDoan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getTrangChu()
    {
        $slide = Slide::where('trangthai','=',1)->take(3)->get();
        $chuyenkhoa=ChuyenKhoa::where('trangthai','=',1)->take(3)->get();
//      foreach ($chuyenkhoa as $value)
//        echo $value;
        return view('thongtin.trangchu',['chuyenkhoa'=>$chuyenkhoa,'slide'=>$slide]);
    }
    public function getThongTin()
    {
        $chuyenkhoa = ChuyenKhoa::all();
        return view('thongtin.phongkham',['chuyenkhoa'=>$chuyenkhoa]);
    }
    public function getBacSy($id)
    {
        $bacsy=BacSy::where([['khoa_id',$id],['trangthai','=',1]])->get();
        return view('thongtin.bacsy',['bacsy'=>$bacsy]);
    }
    public function getChiTietBacSy($id)
    {
        $bacsy=BacSy::find($id);
        return view('chitiet.bacsy',['bacsy'=>$bacsy]);
    }
    public function getDichVu()
    {
        $chuyenkhoa=ChuyenKhoa::all();
        return view('thongtin.dichvu',['chuyenkhoa'=>$chuyenkhoa]);
    }
    public function getChiTietDV($id)
    {
        $chuyenkhoa=ChuyenKhoa::find($id);
        return view('chitiet.chitietphongkham',['chuyenkhoa'=>$chuyenkhoa]);
    }
    public function getTinTuc()
    {
        $tintuc=TinTuc::where('trangthai','=',1)->paginate(2);
        $tintucnoibat=TinTuc::where('trangthai','=',1)->orderBy('id','DESC')->take(3)->get();
        return view('thongtin.tintuc',['tintuc'=>$tintuc,'tintucnoibat'=>$tintucnoibat]);
    }
    public function getChiTietTT($id)
    {
        $tintuc=TinTuc::find($id);
        $tintucnoibat=TinTuc::where('trangthai','=',1)->orderBy('id','DESC')->take(3)->get();
        $comment=Comment::where('tintuc_id','=',$id)->get();
        return view('chitiet.tintuc',['tintuc'=>$tintuc,'comment'=>$comment,'tintucnoibat'=>$tintucnoibat]);
    }
    public function getTraCuu()
    {
        return view('pages.ketqua');
    }
    public function postTraCuu(Request $request)
    {
        $mh = $request->mahoadon;
        $benhnhan = BenhNhan::where('mahoadon','=',$mh)->get();
        $bn = BenhNhan::select('id')->where('mahoadon','=',$mh)->get();
        foreach ($bn as $value) {
            $id = $value->id;

                $hinhanh = HinhAnh::where('benhnhan_id', '=', $id)->get();

            $chuandoan = ChuanDoan::where('benhnhan_id', '=', $id)->get();
            $a['item'] = BenhNhan::select('mahoadon')->get();
            foreach ($a['item'] as $value) {
                if ($value->mahoadon == $mh) {
                    return view('chitiet.benhan', ['benhnhan' => $benhnhan, 'hinhanh' => $hinhanh, 'chuandoan' => $chuandoan]);
//                return view('chitiet.benhan',['benhnhan'=>$benhnhan]);
                }
            }
        }
        return redirect()->back();
    }
}
