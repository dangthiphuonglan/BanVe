<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    //
    protected $table = 'hoadon';

    protected $primaryKey = 'id_HoaDon';

    protected $fillable = ['id_Ve','hinhAnh','soLuongVeMua','thanhTien','trangthai','id_User'];
}
