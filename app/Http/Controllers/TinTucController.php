<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
class TinTucController extends Controller
{

    //
    public function getDanhSach()
    {
        $tintuc = TinTuc::all();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function getThem()
    {
        return view('admin.tintuc.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,[
            'txtTieuDe'=>'required|min:3',
            'txtNoiDung'=>'required',
            'txtTacGia'=>'required|min:3|max:200'
        ],[
            'txtTieuDe.required'=>'Bạn chưa nhập Tên',
            'txtTieuDe.min'=>'Tên người nhiều  hơn 3 ký tự',
            'txtTacGia.required'=>'Bạn chưa nhập Tên',
            'txtTacGia.min'=>'Tên người nhiều  hơn 3 ký tự',
            'txtTacGia.max'=>'Tên người phải ít hơn 200 ký tự',
            'txtNoiDung.required'=>'Bạn chưa nhập Tên'

        ]);
        $tintuc = new TinTuc;
        $tintuc -> tintuc_tieude = $request->txtTieuDe;
        $tintuc -> tintuc_noidung= $request->txtNoiDung;
        $tintuc -> tintuc_mota= $request->txtMoTa;
        $tintuc -> tintuc_tacgia= $request->txtTacGia;
        $tintuc ->trangthai=$request->trangthai;
//        hinh nen------------------------------------------------------
        if($request->hasFile('txtHinh'))
        {
            $file=$request->file('txtHinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg')
            {
                return redirect('admin/tintuc/them')->with('Bug','Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/tintuc/",$Hinh);
            //unlink("upload/bacsy/".$tintuc->bacsy_hinhanh);
            $tintuc->tintuc_anh=$Hinh;
        }
        else
        {
            $tintuc->tintuc_anh="medelab.png";
        }
//        hinh anh dong-------------------------------------------------------------

        $tintuc ->save();
        //echo 'dathanh cong';
        return redirect('admin/tintuc/danhsach')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $tintuc=TinTuc::find($id);
        //echo $slide;
        return view('admin.tintuc.sua',['tintuc'=>$tintuc]);
    }
    public function postSua(Request $request,$id)
    {
            $tintuc = TinTuc::find($id);
        $this->validate($request,[
            'txtTieuDe'=>'required|min:3|max:500',
            'txtMoTa'=>'required|min:3',
            'txtNoiDung'=>'required',
            'txtTacGia'=>'required|min:3|max:200'
        ],[
            'txtTieuDe.required'=>'Bạn chưa nhập Tên',
            'txtTieuDe.min'=>'Tên người nhiều  hơn 3 ký tự',
            'txtTieuDe.max'=>'Tên người phải ít hơn 500 ký tự',
            'txtMoTa.required'=>'Bạn chưa nhập Tên',
            'txtMoTa.min'=>'Tên người nhiều  hơn 3 ký tự',
            'txtTacGia.required'=>'Bạn chưa nhập Tên',
            'txtTacGia.min'=>'Tên người nhiều  hơn 3 ký tự',
            'txtTacGia.max'=>'Tên người phải ít hơn 200 ký tự',
            'txtNoiDung.required'=>'Bạn chưa nhập nội dung'

        ]);
        $tintuc -> tintuc_tieude = $request->txtTieuDe;
        $tintuc -> tintuc_noidung= $request->txtNoiDung;
        $tintuc -> tintuc_mota= $request->txtMoTa;
        $tintuc -> tintuc_tacgia= $request->txtTacGia;
        $tintuc ->trangthai=$request->trangthai;
//        hinh nen------------------------------------------------------
        if($request->hasFile('txtHinh'))
        {
            $file=$request->file('txtHinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg')
            {
                return redirect('admin/tintuc/them')->with('Bug','Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/tintuc/",$Hinh);
            if(($tintuc->tintuc_anh)!= "medelab.png")
            {
                unlink("upload/tintuc/".$tintuc->tintuc_anh);
            }
            $tintuc->tintuc_anh=$Hinh;
        }
        $tintuc ->save();
        //echo 'dathanh cong';
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $tintuc = TinTuc::find($id);
        $tenImg=$tintuc->tintuc_anh;
        if($tenImg != 'medelab.png')
        {
            $localtion="upload/tintuc/";
            $file = $localtion.$tenImg;
            if(file_exists($file))
            {
                unlink($file);
            }
        }
        $delete = $tintuc->delete();
        if($delete)
        {
            return redirect()->back()->with('thongbao','Xóa thành công !');
        }
    }
    public function postNoiBat(Request $request,$id)
    {
        $tintuc = TinTuc::find($id);
        $tintuc ->trangthai = $request->txtTrangThai;
        $tintuc->save();
        return redirect()->back();
    }
}
