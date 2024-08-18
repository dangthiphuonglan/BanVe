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

use App\Http\Controllers\mainController;
use App\Http\Controllers\publicController;
use Illuminate\Support\Facades\Route;

Route::post('/loginpost', [mainController::class, 'login']);

Route::post('/signuppost', [mainController::class, 'signup']);

Route::get('/login', function () {
    return view('login.login');
});

Route::get('/', [mainController::class, 'index']);

Route::get('/danhmuc', [mainController::class, 'quanlydm']);

Route::get('/deletefile', [mainController::class, 'deletefile']);

Route::get('/adddanhmuc', [mainController::class, 'adddm']);

Route::post('/postadddanhmuc', [mainController::class, 'postadddm']);

Route::get('/editdanhmuc/{id}', [mainController::class, 'editDanhMuc']);

Route::post('/editdm/{id}', [mainController::class, 'editdm']);

Route::get('/deletedm/{id}', [mainController::class, 'delDanhMuc']);

Route::get('/tietmuc', [mainController::class, 'quanlytm']);

Route::get('/addtietmuc', [mainController::class, 'addtm']);

Route::post('/postaddtietmuc', [mainController::class, 'postaddtm']);

Route::get('/edittietmuc/{id}', [mainController::class, 'edittietmuc']);

Route::post('/edittm/{id}', [mainController::class, 'edittm']);

Route::get('/deletetm/{id}', [mainController::class, 'delTietMuc']);

Route::get('/lichchieu', [mainController::class, 'lichchieu']);

Route::get('/nguoidung', [mainController::class, 'nguoidung']);

Route::get('/addnguoidung', [mainController::class, 'addnguoidung']);

Route::post('/postaddnguoidung', [mainController::class, 'postaddnguoidung']);

Route::get('/deletend/{id}', [mainController::class, 'delNguoiDung']);

Route::get('/editnd/{id}', [mainController::class, 'editnd']);

Route::post('/posteditnd/{id}', [mainController::class, 'posteditnd']);

Route::get('/nhahat',  [mainController::class, 'index']);
Route::get('/giochieu', function () {
    return view('public.gioChieu');
});
Route::get('/lichchieunhahat', [mainController::class, 'lichchieunhahat']);
Route::get('/datve/{id}', [mainController::class, 'datve']);
Route::get('/hotro', function () {
    return view('public.hotrokh');
});
Route::get('/chitiet/{id}',  [mainController::class, 'chitiet']);
Route::get('/lienhe', [mainController::class, 'lienhe']);
Route::post('/postlienhe', [
    mainController::class,
    'postlienhe'
]);

Route::get('/login', function () {
    return view('login.login');
});

Route::get('/theloai/{id}', [mainController::class, 'theloai']);

Route::get('/lichngay/{ngay}', [mainController::class, 'lichngay']);

Route::get('/hoadon', [mainController::class, 'hoadon']);

Route::get('/loginform', function () {
    return view('public.login');
});

Route::get('/forgot', function () {
    return view('public.forget');
});

Route::post('/loginpublic', [mainController::class, 'loginpublic']);

Route::get('/logoutpublic', [mainController::class, 'logoutpublic']);
Route::get('/logout', [mainController::class, 'logout']);

Route::post('/datvetm', [mainController::class, 'datvetm']);

Route::post('/thanhtoan', [
    mainController::class,
    'thanhtoan'
]);

Route::get('/ve', [mainController::class, 've']);

Route::get('/addve', [mainController::class, 'addve']);

Route::post('/postaddve', [mainController::class, 'postaddve']);

Route::get('/xuat', [mainController::class, 'export']);

Route::get('/addLichChieu', [mainController::class, 'addLichChieu']);

Route::post('/postaddLC', [mainController::class, 'postaddLC']);

Route::get('/qlthanhtoan', [mainController::class, 'qlthanhtoan']);
Route::get('/xacnhan/{id}', [mainController::class, 'xacnhan']);

Route::post('/timkiemhoadon', [mainController::class, 'timkiemhoadon']);
Route::post('/timkiemtietmuc', [mainController::class, 'timkiemtietmuc']);
Route::post('/forgotpas', [mainController::class, 'forgotpas']);

Route::get('/test', function(){
    return view('admin.danhmuc.test');
});
Route::post('/code', [mainController::class, 'code']);
Route::get('/change', function(){
    return view('public.changepass');
});
Route::post('/changepost', [mainController::class, 'changepost']);
Route::get('/deletett/{id}', [mainController::class,'deletett']);

Route::get('/images/{imageName}', [mainController::class, 'show'])->name('image.show');
Route::post('datve/redirect', [publicController::class, 'checkOnline']);
Route::get('datveonline', [mainController::class, 'datveonline']);
