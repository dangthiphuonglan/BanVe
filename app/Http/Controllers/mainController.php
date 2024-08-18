<?php

namespace App\Http\Controllers;

use App\danhmuc;
use App\Exports\UserExport;
use App\hoadon;
use App\lichChieu;
use App\lienhe;
use App\Repositories\MainRepositoryInterface;
use App\tietmuc;
use App\User;
use App\ve;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class mainController extends Controller
{
    protected $post;

    /**
     * PostController constructor.
     *
     * @param MainRepositoryInterface $post
     */
    public function __construct(MainRepositoryInterface $post)
    {
        $this->post = $post;
    }

    /**
     * List all posts.
     *
     * @return mixed
     */
    public static function getAllUser(){
        return User::all();
    }

    public static function getAllLichChieu(){
        return lichChieu::all();
    }

    public static function getAllDanhMuc(){
        return danhmuc::all();
    }

    public static function getTietMucById($id_tietmuc){
        return tietmuc::find($id_tietmuc);
    }
    public static function getDanhMucById($id_DanhMuc)
    {
        return danhmuc::find($id_DanhMuc);
    }
    public static function getLichChieuById($id){
        return lichChieu::find($id);
    }
    public static function getHoaDonByid($id){
        return hoadon::find($id);
    }
    public function export(){
        return Excel::download(new UserExport,'user.xlsx');
    }

    public function show($imageName)
    {
        // Construct the full path to the image within the storage directory
        $path = storage_path("app/public/images/{$imageName}");

        // Check if the image exists; if not, return a 404 response
        if (!Storage::exists("public/images/{$imageName}")) {
            abort(404);
        }

        // Return the image as a response
        return response()->file($path);
    }

    public function login(Request $request)
    {
        // dd(bcrypt('123456')); 
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            if($itemLogin->role==1||$itemLogin->role==2){
                return redirect('danhmuc');
            }else{
                return redirect('qlthanhtoan');
            }
        }else{
            $message = "Đăng nhập không thành công - Kiểm tra lại email & password!!!";
            return redirect('login')->withSuccess($message);
        }
    }

    public function signup(Request $request)
    {
        // dd(bcrypt('123456')); 
        // if(Auth::attempt($credentials)){
        //     return redirect('trangchu');
        // }else{
        //     return redirect('login');
        // }

        $listUser = $this->post->getAllUser();
        foreach($listUser as $itemUser){
            if($itemUser->email == $request -> email){
                $message = "Email đã tồn tại. Vui lòng đăng nhập hoặc quên mật khẩu!!!";
                return redirect('loginform')->withSuccess($message);
            }
        }

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $user = new User();
        $user -> hoTen = $request -> hoTen;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request -> password);
        $user -> sdt = $request -> sdt;
        $user -> ngaySinh = $request -> ngaySinh;
        $user -> diaChi = $request -> diaChi;
        $user -> role = 3;
        $user -> remember_token = substr(str_shuffle($permitted_chars), 0, 10);
        $user ->save();
        return redirect('loginform');

    }

    public function logout(Request $request) 
    {

        $userLogin = Auth::user();
        $itemLogin = $this->post->getUser($userLogin->email);
        if($itemLogin->role==1||$itemLogin->role==2){
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('login');
        }else{
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('loginform');
        }
        
    }

    //quản lý danh mục 
    public function quanlydm(Request $request) 
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
            // $news = $this->post->all();
            return view('admin.index',compact('itemLogin','listdanhmuc'));
        }
        return redirect('login');
    }

    public function adddm(Request $request) 
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            return view('admin.danhmuc.add',compact('itemLogin'));
        }
        return redirect('login');
    }

    public function postadddm(Request $request) 
    {
        if(Auth::check()){
            $itemNew = new danhmuc();
            $itemNew->tenDanhMuc = $request->tendm;
            $itemNew->save();
            $message = "Thêm thành công";
            return redirect('danhmuc')->withSuccess($message);
        }
        return redirect('login');
    }

    public function editDanhMuc($id,Request $request) 
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $itemEdit = $this->post->getDanhMucById($id);
            // $news = $this->post->all();
            return view('admin.danhmuc.edit',compact('itemLogin','itemEdit'));
        }
        return redirect('login');
    }

    public function editdm($id,Request $request) {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $itemEdit = $this->post->getDanhMucById($id);
            $tendm = $request->tendm;
            // $listdanhmuc = $this->post->getAllDanhMuc();
            $itemEdit->update([
                'tenDanhMuc' => $tendm
            ]);
            $message = "Sửa thành công";
            return redirect('danhmuc')->withSuccess($message);
        }
        return redirect('login');
    }

    public function delDanhMuc($id,Request $request) {
        if(Auth::check()){
            danhmuc::destroy($id);
            $message = "Xóa thành công";
            return redirect('danhmuc')->withSuccess($message);
        }
        return redirect('login');
    }

    //tiet muc
    public function quanlytm(Request $request) 
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listtietmuc = $this->post->getAllTietMuc();
            // $news = $this->post->all();
            return view('admin.tietmuc.index',compact('itemLogin','listtietmuc'));
        }
        return redirect('login');
    }

    public function addtm(Request $request) 
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
            return view('admin.tietmuc.add',compact('itemLogin','listdanhmuc'));
        }
        return redirect('login');
    }

    //postaddtm
    public function postaddtm(Request $request) 
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $item = new tietmuc();
            $item->tenTietMuc = $request->tenTietMuc;
            if (!$request->hasFile('hinhAnh')) {
                // Nếu không thì in ra thông báo
                return "Mời chọn file cần upload";
            }
            // Nếu có thì thục hiện lưu trữ file vào public/images
            $path = $request->file('hinhAnh')->store('public/images');
            $item->hinhAnh =$request->file('hinhAnh')->hashName();
            $item->moTa = $request->moTa;
            $item->id_DanhMuc = $request->id_DanhMuc;
            $item->save();
            $message = "Thêm thành công";
            return redirect('tietmuc')->withSuccess($message);
        }
        return redirect('login');
    }

    public function deletefile(){
        Storage::delete('public/images/1.jpeg');
        return;
    }

    public function edittietmuc($id,Request $request) {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $itemEdit = $this->post->getTietMucById($id);
            $listdanhmuc = $this->post->getAllDanhMuc();
            return view('admin.tietmuc.edit',compact('itemLogin','itemEdit','listdanhmuc'));
        }
        return redirect('login');
    }

    public function edittm($id,Request $request) {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $itemEdit = $this->post->getTietMucById($id);
            $tentm = $request->tenTietMuc;
            $mota = $request->moTa;
            $iddm = $request->id_DanhMuc;
            if (!$request->hasFile('hinhAnh')) {
                $itemEdit->update([
                    'tenTietMuc' => $tentm,
                    'moTa' => $mota,
                    'id_DanhMuc' => $iddm
                ]);
                $message = "Sửa thành công";
                return redirect('tietmuc')->withSuccess($message);
            }
            else{
                Storage::delete('public/images/'.$itemEdit->hinhAnh);
                $path = $request->file('hinhAnh')->store('public/images');
                $itemEdit->update([
                    'tenTietMuc' => $tentm,
                    'hinhAnh' => $request->file('hinhAnh')->hashName(),
                    'moTa' => $mota,
                    'id_DanhMuc' => $iddm
                ]);
                $message = "Sửa thành công";
                return redirect('tietmuc')->withSuccess($message);
            }
        }
        return redirect('login');
    }

    public function delTietMuc($id,Request $request) {
        if(Auth::check()){
            $itemEdit = $this->post->getTietMucById($id);
            Storage::delete('public/images/'.$itemEdit->hinhAnh);
            tietmuc::destroy($id);
            $message = "Xóa thành công";
            return redirect('tietmuc')->withSuccess($message);
        }
        return redirect('login');
    }

    public function lichchieu(Request $request) 
    {
        if(Auth::check()){
            // $date = new DateTime();
            // dd($date);
            // $listLC = DB::table('lichchieu')->where('created_at',$date->format('Y-d-m H:i:s'))->first();
            // date_default_timezone_set('Asia/Ho_Chi_Minh'); // timezone Việt Nam
            // $currentDateTime = date('Y-m-d H:i:s');
            // $listLC = DB::table('lichchieu')->where('created_at',$currentDateTime)->get();
            // foreach($listLC as $item){
            //     $this->post->xoaLichChieu($item->id);
            // }
            // dd($currentDateTime);
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
            $listLichChieu = $this->post->getAllLichChieu();
            // $news = $this->post->all();
            return view('admin.lichchieu.index',compact('itemLogin','listLichChieu','listdanhmuc'));
        }
        return redirect('login');
    }

    public function nguoidung(Request $request) 
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
            if($itemLogin->role == 1 || $itemLogin->role == 2){
                $listUser = $this->post->getAllUser();
                return view('admin.nguoidung.index',compact('itemLogin','listUser','listdanhmuc'));
            }else{
                $listUser = null;
                return view('admin.nguoidung.index',compact('itemLogin','listdanhmuc','listUser'));
            }
            
            // $news = $this->post->all();
            // return view('admin.nguoidung.index',compact('itemLogin','listUser','listdanhmuc'));
        }
        return redirect('login');
    }

    public function addnguoidung(){
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
            return view('admin.nguoidung.add',compact('itemLogin','listdanhmuc'));
        }
        return redirect('login');
    }

    public function postaddnguoidung(Request $request)
    {
        // dd(bcrypt('123456')); 
        // if(Auth::attempt($credentials)){
        //     return redirect('trangchu');
        // }else{
        //     return redirect('login');
        // }

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $user = new User();
        $user -> hoTen = $request -> hoTen;
        $user -> email = $request -> email;
        $user -> password = bcrypt('123456');
        $user -> sdt = $request -> sdt;
        $user -> ngaySinh = $request -> ngaySinh;
        $user -> diaChi = $request -> diaChi;
        if($request -> diaChi == 1){
            $user -> role = 1;
        }else{
            $user -> role = 2;
        }
        $user -> remember_token = substr(str_shuffle($permitted_chars), 0, 10);
        $user ->save();
        $message = "Thêm thành công";
        return redirect('nguoidung')->withSuccess($message);
    }

    public function delNguoiDung($id,Request $request) {
        if(Auth::check()){
            $itemDel = $this->post->getUserById($id);
            User::destroy($itemDel->id_User);
            $message = "Xóa thành công";
            return redirect('nguoidung')->withSuccess($message);
        }
        return redirect('login');
    }

    public function editnd($id){
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
            $itemEdit = $this->post->getUserById($id);
            return view('admin.nguoidung.edit',compact('itemLogin','listdanhmuc','itemEdit'));
        }
        return redirect('login');
    }

    public function posteditnd($id,Request $request)
    {
        // dd(bcrypt('123456')); 
        // if(Auth::attempt($credentials)){
        //     return redirect('trangchu');
        // }else{
        //     return redirect('login');
        // }
        $itemEdit = $this->post->getUserById($id);
        if($request -> diaChi == 1){
            $role = 1;
        }else{
            $role = 2;
        }
        $itemEdit->update([
            "hoTen"=>$request -> hoTen,
            "sdt"=>$request -> sdt,
            "ngaySinh"=>$request -> ngaySinh,
            "diaChi"=>$request -> diaChi,
            "role"=>$role
        ]);
        
        $message = "Sửa thành công";
        return redirect('nguoidung')->withSuccess($message);
    }

    public function index()
    {
        
// dd($inputData['vnp_PayDate']);


        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
            $listtietmuc = $this->post->getAllTietMuc();
            return view('public.index', compact('listdanhmuc', 'listtietmuc','itemLogin'));
        }else{
            $listdanhmuc = $this->post->getAllDanhMuc();
            $listtietmuc = $this->post->getAllTietMuc();
            return view('public.index', compact('listdanhmuc', 'listtietmuc'));
        }
        
    }

    public function timkiemtietmuc(Request $request){
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listtk = DB::table('tietmuc')->where('tenTietMuc','like',"%{$request->tk}%")->get();
            $listdanhmuc = $this->post->getAllDanhMuc();
            $listtietmuc = $this->post->getAllTietMuc();
            return view('public.index', compact('listdanhmuc', 'listtietmuc','itemLogin','listtk'));
        }else{
            $listtk = DB::table('tietmuc')->where('tenTietMuc','like',"%{$request->tk}%")->get();
        $listdanhmuc = $this->post->getAllDanhMuc();
        $listtietmuc = $this->post->getAllTietMuc();
        return view('public.index', compact('listdanhmuc', 'listtietmuc','listtk'));
        }
        
    }

    public function chitiet($id)
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $tietmucbyid = $this->post->getTietMucById($id);
            $listdanhmuc = $this->post->getAllDanhMuc();
            return view('public.chitiet', compact('listdanhmuc', 'tietmucbyid','itemLogin'));
        }else{
            $tietmucbyid = $this->post->getTietMucById($id);
            $listdanhmuc = $this->post->getAllDanhMuc();
            return view('public.chitiet', compact('listdanhmuc', 'tietmucbyid'));
        }
        
    }

    public function theloai($id)
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
        $listtietmucbyiddm = DB::table('tietmuc')->where('id_DanhMuc', $id)->get();
        return view('public.index', compact('listdanhmuc', 'listtietmucbyiddm','itemLogin'));
        }else{
            $listdanhmuc = $this->post->getAllDanhMuc();
        $listtietmucbyiddm = DB::table('tietmuc')->where('id_DanhMuc', $id)->get();
        return view('public.index', compact('listdanhmuc', 'listtietmucbyiddm'));
        }
        
    }

    public function lienhe()
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
        // $listtietmucbyiddm = DB::table('tietmuc')->where('id_DanhMuc', $id)->get();
        return view('public.guiLienHe', compact('listdanhmuc','itemLogin'));
        }else{
            $listdanhmuc = $this->post->getAllDanhMuc();
        // $listtietmucbyiddm = DB::table('tietmuc')->where('id_DanhMuc', $id)->get();
        return view('public.guiLienHe', compact('listdanhmuc'));
        }
        
    }

    public function postlienhe(Request $request)
    {
        $lienhe = new lienhe();
        $lienhe->hoTen = $request->hoTen;
        $lienhe->email = $request->email;
        $lienhe->sdt = $request->sdt;
        $lienhe->noiDung = $request->noiDung;
        $lienhe->save();
        $this->post->sendMail($lienhe);
        $message = 'Đã hết vé';
        return redirect('nhahat')->withSuccess($message);
    }

    public function datve($id)
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $lichChieuById = $this->post->getLichChieuById($id);
            // dd($this->getTietMucById($lichChieuById->id_TietMuc));
            $tietmucbyid = $this->getTietMucById($lichChieuById->id_TietMuc);
            $ve = $this->post->getVeByIdLichChieu($lichChieuById->id);
            if($ve->soLuongCon == 0){
                $message = 'Đã hết vé';
                return redirect('lichchieunhahat')->withSuccess($message);
            }
            $listdanhmuc = $this->post->getAllDanhMuc();
            return view('public.datVeXem', compact('listdanhmuc','lichChieuById','ve','tietmucbyid','itemLogin'));
        }else{
            return redirect('loginform');
        }
        
    }

    public function datveonline()
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $vnp_SecureHash = $_GET['vnp_SecureHash'];
            $inputData = array();
            foreach ($_GET as $key => $value) {
                if (substr($key, 0, 4) == "vnp_") {
                    $inputData[$key] = $value;
                }
            }
            
            unset($inputData['vnp_SecureHash']);
            ksort($inputData);

            $i = 0;
                $hashData = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                }
                $vnp_HashSecret = "BHUSCDWNHSSKZZYXQIPFCQITLRQYXULE";
                $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
                if ($secureHash == $vnp_SecureHash) {
                    if ($_GET['vnp_ResponseCode'] == '00') {
                        $hoadon = DB::table('hoadon')->orderByDesc('id_HoaDon')->limit(1)->first();
                        $ve = ve::find($hoadon->id_Ve);
                        $vecon = $ve->soLuongCon - $hoadon->soLuongVeMua;
                        // dd($vecon);
                        $ve->update([
                            "soLuongCon" => $vecon,
                        ]);
                        $message = "Đặt vé thành công";
                        return redirect('nhahat')->withSuccess($message);
                    } 
                    else {
                        $hoadon = DB::table('hoadon')->orderByDesc('id_HoaDon')->limit(1)->first();
                        hoadon::destroy($hoadon->id_HoaDon);
                        $message = "Đặt vé không thành công";
                        return redirect('nhahat')->withSuccess($message);
                        }
                } else {
                        $message = "Chữ ký không hợp lệ";
                        return redirect('nhahat')->withSuccess($message);
                    }
                // return view('public.datVeXem', compact('listdanhmuc','lichChieuById','ve','tietmucbyid','itemLogin'));
            }else{
                return redirect('loginform');
        }
        
    }

    public function datvetm(Request $request){
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $ve = $this->post->getVeById($request->idVe);
            if($ve->soLuongCon < $request->soLuongVeMua){
                $message='Số lượng vé mua vượt quá số lượng vé còn !!!';
                return redirect('datve/'.$ve->id_lichchieu)->withSuccess($message);
            }
            $hoadon = new hoadon();
            $hoadon->id_Ve = $request->idVe;
            $hoadon->soLuongVeMua = $request->soLuongVeMua;
            $hoadon->thanhTien = $request->soLuongVeMua * $ve->giaVe;
            $hoadon->trangthai = 0;
            $lichChieu = $this->post->getLichChieuById($ve->id_lichchieu);
            $listdanhmuc = $this->post->getAllDanhMuc();
            return view('public.hoadonKH', compact('listdanhmuc','lichChieuById','ve','hoadon','itemLogin','lichChieu'));
        }
        return redirect('loginform');
        
    }

    public function lichchieunhahat()
    {
        // $currentDateTime = date('Y-m-d H:i:s');
        // $date = new DateTime();
        // $newformat=DateTime::createFromFormat("d.m.Y", $currentDateTime)->format("m/d/Y");
        // $date->modify('+3 day');
        // $date->format('d-m-Y');
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $thu = ['Chủ nhật','Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6', 'Thứ 7'];
            for ($x = 0; $x <= 4; $x++) {
                $date = new DateTime();
                $ngay[$x] = $date->modify('+'.$x.' day');
                // echo($ngay[$x]->format('Y-m-d w').' ');
                // $ngayF = date_format($ngay[($x)],'w');
            }
            // dd($ngay[3]->format('Y-m-d w'));
            $listtietmuc = $this->post->getAllTietMuc();
            $listdanhmuc = $this->post->getAllDanhMuc();
            $listLichChieu = $this->post->getAllLichChieu();
            return view('public.lichChieuNhaHat', compact('listdanhmuc','listtietmuc','listLichChieu','ngay','thu','itemLogin'));
        }else{
            $thu = ['Chủ nhật','Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6', 'Thứ 7'];
            for ($x = 0; $x <= 4; $x++) {
                $date = new DateTime();
                $ngay[$x] = $date->modify('+'.$x.' day');
                // echo($ngay[$x]->format('Y-m-d w').' ');
                // $ngayF = date_format($ngay[($x)],'w');
            }
            // dd($ngay[3]->format('Y-m-d w'));
            $listtietmuc = $this->post->getAllTietMuc();
            $listdanhmuc = $this->post->getAllDanhMuc();
            $listLichChieu = $this->post->getAllLichChieu();
            return view('public.lichChieuNhaHat', compact('listdanhmuc','listtietmuc','listLichChieu','ngay','thu'));
        }
        
    }

    public function lichngay($ngaychieu)
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $thu = ['Chủ nhật','Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6', 'Thứ 7'];
            for ($x = 0; $x <= 4; $x++) {
                $date = new DateTime();
                $ngay[$x] = $date->modify('+'.$x.' day');
            }
            // dd($ngay[3]->format('Y-m-d w'));
            $listtietmuc = $this->post->getAllTietMuc();
            $listdanhmuc = $this->post->getAllDanhMuc();
            // $listLichChieu = $this->post->getAllLichChieu();
            $listLichChieu = DB::table('lichchieu')->where(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'),$ngaychieu)->get();
            // dd($listLichChieu);
            return view('public.lichchieunhahat', compact('listdanhmuc','listtietmuc','listLichChieu','ngay','thu','itemLogin'));
        }else{
            $thu = ['Chủ nhật','Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6', 'Thứ 7'];
            for ($x = 0; $x <= 4; $x++) {
                $date = new DateTime();
                $ngay[$x] = $date->modify('+'.$x.' day');
            }
            // dd($ngay[3]->format('Y-m-d w'));
            $listtietmuc = $this->post->getAllTietMuc();
            $listdanhmuc = $this->post->getAllDanhMuc();
            // $listLichChieu = $this->post->getAllLichChieu();
            $listLichChieu = DB::table('lichchieu')->where(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'),$ngaychieu)->get();
            // dd($listLichChieu);
            return view('public.lichchieunhahat', compact('listdanhmuc','listtietmuc','listLichChieu','ngay','thu'));
        }
        
    }

    public function hoadon()
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
        $listtietmuc = $this->post->getAllTietMuc();
        return view('public.hoadonKH', compact('listdanhmuc', 'listtietmuc','itemLogin'));
        }else{
            $listdanhmuc = $this->post->getAllDanhMuc();
        $listtietmuc = $this->post->getAllTietMuc();
        return view('public.hoadonKH', compact('listdanhmuc', 'listtietmuc'));
        }
        
    }


    public function loginpublic(Request $request)
    {
        // dd(bcrypt('123456')); 
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect('nhahat');
        }else{
            $message = "Đăng nhập không thành công - Kiểm tra lại email & password!!!";
            return redirect('loginform')->withSuccess($message);
        }

    }

    public function logoutpublic(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('loginform');
    }

    public function thanhtoan(Request $request){
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $hoadon = new hoadon();
            $hoadon->id_Ve = $request->idVe;
            if (!$request->hasFile('hinhAnh')) {
                // Nếu không thì in ra thông báo
                return "Mời chọn file cần upload";
            }
            // Nếu có thì thục hiện lưu trữ file vào public/images
            $path = $request->file('hinhAnh')->store('public/images');
            $hoadon->hinhAnh =$request->file('hinhAnh')->hashName();
            $hoadon->soLuongVeMua = $request->soLuongVeMua;
            $hoadon->thanhTien = $request->thanhTien;
            $hoadon->trangthai = 0;
            $hoadon->id_User = $itemLogin->id_User;
            $hoadon->save();
            $listdanhmuc = $this->post->getAllDanhMuc();
            $message = "Đặt vé thành công! Bạn sẽ nhận thông báo qua email - Xin cảm ơn !";
            return redirect('nhahat')->withSuccess($message);
        }
        return redirect('loginform');
    }

    public function ve(Request $request) 
    {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
            $listVe = $this->post->getAllVe();
            // dd($listVe);
            // $news = $this->post->all();
            return view('admin.ve.index',compact('itemLogin','listVe','listdanhmuc'));
        }
        return redirect('login');
    }
    public function addve(Request $request) {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
            $listLichChieu = $this->post->getAllLichChieu();
            
            return view('admin.ve.add',compact('itemLogin','listLichChieu','listdanhmuc'));
        }
        return redirect('login');
    }

    public function postaddve(Request $request) {
        if(Auth::check()){
            $itemVe = new ve();
            $itemVe->id_lichchieu = $request->id_lichchieu;
            $itemVe->soLuongBan = $request->soLuongBan;
            $itemVe->soLuongCon = $request->soLuongBan;
            $itemVe->giaVe = $request->giaVe;
            $itemVe->save();
            $message = "Thêm thành công";
            return redirect('ve')->withSuccess($message);
            // return view('admin.ve.add',compact('itemLogin','listLichChieu','listdanhmuc'));
        }
        return redirect('login');
    }

    public function addLichChieu(Request $request) {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
            $listTietMuc = $this->post->getAllTietMuc();
            
            return view('admin.lichchieu.add',compact('itemLogin','listTietMuc','listdanhmuc'));
        }
        return redirect('login');
    }

    public function postaddLC(Request $request) {
        if(Auth::check()){
            $itemNew = new lichChieu();
            $itemNew->id_TietMuc = $request->id_TietMuc;
            //$datef = Carbon::createFromFormat('Y-m-d H:i:s', $request->created_at)->copy()->tz(Auth::user()->timezone)->format('F j, Y @ g:i A');
            $itemNew->created_at = Carbon::parse($request->input('created_at'));
            // dd($itemNew->created_at);
            if($itemNew->save()){
                $newAdd =lichChieu::all()->sortByDesc('id')->first();
                $newVe = new ve();
                $newVe->id_lichchieu = $newAdd->id;
                $newVe->soLuongBan = 500;
                $newVe->soLuongCon = 500;
                $newVe->giaVe = $request->giaVe;
                $newVe->save();
                $message = "Thêm thành công";
                return redirect('lichchieu')->withSuccess($message);
            }
            
        }
        return redirect('login');
    }

    public function qlthanhtoan(Request $request) {
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listdanhmuc = $this->post->getAllDanhMuc();
            if($itemLogin->role == 1 || $itemLogin->role == 2){
                $listHoaDon = hoadon::all()->sortBy('trangthai');
                $message = null;
                return view('admin.thanhtoan.index',compact('itemLogin','listHoaDon','listdanhmuc','message'));
            }else{
                $listallhoadon = hoadon::all();
                $listlsgd = DB::table('hoadon')->where('id_User',$itemLogin->id_User)->orderByDesc('id_HoaDon')->get();
                $message = null;
                return view('admin.thanhtoan.index',compact('itemLogin','listHoaDon','listdanhmuc','listlsgd','message'));
            }
            
        }
        return redirect('login');
    }

    public function xacnhan($id,Request $request) {
        if(Auth::check()){
            $itemEdit = hoadon::find($id);
            $this->post->sendHoaDon($itemEdit);
            $ve = ve::find($itemEdit->id_Ve);
            $vecon = $ve->soLuongCon - $itemEdit->soLuongVeMua;
            // dd($vecon);
            $ve->update([
                "soLuongCon" => $vecon,
            ]);
            $itemEdit->update([
                "trangthai"=>1,
            ]);
            
            $message = "xác nhận thành công";
            return redirect('qlthanhtoan')->withSuccess($message);
        }
        return redirect('login');
    }

    public function timkiemhoadon(Request $request){
        if(Auth::check()){
            $userLogin = Auth::user();
            $itemLogin = $this->post->getUser($userLogin->email);
            $listUser = DB::table('users')->where('sdt', 'like', $request->tk)->get();
            $listHoaDon = hoadon::all()->sortByDesc('trangthai');
            
            if(count($listUser)>0){
                foreach($listUser as $itemUser){
                    $listtk = DB::table('hoadon')->where('id_User','=',$itemUser->id_User)->get();
                    if(count($listtk)>0){
                        break;
                    }
                }
            }else{
                $message = "Không tìm thấy kết quả";
            }
            
            return view('admin.thanhtoan.index',compact('itemLogin','listHoaDon','listdanhmuc','listtk','message'));
        }
        return redirect('login');
    }

    public function forgotpas(Request $request){
        $listuser = $this->post->getAllUser();
        foreach($listuser as $user){
            if($user->email == $request->email){
                $userForgot = $this->post->getUser($request->email);
                $this->post->forgotpas($userForgot);
                return view('public.code',compact('userForgot'));
            }
        }
        $message = "Email không tồn tại";
        return view('public.forget',compact('message'));
        
    }

    public function code(Request $request){
        $userForgot = $this->post->getUser($request->email);
        $code = $request->code;
        //bcrypt($request -> password);
        if($code == $userForgot->remember_token){
            return view('public.changepass',compact('userForgot'));
        }
    }

    public function changepost(Request $request){
        // $userForgot = $this->post->getUser($request->email);
        $userForgot = DB::table('users')->where('email',$request->email)->limit(1);
        // dd($userForgot);
        // dd($userForgot);
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $userForgot -> update([
            'password' => bcrypt($request -> pass),
            //$user -> remember_token = substr(str_shuffle($permitted_chars), 0, 10);
            'remember_token' => substr(str_shuffle($permitted_chars), 0, 10),
        ]);
        return redirect('loginform');
    }

    public function deletett($id,Request $request) {
        if(Auth::check()){
            hoadon::destroy($id);
            $message = "Xóa thành công";
            return redirect('qlthanhtoan')->withSuccess($message);;
        }
        return redirect('login');
    }
}
