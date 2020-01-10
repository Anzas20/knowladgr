<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbQrcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_qrcode', function (Blueprint $table) {
            $table->string('kd_qr')->primary();
            $table->string('kd_mk')->index();
            $table->foreign('kd_mk')->references('kd_mk')->on('tb_matkul');
            // $table->string('nim')->index();
            // $table->foreign('nim')->references('nim')->on('tb_mahasiswa');
            $table->date('date');
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
        Schema::dropIfExists('tb_qrcode');
    }
}
