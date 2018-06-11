<?php

namespace App\Http\Controllers;

use App\TinTuc;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //
    public function getDanhSach()
    {
        $comment = Comment::all();
        return view('admin.comment.danhsach',['comment'=>$comment]);
    }
    public function getThem()
    {
        $tintuc = TinTuc::all();
        return view('admin.comment.them',['tintuc'=>$tintuc]);
    }
    public function postThem(Request $request)
    {
        $this->validate( $request,
            [ 'txtTen'=>'required|min:3|max:100',
                'txtNoiDung'=>'required|min:3|max:200'

            ],[
                'txtTen.required'=>'Bạn chưa nhập tên tác giả!',
                'txtTen.min'=>'Tên phải dài hơn 3 ký tự',
                'txtTen.max'=>'Tên không ngắn hơn 100 ký tự',
                'txtNoiDung.required'=>'Bạn chưa nhập tên Nội Dung!',
                'txtNoiDung.min'=>'Tên Khoa phải dài hơn 3 ký tự',
                'txtNoiDung.max'=>'Tên Khoa không ngắn hơn 300 ký tự'
            ]);
        $comment = new Comment;
        $comment->comment_tentacgia=$request->txtTen;
        $comment->comment_noidung=$request->txtNoiDung;
        $comment->tintuc_id=$request->txtTinTuc;
        if($request->hasFile('txtHinh'))
        {
            $file=$request->file('txtHinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg')
            {
                return redirect('admin/comment/them/')->with('Bug','Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/comment/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/comment/",$Hinh);
            //unlink("upload/bacsy/".$bacsy->bacsy_hinhanh);
            $comment->comment_hinhanh=$Hinh;
        }
        else
        {
            $comment->comment_hinhanh="medelab.png";
        }
        $comment ->save();
        //echo 'dathanh cong';
        return redirect('admin/comment/danhsach')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $comment = Comment::find($id);
        $tintuc = TinTuc::all();
        return view('admin.comment.sua',['tintuc'=>$tintuc , 'comment'=>$comment]);
    }
    public function postSua(Request $request,$id)
    {
        $comment = Comment::find($id);
        $this->validate( $request,
            [ 'txtTen'=>'required|min:3|max:100',
                'txtNoiDung'=>'required|min:3|max:200'

            ],[
                'txtTen.required'=>'Bạn chưa nhập tên tác giả!',
                'txtTen.min'=>'Tên phải dài hơn 3 ký tự',
                'txtTen.max'=>'Tên không ngắn hơn 100 ký tự',
                'txtNoiDung.required'=>'Bạn chưa nhập tên Nội Dung!',
                'txtNoiDung.min'=>'Tên Khoa phải dài hơn 3 ký tự',
                'txtNoiDung.max'=>'Tên Khoa không ngắn hơn 300 ký tự'
            ]);
        $comment->comment_tentacgia=$request->txtTen;
        $comment->comment_noidung=$request->txtNoiDung;
        $comment->tintuc_id=$request->txtTinTuc;
        if($request->hasFile('txtHinh'))
        {
            $file=$request->file('txtHinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg')
            {
                return redirect('admin/comment/sua/'.$id)->with('Bug','Lỗi file bạn chỉ được chọn ảnh có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/comment/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/comment/",$Hinh);
            //unlink("upload/comment/".$comment->bacsy_hinhanh);

            if(($comment->comment_hinhanh)!= "medelab.png")
            {
                unlink("upload/bacsy/".$comment->comment_hinhanh);
            }
            $comment->comment_hinhanh=$Hinh;
        }
        $comment ->save();
        //echo 'dathanh cong';
        return redirect('admin/comment/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $comment=Comment::find($id);
        $tenImg=$comment->comment_hinhanh;
        if($tenImg != 'medelab.png')
        {
            $localtion="upload/comment/";
            $file = $localtion.$tenImg;
            if(file_exists($file))
            {
                unlink($file);
            }
        }

        $delete = $comment->delete();
        if($delete)
        {
            return redirect()->back()->with('thongbao','Xóa thành công !');
        }
    }
}
