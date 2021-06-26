<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AutentikasiController extends Controller
{
  public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    //Create Account
    public function Autentikasi(){
        return view('autentikasi.register');
    }

    public function saveregistrasi(Request $request){

      User::create([
        'name' => $request->name,
        'level_user' => '3',
        'username' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'remember_token' => Str::random(60),
      ]);
      // return redirect('/')->with(['pesan' => 'Akun Berhasil dibuat']);
      return redirect('/')->withSuccess('Task Created Successfully!');
    }

    
}
