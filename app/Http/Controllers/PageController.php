<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan Anda telah membuat model User ini
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index() {
        // if(Auth::check()) {
        //     return view('frontend.home');
        // } else {
        //     return redirect('sesi');
        // }
    }

    function home() {
        return view('frontend.home');
    }

}
