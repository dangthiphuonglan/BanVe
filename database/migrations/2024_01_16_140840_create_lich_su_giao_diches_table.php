<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLichSuGiaoDichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichsugiaodich', function (Blueprint $table) {
            $table->bigIncrements('id_LichSuGd');
            $table->dateTime('thoiGianThanhToan');
            $table->bigInteger('id_HoaDon');
            $table->bigInteger('id_User');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lich_su_giao_diches');
    }
}
