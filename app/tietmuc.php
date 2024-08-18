<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tietmuc extends Model
{
    //
    protected $table = 'tietmuc';

    protected $primaryKey = 'id_TietMuc';

    protected $fillable = ['tenTietMuc','hinhAnh','moTa','id_DanhMuc'];
}
