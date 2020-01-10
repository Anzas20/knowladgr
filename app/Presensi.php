<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
  protected $table = 'tb_presensi';

  protected $fillable = [
    'id_presensi', 'kd_qr','nim'
  ];

  protected $primaryKey = 'id_presensi';

  public $incrementing = true;
}
