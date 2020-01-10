<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Matkul;
use App\QrCode;
use Illuminate\Support\Str;
use DB;

class DosenController extends Controller
{
    public function dosenLogin(Request $request){
        return view('dosen.login');
    }
    public function doLogin(Request $request){
        $auth = auth()->guard('dosen');

        $credentials = [
          'nip'    => $request->nip,
          'password' => $request->password,
        ];

        if ($auth->attempt($credentials)) {
          $request->session()->put('nip', $request->nip);
          return response()->json([
            'error'   => 0,
            'message' => 'Login Success',
            'nip'   => $request->nip
          ], 200);
        } else {
          return response()->json([
            'error'   => 2,
            'message' => 'Wrong Username or Password'
          ], 200);
        }
    }

    public function logout(Request $request){
      $request->session()->forget('nip');
      return redirect()->route('loginDosen');
    }

    public function dashboard(Request $request){
        $mhs   = Mahasiswa::count();
        $nip   = $request->session()->get('nip');

        $namaDosen = DB::table('tb_dosen')->where('nip', $nip)->value('nama');

        return view('dosen.dashboard', compact('mhs', 'namaDosen'));
    }

    public function dataMahasiswa(Request $request){
       $mahasiswa = DB::table('tb_mahasiswa')->get();

       return view('dosen.datamhs', compact('mahasiswa'));
    }

    public function datamk(Request $request){
       $mk = DB::table('tb_matkul')->get();

       return view('dosen.datamatkul', compact('mk'));
    }

    public function addMatkul(Request $request){
        $cek = DB::table('tb_matkul')->where('kd_mk', $request->kd_mk)->count();
        $nip = $request->session()->get('nip');

        if($cek == 0){
          $add = new Matkul;
          $add->kd_mk = $request->kd_mk;
          $add->mata_kuliah = $request->mata_kuliah;
          $add->semester = $request->semester;
          $add->sks = $request->sks;
          $add->nip = $nip;
          $add->save();

          if($add){
            return response()->json([
              'error'   => 0,
              'message' => 'Success'
            ], 200);
          }else{
            return response()->json([
              'error'   => 2,
              'message' => 'Gagal'
            ], 200);
          }
        }else{
          return response()->json([
            'error'   => 1,
            'message' => 'Kode Matkul Sudah Dipakai'
          ], 200);
        }
    }

    public function deleteMatkul(Request $request){
       $data = Matkul::findOrFail($request->kd_mk);

       try {
           $data->delete();

           if( $data ){
             return response()->json([
               'error' => 0,
               'message' => 'Success Delete Data'
             ], 200);
           }
         } catch (\Exception $e) {
             return response()->json([
               'error' => 1,
               'message' => 'Failed Delete Data'
             ], 200);
         }
    }


    //qr code
    public function dataqr(Request $request){
       $mk = DB::table('tb_matkul')->get();
       $qr = DB::table('tb_qrcode')->get();

       return view('dosen.dataqrcode', compact('mk', 'qr'));
    }

    public function addQrCode(Request $request){
          $add = new QrCode;
          $add->kd_qr = Str::random(5);
          $add->kd_mk = $request->kd_mk;
          $add->date = $request->date;
          $add->save();

          if($add){
            return response()->json([
              'error'   => 0,
              'message' => 'Success'
            ], 200);
          }else{
            return response()->json([
              'error'   => 2,
              'message' => 'Gagal'
            ], 200);
          }

    }

    public function deleteQrCode(Request $request){
       $data = QrCode::findOrFail($request->kd_qr);

       try {
           $data->delete();

           if( $data ){
             return response()->json([
               'error' => 0,
               'message' => 'Success Delete Data'
             ], 200);
           }
         } catch (\Exception $e) {
             return response()->json([
               'error' => 1,
               'message' => 'Failed Delete Data'
             ], 200);
         }
    }
}
