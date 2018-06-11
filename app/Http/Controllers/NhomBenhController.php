<?php

namespace App\Http\Controllers;

use App\ChuyenKhoa;
use Illuminate\Http\Request;
use App\NhomBenh;
class NhomBenhController extends Controller
{
    //
    public function getDanhSach()
    {
        $nhombenh = NhomBenh::all();
        return view('admin.nhombenh.danhsach',['nhombenh'=>$nhombenh]);
    }
    public function getThem()
    {
        $chuyenkhoa = ChuyenKhoa::all();
        return view('admin.nhombenh.them',['chuyenkhoa'=>$chuyenkhoa]);
    }
    public function postThem(Request $request)
    {
        $this->validate( $request,
            [ 'txtTen'=>'required|min:3|max:100'
            ],[
                'txtTen.required'=>'Bạn chưa nhập tên tác giả!',
                'txtTen.min'=>'Tên phải dài hơn 3 ký tự',
                'txtTen.max'=>'Tên không ngắn hơn 100 ký tự'
            ]);
        $nhombenh = new NhomBenh();
        $nhombenh->nhombenh_ten=$request->txtTen;
        $nhombenh->khoa_id=$request->txtChuyenKhoa;
        $nhombenh ->save();
        //echo 'dathanh cong';
        return redirect()->back()->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $nhombenh = NhomBenh::find($id);
        $chuyenkhoa = ChuyenKhoa::all();
        return view('admin.nhombenh.sua',['nhombenh'=>$nhombenh , 'chuyenkhoa'=>$chuyenkhoa]);
    }
    public function postSua(Request $request,$id)
    {
        $nhombenh=NhomBenh::find($id);
        $this->validate( $request,
            [ 'txtTen'=>'required|min:3|max:100'
            ],[
                'txtTen.required'=>'Bạn chưa nhập tên tác giả!',
                'txtTen.min'=>'Tên phải dài hơn 3 ký tự',
                'txtTen.max'=>'Tên không ngắn hơn 100 ký tự'
            ]);
        //$nhombenh = new NhomBenh();
        $nhombenh->nhombenh_ten=$request->txtTen;
        $nhombenh->khoa_id=$request->txtChuyenKhoa;
        $nhombenh ->save();
        //echo 'dathanh cong';
        return redirect('admin/nhombenh/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $nhombenh=NhomBenh::find($id);
        $nhombenh->delete();
        return redirect('admin/nhombenh/danhsach')->with('thongbao','Xóa thành công!');
    }
}
