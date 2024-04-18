<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan Anda telah membuat model User ini
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{
    function index(){
        return view('frontend.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         // Jika autentikasi berhasil
    //         $request->session()->regenerate();
    //         $request->session()->put('idUser', Auth::user()->id);
    //         return redirect()->intended('/home'); // Ganti '/dashboard' dengan rute yang ingin Anda tuju setelah login berhasil
    //     }

    //     // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
    //     return redirect()->route('login')->with('error', 'Email atau kata sandi yang Anda masukkan salah.');
    // }

    public function login(Request $request) {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.string' => 'Email tidak valid',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.string' => 'Password tidak valid',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)) {
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'Berhasil Login!');
        } else {
            return redirect()->route('sesiLogin');
        }
    }

    function logout() {
        Auth::logout();
        return redirect('home')->with('success', 'Terimakasih sudah mengunjungi perpustakaan kami');
    }

    function register(){
        return view('frontend.register');
    }

    function create(Request $request){
        Session::flash('namaLengkap', $request->namaLengkap);
        Session::flash('email', $request->email);
        $request->validate([
            'namaLengkap' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ], [
            'namaLengkap.required' => 'Nama Lengkap tidak boleh kosong',
            'namaLengkap.string' => 'Nama Lengkap tidak valid',
            'email.required' => 'Email tidak boleh kosong',
            'email.string' => 'Email tidak valid',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.string' => 'Password tidak valid',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $data = new User();
        $data->namaLengkap = $request->namaLengkap;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        // $data = [
        //     'namaLengkap' => $request->namaLengkap,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ];
        // User::create($data);

        // $infologin = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        if($data->save()) {
            return redirect(route("sesiLogin"))->with('success', 'Asik, Selamat datang di perpustakaan kami');
        } else {
            return redirect(route("sesiRegister"))->with("error", "Gagal membuat akun");
        }
    }
}
