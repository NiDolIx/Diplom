<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function userView() {
        return view('admin', ['data' => DB::table('users')->where('user_role', '<', '3')->get()->all()]);
    }

    public function userAdd(Request $request) {
        User::query()->create([
            'user_name' => $request['user_name'],
            'user_surname' => $request['user_surname'],
            'user_patronymic' => $request['user_patronymic'],
            'password' => Hash::make($request['user_password']),
            'carservise_id' => $request['carservise_id'],
            'user_phone' => $request['user_phone'],
            'user_role' => 2
        ]);

        return redirect()->back();
    }

    public function userDelete($user_id) {
        $user = DB::table('users')->where('user_id', '=', $user_id);

        if($user) {
            $user->delete();
        }

        return redirect()->back();
    }

    public function serviseView() {
        return view('addServise', ['data' => DB::table('carservises')->get()->all()]);
    }

    public function serviseAdd(Request $request) {
        $request->all();

        DB::table('carservises')->insert([
            'carservise_name' => $request->carservise_name,
            'carservise_address' => $request->carservise_address
        ]);

        return redirect()->back();
    }

    public function serviseDelete($carservise_id) {
        $carservise = DB::table('carservises')->where('carservise_id', '=', $carservise_id);
                                
        if($carservise) {   
            $carservise->delete();
        }

        return redirect()->back();
    }
}
