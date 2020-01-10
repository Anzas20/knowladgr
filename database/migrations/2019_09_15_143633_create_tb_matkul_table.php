<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMatkulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_matkul', function (Blueprint $table) {
            $table->string('kd_mk')->primary();
            $table->string('mata_kuliah');
            $table->integer('semester', false, true);
            $table->integer('sks', false, true);
            $table->string('nip')->index();
            $table->foreign('nip')->references('nip')->on('tb_dosen');
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
        Schema::dropIfExists('tb_matkul');
    }
}
