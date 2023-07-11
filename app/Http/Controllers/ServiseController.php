<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ServiseController extends Controller
{
    public function index($id) {
        $data = DB::table('carservises')
        ->select('*')
        ->where('carservise_id', '=', $id)
        ->get();

        $servises = DB::table('servises')
        ->join('providedes', 'servises.servise_id', '=', 'providedes.servise_id')
        ->select('servise_type', 'servise_name')
        ->where('providedes.carservise_id', '=', $id)
        ->get()
        ->all();

        $cars = DB::table('cars')
        ->select('cars.car_model', 'cars.car_mark', 'cars.car_sts')
        ->where('cars.user_id', '=', Auth::user()->user_id)
        ->get()
        ->all();

        $comments = DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.user_id')
        ->select('comments.comment_text', 'comments.comment_rating', 'comments.comment_date', 'users.user_name', 'users.user_surname')
        ->where('comments.carservise_id', '=', $id)
        ->get()
        ->all();

        return view('servise', ['data' => $data->all(), 'comments' => $comments, 'servises' => $servises, 'cars' => $cars]);
    }

    public function addComment(Request $request, $carservise_id) {
        $request->all();

        $date = Carbon::parse(Carbon::now())->format('Y-m-d');

        DB::table('comments')->insert([
            'user_id' => Auth::user()->user_id,
            'carservise_id' => $carservise_id,
            'comment_text' => $request->comment_text,
            'comment_rating' => $request->comment_rating,
            'comment_date' => $date
        ]);

        return redirect()->route('servise.index', $carservise_id);
    }

    public function addBid(Request $request, $carservise_id) {
        $request->all();

        DB::table('bids')->insert([
            'user_id' => Auth::user()->user_id,
            'carservise_id' => $carservise_id,
            'car_sts' => $request->car_sts,
            'bid_comment' => $request->bid_comment,
            'bid_status' => 1,
            'bid_date_add' => Carbon::parse(Carbon::now())
        ]);

        return redirect()->route('servise.index', $carservise_id);
    }
}
