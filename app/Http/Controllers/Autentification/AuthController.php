<?php

namespace App\Http\Controllers\Autentification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view('auth');
    }

    public function store(Request $request) {
        $user = $request->only(['user_phone', 'user_password']);
        
        if(Auth::attempt(['user_phone' => $user['user_phone'], 'password' => $user['user_password']])) {
            if(Auth::user()->user_role == 1) {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
            elseif(Auth::user()->user_role == 2) {
                return redirect()->route('dispatcher.index');
            }
            elseif(Auth::user()->user_role == 3) {
                return redirect()->route('admin.userView');
            }
        }

        return redirect(route('auth.index'));
    }

    public function delete(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('autentification');
    }
}
