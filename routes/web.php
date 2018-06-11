<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
Route::get('admin/login','LoginController@getLogin');
Route::post('admin/login','LoginController@postLogin');
Route::get('admin/logout','LoginController@getLogout');

Route::group(['prefix'=>'admin', 'middleware'=>'CheckLogin'],function ()
{

    Route::get('','UserController@getHome');
    Route::get('chinhsua/{id}','UserController@getChinhSua');
    Route::group(['prefix'=>'chuyenkhoa'],function ()
    //admin/chuyenkhoa/{{...}}
    {
        Route::get('danhsach','ChuyenKhoaController@getDanhSach');
        Route::get('sua/{id}','ChuyenKhoaController@getSua');
        Route::post('sua/{id}','ChuyenKhoaController@postSua');
        Route::get('them','ChuyenKhoaController@getThem');
        Route::post('them','ChuyenKhoaController@postThem');
        Route::get('xoa/{id}','ChuyenKhoaController@getXoa');
        Route::get('chitiet/{id}','ChuyenKhoaController@getChiTiet');
        Route::post('noibat/{id}','ChuyenKhoaController@postNoiBat');
    });
    Route::group(['prefix'=>'user'],function ()
    //admin/users/{{...}}
    {
        Route::get('danhsach','UserController@getDanhSach');
        Route::get('them','UserController@getThem');
        Route::post('them1','UserController@postThem1');
        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');
        Route::get('xoa/{id}','UserController@getXoa');
        Route::post('trangthai/{id}','UserController@postTrangThai');
    });
    Route::group(['prefix'=>'bacsy'],function ()
        //admin/bacsy/{{...}}
    {
        Route::get('danhsach','BacSyController@getDanhSach');
        Route::get('thongtin','BacSyController@getThongTin');
        Route::get('them/{id}','BacSyController@getThem');
        Route::post('them/{id}','BacSyController@postThem');
        Route::get('sua/{id}','BacSyController@getSua');
        Route::post('sua/{id}','BacSyController@postSua');
        Route::get('xoa/{id}','BacSyController@getXoa');
        Route::post('noibat/{id}','BacSyController@postNoiBat');
    });
    Route::group(['prefix'=>'slide'],function ()
    {
       Route::get('danhsach','SlideController@getDanhSach');
       Route::get('them','SlideController@getThem');
       Route::post('them','SlideController@postThem');
       Route::get('sua/{id}','SlideController@getSua');
       Route::post('sua/{id}','SlideController@postSua');
       Route::get('xoa/{id}','SlideController@getXoa');
        Route::post('noibat/{id}','SlideController@postNoiBat');
    });
    Route::group(['prefix'=>'tintuc'],function()
    {
        Route::get('danhsach','TinTucController@getDanhSach');
        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');
        Route::get('sua/{id}','TinTucController@getSua');
        Route::post('sua/{id}','TinTucController@postSua');
        Route::get('xoa/{id}','TinTucController@getXoa');
        Route::post('noibat/{id}','TinTucController@postNoiBat');
    });
    Route::group(['prefix'=>'comment'],function()
    {
        Route::get('danhsach','CommentController@getDanhSach');
        Route::get('them','CommentController@getThem');
        Route::post('them','CommentController@postThem');
        Route::get('sua/{id}','CommentController@getSua');
        Route::post('sua/{id}','CommentController@postSua');
        Route::get('xoa/{id}','CommentController@getXoa');
    });
    Route::group(['prefix'=>'benhnhan'],function()
    {
        Route::get('danhsach','BenhNhanController@getDanhSach');
        Route::get('them','BenhNhanController@getThem');
        Route::post('them','BenhNhanController@postThem');
        Route::get('them/benhan/{id}','BenhNhanController@getThemBenhAn');
        Route::post('them/benhan/{id}','BenhNhanController@postThemBenhAn');
        Route::get('sua/{id}','BenhNhanController@getSua');
        Route::post('sua/{id}','BenhNhanController@postSua');
        Route::get('xoa/{id}','BenhNhanController@getXoa');
       // Route::get('themhoso','BenhNhanController@getHo');
       // Route::post('themhoso/{id}','BenhNhanController@postAdd');
        Route::get('benhan/sua/{id}','BenhNhanController@getsuaBenhAn');
        Route::post('benhan/sua/{id}','BenhNhanController@postsuaBenhAn');
        Route::get('benhan/xoa/{id}','BenhNhanController@getXoaBenhAn');
        Route::get('benhan/xoahinhanh/{id}','BenhNhanController@getXoaHinhAnh');

    });
    Route::group(['prefix'=>'nhombenh'],function()
    {
        Route::get('danhsach','NhomBenhController@getDanhSach');
        Route::get('them','NhomBenhController@getThem');
        Route::post('them','NhomBenhController@postThem');
        Route::get('sua/{id}','NhomBenhController@getSua');
        Route::post('sua/{id}','NhomBenhController@postSua');
        Route::get('xoa/{id}','NhomBenhController@getXoa');

    });
    Route::group(['prefix'=>'ajax'],function ()
    {
       Route::get('bacsy/{id}','AjaxController@getBacSy');
       Route::get('chuandoan1/{id}','AjaxController@getChuyenKhoa');
        Route::get('chuandoan2/{id}','AjaxController@getNhomBenh');
    });
});
//delete group ->nv
//Route::group(['prefix'=>'nv', 'middleware'=>'NhanVienMiddleware'],function ()
//{
//    Route::get('home','UserController@getHome');
//    Route::group(['prefix'=>'slide'],function ()
//    {
//        Route::get('danhsach','SlideController@getDanhSach');
//        Route::get('them','SlideController@getThem');
//        Route::post('them','SlideController@postThem');
//        Route::get('sua/{id}','SlideController@getSua');
//        Route::post('sua/{id}','SlideController@postSua');
//        Route::get('xoa/{id}','SlideController@getXoa');
//        Route::post('noibat/{id}','SlideController@postNoiBat');
//    });
//    Route::group(['prefix'=>'tintuc'],function()
//    {
//        Route::get('danhsach','TinTucController@getDanhSach');
//        Route::get('them','TinTucController@getThem');
//        Route::post('them','TinTucController@postThem');
//        Route::get('sua/{id}','TinTucController@getSua');
//        Route::post('sua/{id}','TinTucController@postSua');
//        Route::get('xoa/{id}','TinTucController@getXoa');
//    });
//    Route::group(['prefix'=>'comment'],function()
//    {
//        Route::get('danhsach','CommentController@getDanhSach');
//        Route::get('them','CommentController@getThem');
//        Route::post('them','CommentController@postThem');
//        Route::get('sua/{id}','CommentController@getSua');
//        Route::post('sua/{id}','CommentController@postSua');
//        Route::get('xoa/{id}','CommentController@getXoa');
//    });
//    Route::group(['prefix'=>'benhnhan'],function()
//    {
//        Route::get('danhsach','BenhNhanController@getDanhSach');
//        Route::get('them','BenhNhanController@getThem');
//        Route::post('them','BenhNhanController@postThem');
//        Route::get('them/benhan/{id}','BenhNhanController@getThemBenhAn');
//        Route::post('them/benhan/{id}','BenhNhanController@postThemBenhAn');
//        Route::get('sua/{id}','BenhNhanController@getSua');
//        Route::post('sua/{id}','BenhNhanController@postSua');
//        Route::get('xoa/{id}','BenhNhanController@getXoa');
//        // Route::get('themhoso','BenhNhanController@getHo');
//        // Route::post('themhoso/{id}','BenhNhanController@postAdd');
//        Route::get('benhan/sua/{id}','BenhNhanController@getsuaBenhAn');
//        Route::post('benhan/sua/{id}','BenhNhanController@postsuaBenhAn');
//        Route::get('benhan/xoa/{id}','BenhNhanController@getXoaBenhAn');
//
//    });
//    Route::group(['prefix'=>'nhombenh'],function()
//    {
//        Route::get('danhsach','NhomBenhController@getDanhSach');
//        Route::get('them','NhomBenhController@getThem');
//        Route::post('them','NhomBenhController@postThem');
//        Route::get('sua/{id}','NhomBenhController@getSua');
//        Route::post('sua/{id}','NhomBenhController@postSua');
//        Route::get('xoa/{id}','NhomBenhController@getXoa');
//
//    });
//    Route::group(['prefix'=>'ajax'],function ()
//    {
//        Route::get('bacsy/{id}','AjaxController@getBacSy');
//        Route::get('chuandoan1/{id}','AjaxController@getChuyenKhoa');
//        Route::get('chuandoan2/{id}','AjaxController@getNhomBenh');
//    });
//});
Route::group(['prefix'=>'bacsy', 'middleware'=>'BacSyMiddleware'],function ()
{
    Route::get('','UserController@getHome');
});

Route::group(['prefix'=>'trangchu'],function ()
{
    Route::get('/','FrontendController@getTrangChu');

    Route::get('thongtin','FrontendController@getThongTin');
    Route::get('thongtin/{id}','FrontendController@getBacSy');
    Route::get('thongtin/bacsy/{id}','FrontendController@getChiTietBacSy');
    Route::get('dichvu','FrontendController@getDichVu');
    Route::get('dichvu/{id}','FrontendController@getChiTietDV');
    Route::get('tintuc','FrontendController@getTinTuc');
    Route::get('tintuc/{id}','FrontendController@getChiTietTT');
    Route::get('tracuu','FrontendController@getTraCuu');
    Route::post('tracuu','FrontendController@postTraCuu');
    Route::get('timkiem','FrontendController@getTimKiem');
    Route::post('timkiem/{id}','FrontendController@postgetTimkiem');
    Route::get('lienhe',function()
    {
        return view('pages/lienhe');
    });
    Route::get('contact',function()
    {
        return view('pages/contact');
    });
});
Route::get('ok',function (){
   return view('admin.user.test') ;
});
