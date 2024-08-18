<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    //
    protected $table = 'danhmuc';

    protected $primaryKey = 'id_DanhMuc';

    protected $fillable = ['tenDanhMuc'];
}
