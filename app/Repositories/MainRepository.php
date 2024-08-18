<?php
namespace App\Repositories;
use App\danhmuc;
use App\hoadon;
use App\lichChieu;
use App\tietmuc;
use App\User;
use App\ve;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;

class MainRepository implements MainRepositoryInterface
{
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return Collection
     */
    public function get($post_id)
    {
        return User::find($post_id);
    }

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        return ;
    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($post_id)
    {
        return;
    }

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($post_id, array $post_data)
    {
        // News::find($post_id)->update($post_data);
        return;
    }

    /**
     * Get's a post by it's ID
     *
     * @param int
     */
    public function getUser($email)
    {
        // return User::find($email);
        return DB::table('users')->where('email',$email)->first();
    }

    public function getAllDanhMuc(){
        return danhmuc::all();
    }

    public static function getDanhMucById($id_danhmuc){
        return danhmuc::find($id_danhmuc);
    }

    public function getAllTietMuc(){
        return tietmuc::all();
    }

    public function getTietMucById($id_tietmuc){
        return tietmuc::find($id_tietmuc);
    }

    public function getAllLichChieu(){
        return lichChieu::all();
    }

    public function getAllUser(){
        return User::all();
    }

    public function getUserById($id){
        return User::find($id);
    }

    public function getLichChieuById($id){
        return lichChieu::find($id);
    }
    public function getVeByIdLichChieu($id){
        return DB::table('ve')->where('id_lichchieu',$id)->first();
    }

    public function getVeById($id){
        return DB::table('ve')->where('id_Ve',$id)->first();
    }

    public function sendMail($contact){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tranphunguyenle30@gmail.com';                     //SMTP username
            $mail->Password   = 'qxok nqdt obeb turu';                               //SMTP password
            // $mail->Username = 'demolaravelappphu@gmail.com';
            // $mail->Password = 'ujnr onys dacd pnxu';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet='utf-8';
            //Recipients
            $mail->setFrom('tranphunguyenle30@gmail.com', 'phu');    //Add a recipient
            $mail->addAddress('tranphunguyenle30@gmail.com');               //Name is optional
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Liên hệ';
            $mail->Body    = '<h2> Người gửi: '.$contact->hoTen.'</h2>'.'<p>'.$contact -> noiDung.'</p>'.'<p>'.$contact -> email.'</p>';

            $mail -> Send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function forgotpas($userForgot){
        $mail = new PHPMailer(true);
        // dd($userForgot);
        try {
            //Server settings
            //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tranphunguyenle30@gmail.com';                     //SMTP username
            $mail->Password   = 'qxok nqdt obeb turu';                               //SMTP password
            // $mail->Username = 'demolaravelappphu@gmail.com';
            // $mail->Password = 'ujnr onys dacd pnxu';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet='utf-8';
            //Recipients
            $mail->setFrom('tranphunguyenle30@gmail.com', 'phu');    //Add a recipient
            $mail->addAddress($userForgot->email);               //Name is optional
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body    = '<div style="width: 400px; height: 100px; margin:0px auto;padding-top: 25px;background-color: #b2aeae; align-items: center;text-align: center">
            <h2>'.$userForgot->remember_token.'</h2>
        </div>';

            $mail -> Send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function getAllVe(){
        return ve::all();
    }

    public function xoaLichChieu($idLichChieu){
        return lichChieu::destroy($idLichChieu);
    }

    public function xoaVe($idLichChieu){
        return DB::table('ve')->where('id_lichchieu',$idLichChieu)->delete();
    }

    public function getAllHoaDon(){
        return hoadon::all();
    }

    public function getHoaDonByid($id){
        return hoadon::find($id);
    }

    public function sendHoaDon($hoadon){
        $mail = new PHPMailer(true);
        $listVe = $this->getAllVe();
        foreach($listVe as $itemVe){
            if($hoadon->id_Ve == $itemVe->id_Ve){
                $ve = $this->getVeById($hoadon->id_Ve);
            }
        }
        $listLichChieu = $this->getAllLichChieu();
        foreach($listLichChieu as $itemLC){
            if($ve->id_lichchieu == $itemLC->id){
                $lc = $this->getLichChieuById($ve->id_lichchieu);
            }
        }
        $listTietMuc = $this->getAllTietMuc();
        foreach($listTietMuc as $itemTM){
            if($itemTM->id_TietMuc == $lc->id_TietMuc){
                $tm = $this->getTietMucById($itemTM->id_TietMuc);
            }
        }
        $listUser = $this->getAllUser();
        foreach($listUser as $itemU){
            if($itemU->id_User == $hoadon->id_User){
                $user = $this->getUserById($hoadon->id_User);
            }
        }
        // dd($userForgot);
        try {
            //Server settings
            //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tranphunguyenle30@gmail.com';                     //SMTP username
            $mail->Password   = 'qxok nqdt obeb turu';                               //SMTP password
            // $mail->Username = 'demolaravelappphu@gmail.com';
            // $mail->Password = 'ujnr onys dacd pnxu';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet='utf-8';
            //Recipients
            $mail->setFrom('tranphunguyenle30@gmail.com', 'phu');    //Add a recipient
            $mail->addAddress($user->email);               //Name is optional
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Thông tin hóa đơn';
            $mail->Body    = '<div style="width: 500px; text-align: center;align-items: center">
            <ul style="list-style: none;">
                <li style="padding: 5px 0;font-size:18px"><b>Họ tên:</b>'.$user->hoTen.'</li>
                
                <li style="padding: 5px 0;font-size:18px"><b>Tên tiết mục:</b>'.$tm->tenTietMuc.'</li>
                
                <li style="padding: 5px 0;font-size:18px"><b>Số lượng: </b>'.$hoadon->soLuongVeMua.'</li>
                
                <li style="padding: 5px 0;font-size:18px"><b>Tổng tiền:</b>
                    '.number_format($hoadon->thanhTien).'VNĐ
                </li>
                
                
            </ul>
        </div>';

            $mail -> Send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}  
?>