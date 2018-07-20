<?php

namespace App\Http\Controllers;

use App\LichKham;
use Illuminate\Http\Request;

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
        return view('admin.bacsy.sua', ['lich' => $lich, 'chuyenkhoa' => $chuyenkhoa]);
    }

    public function postSua(Request $request, $id)
    {
//        echo $request->Hinh;
        $bacsy = BacSy::find($id);

        $this->validate($request, [
            'Ten' => 'required|min:3|max:100',
            'Khoa' => 'required'

        ], [
            'Ten.required' => 'Bạn chưa nhập Tên',
            'Ten.min' => 'Tên ngừoi nhiều  hơn 3 ký tự',
            'Ten.max' => 'Tên ngừoi phải ít hơn 100 ký tự',
            'Khoa.required' => 'Bạn chưa nhập Tên'

        ]);

        $bacsy->bacsy_ten = $request->Ten;
        $bacsy->khoa_id = $request->Khoa;
        $bacsy->trangthai = $request->trangthai;
        $bacsy->bacsy_gioithieu = $request->GioiThieu;
        if ($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi = 'jpeg') {
                return redirect('admin/bacsy/sua/' . $id)->with('Bug', 'Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4) . "_" . $name;
            while (file_exists("upload/bacsy/" . $Hinh)) {
                $Hinh = str_random(4) . "_" . $name;
            }
            $file->move("upload/bacsy/", $Hinh);
            if (($bacsy->bacsy_hinhanh) != "medelab.png") {
                unlink("upload/bacsy/" . $bacsy->bacsy_hinhanh);
            }
            $bacsy->bacsy_hinhanh = $Hinh;
        }
        // else
//        {
//            $bacsy->bacsy_hinhanh="medelab.png";
//        }
        $bacsy->save();
        //echo 'dathanh cong';
        return redirect('admin/bacsy/sua/' . $id)->with('thongbao', 'Sửa thành công');

    }

    public function getThongTin()
    {
        $user = User::where('user_level', 2)->orderBy('id', 'desc')->paginate(10);

        return view('admin.bacsy.thongtin', ['user' => $user]);
    }

    public function getThem($id)
    {
        $user = User::find($id);
        $chuyenkhoa = ChuyenKhoa::all();
        return view('admin.bacsy.them', ['user' => $user, 'chuyenkhoa' => $chuyenkhoa]);
    }

    public function postThem(Request $request, $id)
    {

        $this->validate($request, [
            'txtTen' => 'required|min:3|max:100',
            'txtKhoa' => 'required'

        ], [
            'txtTen.required' => 'Bạn chưa nhập Tên',
            'txtTen.min' => 'Tên ngừoi nhiều  hơn 3 ký tự',
            'txtTen.max' => 'Tên ngừoi phải ít hơn 100 ký tự',
            'txtKhoa.required' => 'Bạn chưa nhập Tên'

        ]);
        $bacsy = new BacSy;
        $bacsy->bacsy_ten = $request->txtTen;
        $bacsy->khoa_id = $request->txtKhoa;
        $bacsy->user_id = $id;
        $bacsy->bacsy_gioithieu = $request->txtGioiThieu;
        $bacsy->trangthai = $request->trangthai;
        if ($request->hasFile('txtHinh')) {
            $file = $request->file('txtHinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi = 'jpeg') {
                return redirect('admin/bacsy/them/' . $id)->with('Bug', 'Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4) . "_" . $name;
            while (file_exists("upload/bacsy/" . $Hinh)) {
                $Hinh = str_random(4) . "_" . $name;
            }
            $file->move("upload/bacsy/", $Hinh);
            //unlink("upload/bacsy/".$bacsy->bacsy_hinhanh);
            $bacsy->bacsy_hinhanh = $Hinh;
        } else {
            $bacsy->bacsy_hinhanh = "medelab.png";
        }
        $bacsy->save();
        //echo 'dathanh cong';
        return redirect('admin/bacsy/thongtin')->with('thongbao', 'Sửa thành công');
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
}
