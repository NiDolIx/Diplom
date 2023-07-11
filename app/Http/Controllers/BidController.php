<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    public function index() {
        $bidsActive = DB::table('bids')
        ->where('user_id', '=', Auth::user()->user_id)
        ->where('bids.bid_status', '!=', '4')
        ->get()
        ->all();

        $bidsEnd = DB::table('bids')
        ->where('user_id', '=', Auth::user()->user_id)
        ->where('bids.bid_status', '=', '4')
        ->get()
        ->all();

        return view('bid', ['bidsActive' => $bidsActive, 'bidsEnd' => $bidsEnd]);
    }

    
}
