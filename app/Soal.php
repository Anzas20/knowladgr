<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';

  protected $fillable = [
    'id_soal', 'soal','opsi_1','opsi_2','opsi_3','opsi_4','opsi_jawaban'
  ];

  protected $primaryKey = 'id_soal';
}
