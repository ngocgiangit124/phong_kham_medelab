<?php

namespace App\Http\Controllers;

use App\BacSy;
use App\BenhNhan;
use App\ChuanDoan;
use App\ChuyenKhoa;
use App\HinhAnh;
use App\NhomBenh;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class BenhNhanController extends Controller
{
    public function getDanhSach()
    {
        $benhnhan = BenhNhan::all();
        return view('admin.benhnhan.danhsach',['benhnhan'=>$benhnhan]);
    }
    public function getThem()
    {
        $benhnhan = BenhNhan::all();
        return view('admin.benhnhan.them',['benhnhan'=>$benhnhan]);
    }
    public function postThem(Request $request)
    {
        $chuyenkhoa=ChuyenKhoa::all();
        $bacsy=BacSy::all();
        $nhombenh=NhomBenh::all();
        $this->validate( $request,
            [   'txtMaHoaDon'=>'required|min:3|max:10|unique:benhnhan,mahoadon',
                'txtTen'=>'required|min:3|max:100',
                'txtTuoi'=>'required'
            ],[
                'txtMaHoaDon.required'=>'Bạn chưa nhập mã hóa đơn!',
                'txtMaHoaDon.min'=>'Mã hóa đơn phải dài hơn 3 ký tự',
                'txtMaHoaDon.max'=>'Mã hóa đơn không ngắn hơn 10 ký tự',
                'txtMaHoaDon.unique'=>'Mã hóa đơn bị trùng!',
                'txtTen.required'=>'Bạn chưa nhập tên !',
                'txtTen.min'=>'Tên phải dài hơn 3 ký tự',
                'txtTen.max'=>'Tên không ngắn hơn 100 ký tự',
                'txtTuoi.required'=>'Bạn chưa nhập tên !'
            ]);
        $benhnhan = new BenhNhan;
        $benhnhan->mahoadon=$request->txtMaHoaDon;
        $benhnhan->benhnhan_ten=$request->txtTen;
        $benhnhan->benhnhan_gioitinh=$request->txtGioiTinh;
        $benhnhan->benhnhan_tuoi=$request->txtTuoi;
        $benhnhan->benhnhan_que=$request->txtDiaChi;
        $benhnhan->ngaykham=$request->txtNgayKham;

        $benhnhan ->save();
        if($benhnhan->mahoadon==$request->txtMaHoaDon){
            $id= $benhnhan->id;
            $benhnhan=BenhNhan::find($id);
        }

        //echo 'dathanh cong';
       // return view('admin.benhnhan.themchuandoan',['chuyenkhoa'=>$chuyenkhoa,'bacsy'=>$bacsy,'nhombenh'=>$nhombenh,'benhnhan'=>$benhnhan])->with('thongbao','Thêm thành công hồ sơ');
        return redirect('admin/benhnhan/them/benhan/'.$id)->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $chuyenkhoa=ChuyenKhoa::all();
        //$test=DB::table('comment');
        $hinhanh=HinhAnh::where('benhnhan_id',$id)->get();
        $chuandoan = ChuanDoan::where('benhnhan_id',$id)->get();
        $benhnhan = BenhNhan::find($id);
        return view('admin.benhnhan.sua',['benhnhan'=>$benhnhan,'chuyenkhoa'=>$chuyenkhoa,'hinhanh'=>$hinhanh,'chuandoan'=>$chuandoan]);
    }
    public function postSua(Request $request,$id)
    {
        $benhnhan=BenhNhan::find($id);
        $this->validate( $request,
            [   'txtMaHoaDon'=>'required|min:3|max:10',
                'txtTen'=>'required|min:3|max:100',
                'txtTuoi'=>'required'
            ],[
                'txtMaHoaDon.required'=>'Bạn chưa nhập mã hóa đơn!',
                'txtMaHoaDon.min'=>'Mã hóa đơn phải dài hơn 3 ký tự',
                'txtMaHoaDon.max'=>'Mã hóa đơn không ngắn hơn 10 ký tự',

                'txtTen.required'=>'Bạn chưa nhập tên !',
                'txtTen.min'=>'Tên phải dài hơn 3 ký tự',
                'txtTen.max'=>'Tên không ngắn hơn 100 ký tự',
                'txtTuoi.required'=>'Bạn chưa nhập tên !'
            ]);

        $benhnhan->mahoadon=$request->txtMaHoaDon;
        $benhnhan->benhnhan_ten=$request->txtTen;
        $benhnhan->benhnhan_gioitinh=$request->txtGioiTinh;
        $benhnhan->benhnhan_tuoi=$request->txtTuoi;
        $benhnhan->benhnhan_que=$request->txtDiaChi;
        $benhnhan->ngaykham=$request->txtNgayKham;

        $benhnhan ->save();
        //echo 'dathanh cong';
        return redirect()->back()->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $benhnhan=BenhNhan::find($id);
        $benhnhan->delete();
        return redirect('admin/benhnhan/danhsach')->with('thongbao','Xóa Thành Công');
    }
    public function getThemBenhAn($id)
    {
        $chuyenkhoa=ChuyenKhoa::all();
        $bacsy=BacSy::all();
        $nhombenh=NhomBenh::all();
        $benhnhan=BenhNhan::find($id);
        return view('admin.benhnhan.themchuandoan',['chuyenkhoa'=>$chuyenkhoa,'bacsy'=>$bacsy,'nhombenh'=>$nhombenh,'benhnhan'=>$benhnhan]);
    }
    public function postThemBenhAn(Request $request,$id)
    {
        $this->validate($request, [
            'txtChuyenKhoa'=>'required'
        ], [
            'txtChuyenKhoa.required'=>'Bạn chưa chọn Chuyên Khoa'
        ]);
        $chuandoan = new ChuanDoan();
        $chuandoan ->bacsy_id=$request->txtBacSy;
        $chuandoan ->benhnhan_id=$id;
        $chuandoan ->nhombenh_id=$request->txtBenh;
        $chuandoan ->chuandoan = $request->txtChuanDoan;

        if (Input::hasFile('arrayImg'))
        {
            foreach (Input::file('arrayImg') as $file)
            {
                $hinhanh = new HinhAnh();
                if (isset($file))
                {
                    $duoi = $file->getClientOriginalExtension();
                    if ($duoi != 'jpg' && $duoi != 'png' && $duoi = 'jpeg')
                    {
                        return redirect('admin/benhnhan/themhoso/'.$id)->with('Bug', 'Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
                    }
                    $name = $file->getClientOriginalName();
                    $Hinh = str_random(4) . "_" . $name;
                    while (file_exists("upload/benhnhan/" . $Hinh))
                    {
                        $Hinh = str_random(4) . "_" . $name;
                    }
                    $file->move("upload/benhnhan/", $Hinh);
                    $hinhanh->hinhanh_ten = $Hinh;
                    $hinhanh->benhnhan_id = $id;
                    $hinhanh->nhombenh_id = $request->txtBenh;
                    $hinhanh->hinhanh_title="null";
                    $hinhanh->save();
                    //----------------
                }
            }
//            print_r(Input::file('arrayImg'));
        }
        $chuandoan->save();
        $chuyenkhoa=ChuyenKhoa::all();
        $bacsy=BacSy::all();
        $nhombenh=NhomBenh::all();
        $benhnhan=BenhNhan::find($id);
        return redirect()->back()->with('thongbao','Thêm chuẩn đoán thành công!');
    }
    public function getsuaBenhAn($id)
    {
        $chuyenkhoa=ChuyenKhoa::all();
        $bacsy=BacSy::all();
        $chuandoan = ChuanDoan::find($id);
        $nhombenh = NhomBenh::all();
        $hinhanh=HinhAnh::select('id','hinhanh_ten')->where([['nhombenh_id',$chuandoan->nhombenh_id],['benhnhan_id',$chuandoan->benhnhan_id]])->get();
       //echo $hinhanh;
        return view('admin.benhnhan.suachuandoan',['chuyenkhoa'=>$chuyenkhoa,'hinhanh'=>$hinhanh,'chuandoan'=>$chuandoan,'bacsy'=>$bacsy,'nhombenh'=>$nhombenh]);
    }
    public function postsuaBenhAn(Request $request,$id)
    {
        $chuandoan = ChuanDoan::find($id);
        $benhnhan=$chuandoan->benhnhan_id;
        $chuandoan->benhnhan_id=$benhnhan;
        $chuandoan ->bacsy_id=$request->txtBacSy;
        $chuandoan ->nhombenh_id=$request->txtBenh;
        $chuandoan ->chuandoan = $request->txtChuanDoan;
        if (Input::hasFile('arrayImg'))
        {
            foreach (Input::file('arrayImg') as $file)
            {
                $hinhanh = new HinhAnh();
                if (isset($file))
                {
                    $duoi = $file->getClientOriginalExtension();
                    if ($duoi != 'jpg' && $duoi != 'png' && $duoi = 'jpeg')
                    {
                        return redirect('admin/benhnhan/them')->with('Bug', 'Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
                    }
                    $name = $file->getClientOriginalName();
                    $Hinh = str_random(4) . "_" . $name;
                    while (file_exists("upload/benhnhan/" . $Hinh))
                    {
                        $Hinh = str_random(4) . "_" . $name;
                    }
                    $file->move("upload/benhnhan/", $Hinh);
                    $hinhanh->hinhanh_ten = $Hinh;
                    $hinhanh->benhnhan_id = $benhnhan;
                    $hinhanh->nhombenh_id = $request->txtBenh;
                    $hinhanh->hinhanh_title="null";
                    $hinhanh->save();
                    //----------------
                }
            }
//            print_r(Input::file('arrayImg'));
        }
        $chuandoan->save();

        return redirect('admin/benhnhan/sua/'.$chuandoan->benhnhan_id);
    }
    public function getXoaBenhAn($id)
    {
        $chuandoan = ChuanDoan::find($id);
        $hinhanh =HinhAnh::select('id','hinhanh_ten')->where([['nhombenh_id',$chuandoan->nhombenh_id],['benhnhan_id',$chuandoan->benhnhan_id]])->get();
        foreach($hinhanh as $value)
        {
            $tenImg=$value->hinhanh_ten;
            $localtion="upload/benhnhan/";
            $file = $localtion.$tenImg;
            if(file_exists($file))
            {
                unlink($file);
            }
        }
        $delete = $chuandoan->delete();
        if($delete)
        {
            return redirect()->back()->with('thongbao','Xóa thành công !');
        }
    }
    public function getXoaHinhAnh($id)
    {
        $hinhanh = HinhAnh::find($id);
        $tenImg=$hinhanh->hinhanh_ten;
        $localtion="upload/benhnhan/";
        $file = $localtion.$tenImg;
        if(file_exists($file))
        {
            unlink($file);
        }
        $delete = $hinhanh->delete();
        if($delete)
        {
            return redirect()->back();
        }
    }
}
