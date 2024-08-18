<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lichSuGiaoDich extends Model
{
    //
    protected $table = 'lichsugiaodich';

    protected $primaryKey = 'id_LichSuGd';

    protected $fillable = ['thoiGianThanhToan','id_HoaDon','id_User'];
}
