<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
        $slide = Slide::all();
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getThem()
    {
        return view('admin.slide.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'txtTen' => 'required|min:3|max:100'
        ], [
            'txtTen.required' => 'Bạn chưa nhập Tên',
            'txtTen.min' => 'Tên ngừoi nhiều  hơn 3 ký tự',
            'txtTen.max' => 'Tên ngừoi phải ít hơn 100 ký tự'
        ]);
        $slide = new Slide;
        $slide->slide_ten = $request->txtTen;
        $slide->slide_noidung = $request->txtNoiDung;
        $slide->slide_link = $request->txtLink;
        $slide->trangthai = $request->trangthai;
//        hinh nen------------------------------------------------------
        if ($request->hasFile('txtHinhNen')) {
            $file = $request->file('txtHinhNen');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi = 'jpeg') {
                return redirect('admin/slide/them')->with('Bug', 'Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4) . "_" . $name;
            while (file_exists("upload/slide/" . $Hinh)) {
                $Hinh = str_random(4) . "_" . $name;
            }
            $file->move("upload/slide/", $Hinh);
            //unlink("upload/bacsy/".$bacsy->bacsy_hinhanh);
            $slide->slide_hinhnen = $Hinh;
        } else {
            return redirect()->back()->with('bugloi', ' Chưa nhập ảnh nền!');
        }

//        hinh anh dong-------------------------------------------------------------
        if($request->hasFile('txtHinhAnh'))
        {
            $file=$request->file('txtHinhAnh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg')
            {
                return redirect('admin/slide/them')->with('Bug','Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/slide/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/slide/",$Hinh);
            //unlink("upload/bacsy/".$bacsy->bacsy_hinhanh);
            $slide->slide_hinhanh=$Hinh;
        }
        else
        {
            $slide->slide_hinhanh="";
        }

        $slide ->save();
        //echo 'dathanh cong';
        return redirect('admin/slide/danhsach')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $slide=Slide::find($id);
        //echo $slide;
       return view('admin.slide.sua',['slide'=>$slide]);
    }
    public function postSua(Request $request,$id)
    {
        $slide = Slide::find($id);
        $this->validate($request,[
            'txtTen'=>'required|min:3|max:100'
        ],[
            'txtTen.required'=>'Bạn chưa nhập Tên',
            'txtTen.min'=>'Tên ngừoi nhiều  hơn 3 ký tự',
            'txtTen.max'=>'Tên ngừoi phải ít hơn 100 ký tự'
        ]);
        $slide -> slide_ten = $request->txtTen;
        $slide -> slide_noidung= $request->txtNoiDung;
        $slide -> slide_link= $request->txtLink;
        $slide ->trangthai=$request->trangthai;
//        hinh nen------------------------------------------------------
        if($request->hasFile('txtHinhNen'))
        {
            $file=$request->file('txtHinhNen');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg')
            {
                return redirect('admin/slide/them')->with('Bug','Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/slide/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/slide/",$Hinh);
            // unlink("upload/slide/".$slide->slide_hinhnen);
            $slide->slide_hinhnen=$Hinh;
        }
//        hinh anh dong-------------------------------------------------------------
        if($request->hasFile('txtHinhAnh'))
        {
            $file=$request->file('txtHinhAnh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg')
            {
                return redirect('admin/slide/sua'.$id)->with('Bug','Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/slide/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/slide/",$Hinh);
            //unlink("upload/slide/".$slide->slide_hinhanh);
            $slide->slide_hinhanh=$Hinh;
        }
        else
        {
            $slide->slide_hinhanh="";
        }

        $slide ->save();
        //echo 'dathanh cong';
        //echo 'dathanh cong';
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $slide = Slide::find($id);
//        $slide->delete();
//        unlink("upload/slide/".$slide->slide_hinhanh);
//        unlink("upload/slide/".$slide->slide_hinhnen);
//        return redirect('admin/slide/danhsach')->with('thongbao','Xóa Thành Công');
        $tenImg_nen=$slide->slie_hinhnen;
        if($tenImg_nen != null)
        {
            $localtion="upload/slide/";
            $file = $localtion.$tenImg_nen;
            if(file_exists($file))
            {
                unlink($file);
            }
        }
        $tenImg=$slide->bacsy_hinhanh;
        if($tenImg != null)
        {
            $localtion="upload/slide/";
            $file = $localtion.$tenImg;
            if(file_exists($file))
            {
                unlink($file);
            }
        }

        $delete = $slide->delete();
        if($delete)
        {
            return redirect()->back()->with('thongbao','Xóa thành công !');
        }
    }
    public function postNoiBat(Request $request,$id)
    {
        $slide = Slide::find($id);
        $slide ->trangthai = $request->txtTrangThai;
        $slide ->save();
        return redirect()->back();
    }

}
