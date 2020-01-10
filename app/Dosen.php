<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
  use Notifiable;

  protected $table = 'tb_dosen';

  protected $fillable = [
    'nip','nama','password'
  ];

  protected $hidden = [
    'password','remember_token'
  ];

  protected $primaryKey = 'nip';

  public $incrementing = false;

  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = bcrypt($value);
  }
}
