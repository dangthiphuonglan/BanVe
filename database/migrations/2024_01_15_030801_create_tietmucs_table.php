<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTietmucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tietmuc', function (Blueprint $table) {
            $table->bigIncrements('id_TietMuc');
            $table->string('tenTietMuc');
            $table->string('hinhAnh');
            $table->text('moTa');
            $table->bigInteger('id_DanhMuc');
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
        Schema::dropIfExists('tietmucs');
    }
}
