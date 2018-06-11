<?php

namespace App\Http\Controllers;

use App\ChuyenKhoa;
use Illuminate\Http\Request;

class ChuyenKhoaController extends Controller
{
    public function getDanhSach()
    {
        $chuyenkhoa = ChuyenKhoa::all();
        return view('admin.chuyenkhoa.danhsach',['chuyenkhoa'=>$chuyenkhoa]);
       // echo $chuyenkhoa;
    }
    public function getThem()
    {
        return view('admin.chuyenkhoa.them');
    }
    public function postThem(Request $request)
    {

       // echo $request->Hinh;
        $this->validate($request,[
           'ten_khoa'=>'required|min:3|max:100|unique:ChuyenKhoa'
        ],[
            'ten_khoa.required'=>'Bạn chưa nhập tên Khoa!',
            'ten_khoa.min'=>'Tên Khoa phải dài hơn 3 ký tự',
            'ten_khoa.max'=>'Tên Khoa không ngắn hơn 100 ký tự',
            'ten_khoa.unique'=>'Tên Khoa đã tồn tại'
        ]);
        $chuyenkhoa = new ChuyenKhoa;
        $chuyenkhoa->ten_khoa = $request->ten_khoa;
        $chuyenkhoa->trangthai = $request->trangthai;
        if($request->GioiThieu != null)
        {
            $chuyenkhoa->khoa_gioithieu =$request->GioiThieu;
        }
        else
        {
            $chuyenkhoa->khoa_gioithieu ="";
        }


        echo $chuyenkhoa;
        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi !='png'&& $duoi!='jpg' )
            {
                return redirect('admin/chuyenkhoa/them')->with('loi','Bạn chỉ đc chọn file có đuôi ipg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_". $name;
            while (file_exists("upload/chuyenkhoa/".$Hinh))
            {
                $Hinh=str_random(4)."_". $name;
            }
            $file->move("upload/chuyenkhoa",$Hinh);
            $chuyenkhoa->khoa_hinhanh=$Hinh;
        }
        else
        {
            $chuyenkhoa->khoa_hinhanh="medelab.png";
        }
        $chuyenkhoa->save();
        return redirect('admin/chuyenkhoa/them')->with('thongbao','Thêm thành công');

    }
    public function getSua($id)
    {
        $chuyenkhoa=ChuyenKhoa::find($id);
        return view('admin/chuyenkhoa/sua',['chuyenkhoa'=>$chuyenkhoa]);
    }
    public function postSua(Request $request,$id)
    {//echo $request->Hinh;
        $chuyenkhoa = ChuyenKhoa::find($id);
        //echo $request->Ten;
        $this->validate($request,[
            'ten_khoa'=>'required|min:3|max:100'
        ],[
            'ten_khoa.required'=>'Bạn chưa nhập tên Khoa!',
            'ten_khoa.min'=>'Tên Khoa phải dài hơn 3 ký tự',
            'ten_khoa.max'=>'Tên Khoa không ngắn hơn 100 ký tự',

        ]);

        $chuyenkhoa->ten_khoa = $request->ten_khoa;
        $chuyenkhoa->trangthai = $request->trangthai;
        if($request->GioiThieu != null)
        {
            $chuyenkhoa->khoa_gioithieu =$request->GioiThieu;
        }
        else
        {
            $chuyenkhoa->khoa_gioithieu ="";
        }

        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi !='png'&& $duoi!='jpg' )
            {
                return redirect('admin/chuyenkhoa/them')->with('loi','Bạn chỉ đc chọn file có đuôi ipg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_". $name;
            while (file_exists("upload/chuyenkhoa/".$Hinh))
            {
                $Hinh=str_random(4)."_". $name;
            }
            //unlink("upload/chuyenkhoa/".$chuyenkhoa->Hinh);
            $file->move("upload/chuyenkhoa",$Hinh);
            $chuyenkhoa->khoa_hinhanh=$Hinh;

        }
        else
        {
            $chuyenkhoa->khoa_hinhanh="";
        }

        $chuyenkhoa->save();
        return redirect('admin/chuyenkhoa/sua/'.$id)->with('thongbao','Sửa thành công');

    }
    public function getXoa($id)
    {
        $chuyenkhoa=ChuyenKhoa::find($id);
        $tenImg=$chuyenkhoa->khoa_hinhanh;
        if($tenImg != 'medelab.png')
        {
            $localtion="upload/chuyenkhoa/";
            $file = $localtion.$tenImg;
            if(file_exists($file))
            {
                unlink($file);
            }
        }

        $delete = $chuyenkhoa->delete();
        if($delete)
        {
            return redirect()->back()->with('thongbao','Xóa thành công !');
        }
    }

    public function getChiTiet($id)
    {
        $chuyenkhoa=ChuyenKhoa::find($id);
       // echo $chuyenkhoa;

        return view('admin.chuyenkhoa.chitiet',['chuyenkhoa'=>$chuyenkhoa]);
        //return view('admin.user.danhsach',['users'=>$users]);
    }
    public function postNoiBat(Request $request,$id)
    {
        $chuyenkhoa = ChuyenKhoa::find($id);
        $chuyenkhoa ->trangthai = $request->txtTrangThai;
        $chuyenkhoa->save();
        return redirect()->back();
    }
}

