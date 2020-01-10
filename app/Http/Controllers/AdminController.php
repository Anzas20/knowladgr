<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Dosen;
use App\Hasil;
use App\Siswa;
use App\Soal;

class AdminController extends Controller
{
    public function adminLogin(Request $request){
        return view('admin.login');
    }
    public function doLogin(Request $request){
        $auth = auth()->guard('admin');

        $credentials = [
          'username'    => $request->username,
          'password' => $request->password,
        ];

        if ($auth->attempt($credentials)) {
          $request->session()->put('username', $request->username);
          return response()->json([
            'error'   => 0,
            'message' => 'Login Success',
            'username'   => $request->username
          ], 200);
        } else {
          return response()->json([
            'error'   => 2,
            'message' => 'Wrong Username or Password'
          ], 200);
        }
    }

    public function logout(Request $request){
      $request->session()->forget('username');
      return redirect()->route('loginAdmin');
    }

    public function dashboard(Request $request){
        // $dosen = Dosen::count();
        // $mhs   = Mahasiswa::count();
      $soal = Soal::count();
      $siswa = Siswa::count();
         $username = $request->session()->get('username');
//, compact('dosen', 'mhs', 'username')
        return view('admin.dashboard', compact('username','soal', 'siswa'));
    }


    //soal
    public function datasoal(Request $request){
       $soal = DB::table('soal')->get();

       return view('admin.datasoal', compact('soal'));
    }
    public function deleteSoal(Request $request){
       $data = Soal::findOrFail($request->id_soal);
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
    public function addSoal(Request $request){
         $add = Soal::create($request->all());

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

    // //dosen
    // public function dataDosen(Request $request){
    //    $dosen = DB::table('tb_dosen')->get();

    //    return view('admin.datadosen', compact('dosen'));
    // }
    // public function addDosen(Request $request){
    //    $cek = DB::table('tb_dosen')->where('nip', $request->nip)->count();

    //    if($cek == 0){
    //      $add = Dosen::create($request->all());

    //      if($add){
    //        return response()->json([
    //          'error'   => 0,
    //          'message' => 'Success'
    //        ], 200);
    //      }else{
    //        return response()->json([
    //          'error'   => 2,
    //          'message' => 'Gagal'
    //        ], 200);
    //      }
    //    }else{
    //      return response()->json([
    //        'error'   => 1,
    //        'message' => 'NIP Sudah Dipakai'
    //      ], 200);
    //    }
    // }

    // public function deleteDosen(Request $request){
    //    $data = Dosen::findOrFail($request->nip);

    //    try {
    //        $data->delete();

    //        if( $data ){
    //          return response()->json([
    //            'error' => 0,
    //            'message' => 'Success Delete Data'
    //          ], 200);
    //        }
    //      } catch (\Exception $e) {
    //          return response()->json([
    //            'error' => 1,
    //            'message' => 'Failed Delete Data'
    //          ], 200);
    //      }
    // }

    //siswa
    public function datasiswa(Request $request){
       $siswa = DB::table('siswa')->get();
       return view('admin.datasiswa', compact('siswa'));
    }

    public function addSiswa(Request $request){
         $add = Siswa::create($request->all());

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

     public function deleteSiswa(Request $request){
       $data = Siswa::findOrFail($request->nisn);

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

    //skor
    public function dataskor(Request $request){
      // $skor = DB::table('hasil')->get();

      $skor = DB::table('siswa')->join('hasil', 'siswa.nisn', '=', 'hasil.nisn')->get();

      return view('admin.dataskor', compact('skor'));
    }
}
