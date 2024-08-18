<?php

namespace App\Http\Controllers;

use App\danhmuc;
use App\hoadon;
use App\lienhe;
use App\Repositories\MainRepositoryInterface;
use App\tietmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class publicController extends Controller
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

    public function checkOnline(Request $request){
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        /*
        * To change this license header, choose License Headers in Project Properties.
        * To change this template file, choose Tools | Templates
        * and open the template in the editor.
        */

        $hoadon = new hoadon();
        
        $vnp_TmnCode = "ZQI74UL2"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "BHUSCDWNHSSKZZYXQIPFCQITLRQYXULE"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/datveonline";
        // $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $startTime = date("YmdHis");
        $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

        $userLogin = Auth::user();
        $itemLogin = $this->post->getUser($userLogin->email);
        $ve = $this->post->getVeById($request->idVe);
        if($ve->soLuongCon < $request->soLuongVeMua){
            $message='Số lượng vé mua vượt quá số lượng vé còn !!!';
            return redirect('datve/'.$ve->id_lichchieu)->withSuccess($message);
        }
        
        $hoadon->id_Ve = $request->idVe;
        $hoadon->soLuongVeMua = $request->soLuongVeMua;
        $hoadon->thanhTien = $request->soLuongVeMua * $ve->giaVe;
        $hoadon->id_User = $itemLogin->id_User;
        $hoadon->trangthai = 1;
        $hoadon->save();
        // $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        $vnp_TxnRef = rand(00,9999); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $request->soLuongVeMua * $ve->giaVe; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = 'NCB'; //Mã phương thức thanh toán
        $vnp_IpAddr = $itemLogin->id_User; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => "$request->idVe",
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toán hóa đơn",
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
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
    }


}
