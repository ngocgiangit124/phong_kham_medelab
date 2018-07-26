<?php

namespace App\Http\Controllers;

use App\BenhNhan;
use App\ChuanDoan;
use App\HinhAnh;
use App\LichKham;
use DeepCopy\f001\B;
use Illuminate\Http\Request;
use App\BacSy;
use App\ChuyenKhoa;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BacSyController extends Controller
{
    //
    public function getDanhSach()
    {
        $bacsy =BacSy::all();
        return view('admin.bacsy.danhsach',['bacsy'=>$bacsy]);
    }
    public function getSua($id)
    {
        $bacsy=BacSy::find($id);
        $chuyenkhoa=ChuyenKhoa::all();
        return view('admin.bacsy.sua',['bacsy'=>$bacsy,'chuyenkhoa'=>$chuyenkhoa]);
    }
    public function postSua(Request $request,$id)
    {
//        echo $request->Hinh;
        $bacsy=BacSy::find($id);

        $this->validate($request,[
            'Ten'=>'required|min:3|max:100',
            'Khoa'=>'required'

        ],[
            'Ten.required'=>'Bạn chưa nhập Tên',
            'Ten.min'=>'Tên ngừoi nhiều  hơn 3 ký tự',
            'Ten.max'=>'Tên ngừoi phải ít hơn 100 ký tự',
            'Khoa.required'=>'Bạn chưa nhập Tên'

        ]);

        $bacsy ->bacsy_ten = $request->Ten;
        $bacsy ->khoa_id= $request->Khoa;
        $bacsy ->trangthai=$request->trangthai;
        $bacsy ->bacsy_gioithieu=$request->GioiThieu;
        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg')
            {
                return redirect('admin/bacsy/sua/'.$id)->with('Bug','Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/bacsy/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/bacsy/",$Hinh);
            if(($bacsy->bacsy_hinhanh)!= "medelab.png")
            {
                unlink("upload/bacsy/".$bacsy->bacsy_hinhanh);
            }
            $bacsy->bacsy_hinhanh=$Hinh;
        }
       // else
//        {
//            $bacsy->bacsy_hinhanh="medelab.png";
//        }
        $bacsy ->save();
        //echo 'dathanh cong';
        return redirect('admin/bacsy/sua/'.$id)->with('thongbao','Sửa thành công');

    }
    public function getThongTin()
    {
        $user=User::where('user_level',2)->orderBy('id', 'desc')->paginate(10);

        return view('admin.bacsy.thongtin',['user'=>$user]);
    }
    public function getThem($id)
    {
        $user = User::find($id);
        $chuyenkhoa =ChuyenKhoa::all();
        return view('admin.bacsy.them',['user'=>$user,'chuyenkhoa'=>$chuyenkhoa]);
    }
    public function postThem(Request $request,$id)
    {

        $this->validate($request,[
            'txtTen'=>'required|min:3|max:100',
            'txtKhoa'=>'required'

        ],[
            'txtTen.required'=>'Bạn chưa nhập Tên',
            'txtTen.min'=>'Tên ngừoi nhiều  hơn 3 ký tự',
            'txtTen.max'=>'Tên ngừoi phải ít hơn 100 ký tự',
            'txtKhoa.required'=>'Bạn chưa nhập Tên'

        ]);
        $bacsy = new BacSy;
        $bacsy -> bacsy_ten = $request->txtTen;
        $bacsy -> khoa_id= $request->txtKhoa;
        $bacsy -> user_id= $id;
        $bacsy ->bacsy_gioithieu=$request->txtGioiThieu;
        $bacsy ->trangthai=$request->trangthai;
        if($request->hasFile('txtHinh'))
        {
            $file=$request->file('txtHinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg')
            {
                return redirect('admin/bacsy/them/'.$id)->with('Bug','Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/bacsy/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/bacsy/",$Hinh);
            //unlink("upload/bacsy/".$bacsy->bacsy_hinhanh);
            $bacsy->bacsy_hinhanh=$Hinh;
        }
        else
        {
            $bacsy->bacsy_hinhanh="medelab.png";
        }
        $bacsy ->save();
        //echo 'dathanh cong';
        return redirect('admin/bacsy/thongtin')->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $bacsy=BacSy::find($id);
            $tenImg=$bacsy->bacsy_hinhanh;
            if($tenImg != 'medelab.png')
            {
                $localtion="upload/bacsy/";
                $file = $localtion.$tenImg;
                if(file_exists($file))
                {
                    unlink($file);
                }
            }

        $delete = $bacsy->delete();
        if($delete)
        {
            return redirect()->back()->with('thongbao','Xóa thành công !');
        }
    }
    public function postNoiBat(Request $request,$id)
    {
        $bacsy = BacSy::find($id);
        $bacsy ->trangthai = $request->txtTrangThai;
        $bacsy->save();
        return redirect()->back();
    }
    public function getLichKham()
    {
            $time = Carbon::now();
//            echo $time->toDateString();
           $id= Auth::user()->id;
           $bacsy_id = BacSy::select('id')
               ->where('user_id','=',$id)
               ->get();
           foreach ($bacsy_id as $value){
               $lich=LichKham::where([['bacsy_id','=',$value->id],['ngaykham','>=',$time->toDateString()],['trangthai','=','1']])->get();
           }
                return view('admin.bacsy.lichkham',['lich'=>$lich]);
    }
    public function postTimKiemLichKham(Request $request)
    {
        $ngaykham = $request->txtNgayKham;
        $id= Auth::user()->id;
        $bacsy_id = BacSy::select('id')
            ->where('user_id','=',$id)
            ->get();
        foreach ($bacsy_id as $value)
        {
//            $lich = LichKham::where('bacsy_id', '=', $value->id)->get();

            $lich = LichKham::where([['ngaykham', '=', $request->txtNgayKham], ['trangthai', '=', '0'],['bacsy_id', '=', $value->id]])->get();
        }
        return view('admin.bacsy.lichkham', ['lich' => $lich,'ngaykham'=>$ngaykham]);
    }
    public function getBenhNhan()
    {
        $id= Auth::user()->id;
        $bacsy_id = BacSy::select('id')->where('user_id','=',$id)->get();
        foreach ($bacsy_id as $value){
            $chuandoan=ChuanDoan::select('benhnhan_id')->where('bacsy_id','=',$value->id)->get();
            echo $chuandoan;
            foreach ($chuandoan as $item)
            {
                $benhnhan[$item->benhnhan_id] = BenhNhan::select('id','mahoadon','benhnhan_ten','benhnhan_sodienthoai','ngaykham')
                    ->where('id','=',$item->benhnhan_id)
                    ->get();
            }
        }
//        foreach ($benhnhan as $a)
//        {
//            echo $a;
//        }

           return view('admin.bacsy.benhnhan',['benhnhan'=>$benhnhan,'chuandoan'=>$chuandoan]);
    }
    public function getChiTietBenhNhan($id)
    {
        $chuyenkhoa=ChuyenKhoa::all();
        //$test=DB::table('comment');
        $hinhanh=HinhAnh::where('benhnhan_id',$id)->get();
        $chuandoan = ChuanDoan::where('benhnhan_id',$id)->get();
        $benhnhan = BenhNhan::find($id);
        return view('admin.benhnhan.sua',['benhnhan'=>$benhnhan,'chuyenkhoa'=>$chuyenkhoa,'hinhanh'=>$hinhanh,'chuandoan'=>$chuandoan]);

    }
}
