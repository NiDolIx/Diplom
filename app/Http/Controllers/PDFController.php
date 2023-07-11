<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function preview() {
        $preview = DB::table('bids')
        ->join('users', 'bids.user_id', '=', 'users.user_id')
        ->join('cars', 'users.user_id', '=', 'cars.user_id')
        ->join('carservises', 'carservises.carservise_id', '=', 'bids.carservise_id')
        ->where('bids.bid_status', '=', '4')
        ->where('bids.user_id', '=', Auth::id())
        ->get()
        ->all();

        return view('preview', ['data' => $preview]);
    }

    public function generatePDF() {
        $data = DB::table('bids')
        ->join('users', 'bids.user_id', '=', 'users.user_id')
        ->join('cars', 'users.user_id', '=', 'cars.user_id')
        ->join('carservises', 'carservises.carservise_id', '=', 'bids.carservise_id')
        ->where('bids.bid_status', '=', '4')
        ->where('bids.user_id', '=', Auth::id())
        ->get();

        $pdf = PDF::loadView('preview', compact('data'))->setPaper('A4', 'landscape');

        return $pdf->download('demo.pdf');
    }
}
