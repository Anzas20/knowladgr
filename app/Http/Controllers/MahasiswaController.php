<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class MahasiswaController extends Controller
{
    public function login(Request $request){
      $auth = auth()->guard('mahasiswa');

      $credentials = [
            'nim'      => $request->nim,
            'password' => $request->password,
      ];

      $validator = Validator::make($request->all(), [
            'nim' => 'required|min:4|numeric|not_in:0|regex:/^([1-9][0-9]+)/',
            'password' => 'required|string|min:4',
      ]);

      $nama = DB::table('tb_mahasiswa')->where('nim', $request->nim)->value('nama');

      if( $validator->fails() ){
            return response()->json([
              'error'   => 2,
              'message' => $validator->messages()->all(),
            ], 200);
        }else{
            if( $auth->attempt($credentials) ){
                return response()->json([
                    'error'   => 0,
                    'message' => ['Selamat Datang '.$nama.''],
                ], 200);
            }else{
                return response()->json([
                    'error'   => 1,
                    'message' => ['NIM atau Password Salah'],
                ], 200);
            }
        }

    }
}
