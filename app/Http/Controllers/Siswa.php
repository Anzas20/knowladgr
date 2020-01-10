<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Siswa extends Controller
{
    public function input()
    {

    	return view('input');
    }

    public function proses(Request $request)
    {
    	$this->validate($request,[
    		'nama'=> 'required|min:5|max:20',
    		'kelas'=> 'required',
    		'usia'=> 'required|numeric'
    	]);

    	return view('proses',['data' =>$request]);
    }

    
}
