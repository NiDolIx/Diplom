<?php

namespace App\Http\Controllers\Autentification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;

class RegisterController extends Controller {
    
    public function index() {
        return view('registration');
    }

    public function store(Request $request) {
        $validated = validator($request->all(), [
            'client_name' => ['required', 'string', 'max:50'],
            'client_surname' => ['required', 'string', 'max:50'],
            'client_patronymic' => ['nullable', 'string', 'max:50'],
            'client_phone' => ['required', 'string', 'min:11', 'max:11'],
            'client_mail' => ['nullable', 'string', 'max:50'],
            'client_password' => ['required', 'string']
        ])->validate();

        $user = User::query()->create([
            'user_name' => $validated['client_name'],
            'user_surname' => $validated['client_surname'],
            'user_patronymic' => $validated['client_patronymic'],
            'user_phone' => $validated['client_phone'],
            'user_mail' => $validated['client_mail'],
            'user_role' => 1,
            'password' => Hash::make($validated['client_password']),
            'carservise_id' => null
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
