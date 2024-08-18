<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lichChieu extends Model
{
    //
    protected $table = 'lichchieu';

    protected $primaryKey = 'id';

    protected $fillable = ['id_TietMuc','created_at'];
}
