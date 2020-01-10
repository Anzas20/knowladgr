<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
  protected $table = 'tb_matkul';

  protected $fillable = [
    'kd_mk', 'mata_kuliah','semester','sks','nip'
  ];

  protected $primaryKey = 'kd_mk';

  public $incrementing = false;
}
