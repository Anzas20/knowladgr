<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPresensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_presensi', function (Blueprint $table) {
            $table->increments('id_presensi');
            $table->string('kd_qr')->index();
            $table->foreign('kd_qr')->references('kd_qr')->on('tb_qrcode');
            $table->string('nim')->index();
            $table->foreign('nim')->references('nim')->on('tb_mahasiswa');
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
        Schema::dropIfExists('tb_presensi');
    }
}
