<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
  protected $table = 'tb_qrcode';

  protected $fillable = [
    'kd_qr', 'kd_mk','nim','date'
  ];

  protected $primaryKey = 'kd_qr';

  public $incrementing = false;
}
