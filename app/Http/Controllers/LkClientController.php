<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Providers\AuthServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LkClientController extends Controller {
    public function index() {
        Gate::authorize('access-client');

        $car = DB::table('cars')
        ->where('user_id', '=', Auth::id())
        ->get();

        return view('lk', ['user' => Auth::user(), 'car' => $car->all()]);
    }   

    public function store(Request $request) {
        $request->all();

        DB::table('cars')->insert([
            'car_mark' => $request['car_mark'],
            'car_model' => $request['car_model'],
            'car_year' => $request['car_year'],
            'car_engine' => $request['car_engine'],
            'car_sts' => $request['car_sts'],
            'car_number' => $request['car_number'],
            'car_body' => $request['car_body'],
            'user_id' => Auth::id()
        ]);

        return redirect(RouteServiceProvider::HOME);
    }

    public function delete($car_sts) {
        $car = DB::table('cars')->where('car_sts', '=', [$car_sts]);

        if($car) {
            $car->delete();
        }
        
        return redirect(RouteServiceProvider::HOME);
    }

    public function lkUpdateView() {
        return view('lkUpdate', ['data' => Auth::user()]);
    }

    public function lkUpdateUpd(Request $request) {
        $request->all();

        DB::table('users')->where('user_id', '=', Auth::id())->update([
            'user_name' => $request->user_name,
            'user_surname' => $request->user_surname,
            'user_patronymic' => $request->user_patronymic,
            'user_phone' => $request->user_phone,
            'user_mail' => $request->user_mail
        ]);

        return redirect()->route('client.index');
    }
}