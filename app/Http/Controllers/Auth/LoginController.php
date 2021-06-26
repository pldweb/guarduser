<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()

    {
        return view('autentikasi.login');
    }

    public function login(Request $request){
      $this->validate($request, [
          'username' => 'required|string|min:2', //VALIDASI KOLOM USERNAME
          //TAPI KOLOM INI BISA BERISI EMAIL ATAU USERNAME
          'password' => 'required|string|min:6',
      ]);
        
     
      //LAKUKAN PENGECEKAN, JIKA INPUTAN DARI USERNAME FORMATNYA ADALAH EMAIL, MAKA KITA AKAN MELAKUKAN PROSES AUTHENTICATION MENGGUNAKAN EMAIL, SELAIN ITU, AKAN MENGGUNAKAN USERNAME
      $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

      $ingat = $request->remember ? true : false;
      // Jika check box nya diceklis maka akan mengembalikan nilai true
    
      //TAMPUNG INFORMASI LOGINNYA, DIMANA KOLOM TYPE PERTAMA BERSIFAT DINAMIS BERDASARKAN VALUE DARI PENGECEKAN DIATAS
      $login = [
          $loginType => $request->username,
          'password' => $request->password
      ];
    
      //LAKUKAN LOGIN
      if (auth()->attempt($login,$ingat)) {
          //JIKA BERHASIL, MAKA REDIRECT KE HALAMAN dashboard
          return redirect('/dashboard')->with('success', 'berhasil Login');
      }
      //JIKA SALAH, MAKA KEMBALI KE LOGIN DAN TAMPILKAN NOTIFIKASI 
      return redirect('/')->with('error', 'Email/Password salah!');
  }

  public function logout(Request $request){
    Auth::logout();
    return redirect('/');
  }

   
}
