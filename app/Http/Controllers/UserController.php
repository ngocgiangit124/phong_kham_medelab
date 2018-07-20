<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getDanhSach()
    {
        $users=User::all();
        return view('admin.user.danhsach',['users'=>$users]);
    }
    public function getThem()
    {
        return view('admin.user.them');
    }
    public function postThem1(Request $request)
    {
       $this->validate($request,[
           'name'=>'required|min:3|max:100',
            'Email'=>'required|email|unique:users,email',
            'Password'=>'required|min:6|max:32',
            'PasswordAgain'=>'required|same:Password',
            'TenDayDu'=>'required|min:5|max:100',
            'SDT'=>'required',
           'txtNgaySinh'=>'required',
      ],[
            'name.required'=>'Bạn chưa nhập Tên',
            'name.min'=>'Tên ngừoi nhiều  hơn 3 ký tự',
            'name.max'=>'Tên ngừoi phải ít hơn 100 ký tự',
            'Email.required'=>'Bạn nhập chưa nhập email',
            'Email.email'=>'Bạn chưa nhập dúng định dạng email@email.com',
            'Email.unique'=>'Email đã tồn tại',
            'Password.required'=>'Bạn chưa nhập password',
            'Password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'Password.max'=>'Mật khẩu nhiều hơn 32 kí tự',
            'PasswordAgain.required'=>'Ban chưa nhập lại mật khẩu',
            'PasswordAgain.same'=>'Mật khẩu không khớp',
            'TenDayDu.required'=>'Bạn chưa nhập Tên',
            'TenDayDu.min'=>'Tên người phải ít hơn 3 ký tự',
            'TenDayDu.max'=>'Tên người phải ít hơn 100 ký tự',
            'SDT.required'=>'Bạn chưa nhập SDT',
           'txtNgaySinh.required'=>'Bạn chưa nhập ngày tháng năm sinh'
    ]);
        $user = new User;
        $user -> name = $request->name;
        $user -> email= $request->Email;
        $user -> password =bcrypt($request->Password);
        $user -> user_tendaydu= $request->TenDayDu;
        $user -> user_gioitinh= $request->GioiTinh;
        $user -> user_DT= $request->SDT;
        $user ->user_level = $request->Level;
        $user ->user_trangthai=$request->TrangThai;
        $user ->user_ngaysinh=$request->txtNgaySinh;
        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg')
            {
                return redirect('admin/user/them')->with('Bug','Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/user/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/user/",$Hinh);
//            unlink("upload/chuyenkhoa/".$chuyenkhoa->khoa_hinhanh);
            $user->user_hinhanh=$Hinh;
        }
        else
        {
            $user->user_hinhanh="medelab.png";
        }
        $user ->save();
        //echo 'dathanh cong';
        return redirect('admin/user/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);

    }
    public function postSua(Request $request,$id)
    {
        $user=User::find($id);
        $this->validate($request,[
        'name'=>'required|min:3|max:100',

        'TenDayDu'=>'required|min:5|max:100',
        'SDT'=>'required',
    ],[
        'name.required'=>'Bạn chưa nhập Tên',
        'name.min'=>'Tên ngừoi nhiều  hơn 3 ký tự',
        'name.max'=>'Tên ngừoi phải ít hơn 100 ký tự',

        'TenDayDu.required'=>'Bạn chưa nhập Tên',
        'TenDayDu.min'=>'Tên ngừoi phải ít hơn 3 ký tự',
        'TenDayDu.max'=>'Tên ngừoi phải ít hơn 100 ký tự',
        'SDT.required'=>'Bạn chưa nhập SDT'
    ]);
        if($request->Password == "on")
        {
            $this->validate($request,[
                'password'=>'required|min:6|max:32',
                'passwordAgain'=>'required|same:password'
            ],[
                'password.required'=>'ban chua nhap password',
                'password.min'=>'mat khau it nhat  ki tu',
                'password.max'=>'mat khau chi dc it hon 32 ky tu',
                'passwordAgain.required'=>'ban chua nhap lai mat kau',
                'passwordAgain.same'=>'mat khau nhapp lai chua khop'
            ]);
            $user -> password =bcrypt($request->password);
        }
        if($request->Email == "on")
        {
            $this->validate($request,[
                'Email'=>'required|email|unique:users,email'
            ],[
                'Email.required'=>'Bạn nhập chưa nhập email',
                'Email.email'=>'Bạn chưa nhập dúng định dạng email@email.com',
                'Email.unique'=>'Email đã tồn tại'
            ]);
            $user -> email= $request->Email;
        }
        $user -> name = $request->name;
        $user -> user_tendaydu= $request->TenDayDu;
        $user -> user_gioitinh= $request->GioiTinh;
        $user -> user_DT= $request->SDT;
        $user ->user_level = $request->Level;
        $user ->user_trangthai=$request->TrangThai;
        $user ->user_ngaysinh=$request->txtNgaySinh;
        echo $user ->user_ngaysinh;
        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg')
            {
                return redirect('admin/user/them')->with('Bug','Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/user/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/user/",$Hinh);
            if(($user->user_hinhanh)!= "medelab.png")
            {
                unlink("upload/user/".$user->user_hinhanh);
            }
            $user->user_hinhanh=$Hinh;
        }
        $user ->save();
        //echo 'dathanh cong';
        return redirect()->back()->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $user = User::find($id);
        if(($user->user_hinhanh)!="medelab.png")
        {
            unlink("upload/user/".$user->user_hinhanh);
        }
        $user->delete();
        return redirect()->back()->with('thongbao','Xóa thành công!');
    }
    public function getHome()
    {
        return view('admin.layout.index');
    }
    public function getChinhSua($id)
    {
        $user = User::find($id);
        return view('admin.user.chinhsua',['user'=>$user]);
    }
    public function postTrangThai(Request $request,$id)
    {
        $user = User::find($id);
        $user ->user_trangthai = $request->txtTrangThai;
        $user->save();
        return redirect()->back();
    }
}