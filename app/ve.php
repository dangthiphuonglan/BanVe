<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ve extends Model
{
    //
    protected $table = 've';

    protected $primaryKey = 'id_Ve';

    protected $fillable = ['id_lichchieu','soLuongBan','soLuongCon','giaVe','created_at'];
}
