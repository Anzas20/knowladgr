<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasil';

  protected $fillable = [
    'id_hasil', 'nisn','id_soal','hasil'
  ];

  protected $primaryKey = 'id_hasil';

  public function siswa()
  {
      return $this->hasOne('App\Siswa', 'nisn');
  }
}
