<?php

namespace App\Http\Controllers;

use App\BacSy;
use App\ChuanDoan;
use App\ChuyenKhoa;
use App\LichKham;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LichKhamController extends Controller
{

    //
    public function getDanhSachWait()
    {
        $lich = LichKham::Where('trangthai','=','0')->get();
        return view('admin.lichkham.danhsachwait', ['lich' => $lich]);
    }
    public function getDanhSachPassed()
    {
        $lich = LichKham::Where('trangthai','=','1')->get();
        return view('admin.lichkham.danhsachpassed', ['lich' => $lich]);
    }
    public function getDanhSachFailed()
    {
        $lich = LichKham::Where('trangthai','=','2')->get();
        return view('admin.lichkham.danhsachfailed', ['lich' => $lich]);
    }

    public function getSua($id)
    {
        $lich = LichKham::find($id);
        $chuyenkhoa = ChuyenKhoa::all();
        $bacsy =BacSy::all();
        return view('admin.lichkham.sua', ['lich' => $lich, 'chuyenkhoa' => $chuyenkhoa,'bacsy'=>$bacsy]);
    }

    public function postSua(Request $request, $id)
    {

        $this->validate($request, [
            'txtTen' => 'required|min:3|max:100',
            'txtBacSy' =>' required',
            'txtNgayKham'=>'required',
            'txtSDT'=>'required',
            'txtNoiDung'=>'required'
        ], [
            'txtTen.required' => 'Bạn chưa nhập Tên',
            'txtTen.min' => 'Tên ngừoi nhiều  hơn 3 ký tự',
            'txtTen.max' => 'Tên ngừoi phải ít hơn 100 ký tự',
            'txtBacSy.required' => 'Bạn chưa chọn Bác Sỹ',
            'txtNgayKham.required' => 'Bạn chưa nhập ngày khám',
            'txtSDT.required' => 'Bạn chưa nhập số điện thoại',
            'txtNoiDung.required' => 'Bạn chưa nhập nội dung',
        ]);
        $lich = LichKham::find($id);
        $lich->ten_nguoikham = $request->txtTen;
        $lich->bacsy_id = $request->txtBacSy;
        $lich->ngaykham = $request->txtNgayKham;
        $lich->noidung = $request->txtNoiDung;
        $lich->dienthoai =$request->txtSDT;
        $lich->email_nguoikham=$request->txtEmail;
        $lich->trangthai = $request->txtTrangThai;
        $lich->save();
        return redirect()->back()->with('thongbao', 'Sửa thành công');
    }

    public function getThongTin()
    {
        $user = User::where('user_level', 2)->orderBy('id', 'desc')->paginate(10);

        return view('admin.bacsy.thongtin', ['user' => $user]);
    }

    public function getThem()
    {
        $chuyenkhoa = ChuyenKhoa::all();
        return view('admin.lichkham.them',['chuyenkhoa'=>$chuyenkhoa]);
    }

    public function postThem(Request $request)
    {

        $this->validate($request, [
            'txtTen' => 'required|min:3|max:100',
            'txtBacSy' =>' required',
            'txtNgayKham'=>'required',
            'txtSDT'=>'required',
            'txtNoiDung'=>'required'
        ], [
            'txtTen.required' => 'Bạn chưa nhập Tên',
            'txtTen.min' => 'Tên ngừoi nhiều  hơn 3 ký tự',
            'txtTen.max' => 'Tên ngừoi phải ít hơn 100 ký tự',
            'txtBacSy.required' => 'Bạn chưa chọn Bác Sỹ',
            'txtNgayKham.required' => 'Bạn chưa nhập ngày khám',
            'txtSDT.required' => 'Bạn chưa nhập số điện thoại',
            'txtNoiDung.required' => 'Bạn chưa nhập nội dung',
        ]);
        $lich = new LichKham();
        $lich->ten_nguoikham = $request->txtTen;
        $lich->bacsy_id = $request->txtBacSy;
        $lich->ngaykham = $request->txtNgayKham;
        $lich->noidung = $request->txtNoiDung;
        $lich->dienthoai =$request->txtSDT;
        $lich->email_nguoikham=$request->txtEmail;
        $lich->trangthai = $request->txtTrangThai;
        $lich->save();
        return redirect()->back()->with('thongbao', 'Thêm thành công');
    }
    public function getXoa($id)
    {
        $lich = LichKham::find($id);
        $delete = $lich->delete();
        if ($delete) {
            return redirect()->back()->with('thongbao', 'Xóa thành công !');
        }
    }
    public function postKiemTra(Request $request, $id)
    {
        $lich = LichKham::find($id);
        $lich->trangthai = $request->txtTrangThai;
        $lich->save();
        return redirect()->back();
    }
    public function postTimKiemWait(Request $request)
    {
//        $ngaykham = Carbon::parse($request->txtNgayKham)->format('Y-m-d');

        $lich = LichKham::where([['ngaykham','=',$request->txtNgayKham],['trangthai','=','0']])->get();
        return view('admin.lichkham.danhsachwait', ['lich' => $lich]);

    }
    public function postTimKiemPassed(Request $request)
    {
//        $ngaykham = Carbon::parse($request->txtNgayKham)->format('Y-m-d');

        $lich = LichKham::where([['ngaykham','=',$request->txtNgayKham],['trangthai','=','1']])->get();
        return view('admin.lichkham.danhsachpassed', ['lich' => $lich]);

    }
    public function postTimKiemFailed(Request $request)
    {
          $ngaykham = $request->txtNgayKham;

        $lich = LichKham::where([['ngaykham','=',$request->txtNgayKham],['trangthai','=','2']])->get();
        return view('admin.lichkham.danhsachfailed', ['lich' => $lich,'ngaykham'=>$ngaykham]);

    }

}
