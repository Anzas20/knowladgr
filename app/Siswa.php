<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  protected $table = 'siswa';

  protected $fillable = [
    'nisn', 'username', 'password', 'nama','kelas', 'jk', 'alamat', 'foto'
  ];

  // protected $hidden = [
  //   'password','remember_token'
  // ];

  protected $primaryKey = 'nisn';

  public $timestamps = false;

  public $incrementing = false;

  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = bcrypt($value);
  }
}
