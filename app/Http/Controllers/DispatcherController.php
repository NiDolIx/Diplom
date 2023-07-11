<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DispatcherController extends Controller
{
    public function index() {
        $statusOne = DB::table('bids')
        ->join('users', 'bids.user_id', '=', 'users.user_id')
        ->join('cars', 'users.user_id', '=', 'cars.user_id')
        ->select('cars.*', 'bids.*', 'users.*')
        ->where('bids.bid_status', '=', '1')
        ->where('bids.carservise_id', '=', Auth::user()->carservise_id)
        ->get()
        ->all();

        $statusTwo = DB::table('bids')
        ->join('users', 'bids.user_id', '=', 'users.user_id')
        ->join('cars', 'users.user_id', '=', 'cars.user_id')
        ->where('bids.bid_status', '=', '2')
        ->where('bids.carservise_id', '=', Auth::user()->carservise_id)
        ->get()
        ->all();

        $statusThree = DB::table('bids')
        ->join('users', 'bids.user_id', '=', 'users.user_id')
        ->join('cars', 'users.user_id', '=', 'cars.user_id')
        ->where('bids.bid_status', '=', '3')
        ->where('bids.carservise_id', '=', Auth::user()->carservise_id)
        ->get()
        ->all();

        $statusFor = DB::table('bids')
        ->join('users', 'bids.user_id', '=', 'users.user_id')
        ->join('cars', 'users.user_id', '=', 'cars.user_id')
        ->where('bids.bid_status', '=', '4')
        ->where('bids.carservise_id', '=', Auth::user()->carservise_id)
        ->get()
        ->all();

        return view('dispatcher', ['statusOne' => $statusOne, 'statusTwo' => $statusTwo, 'statusThree' => $statusThree, 'statusFor' => $statusFor]);
    }

    public function updateStatusOne(Request $request, $bid_id) {
        DB::table('bids')
        ->where('bids.bid_id', '=', $bid_id)
        ->update([
            'bids.bid_status' => '2'
        ]);

        return redirect()->route('dispatcher.index');
    }

    public function updateStatusTwo(Request $request, $bid_id) {
        DB::table('bids')
        ->where('bids.bid_id', '=', $bid_id)
        ->update([
            'bids.bid_status' => '3'
        ]);

        return redirect()->route('dispatcher.index');
    }

    public function updateStatusThree(Request $request, $bid_id) {
        DB::table('bids')
        ->where('bids.bid_id', '=', $bid_id)
        ->update([
            'bids.bid_status' => '4',
            'bids.bid_date_end' => Carbon::parse(Carbon::now())
        ]);

        return redirect()->route('dispatcher.index');
    }

    public function updateServiseInfo() {
        $data = DB::table('carservises')
        ->where('carservise_id', '=', Auth::user()->carservise_id)
        ->get()
        ->all();

        return view('updateServiseInfo', ['data' => $data]);
    }

    public function updateServiseInfoUpd(Request $request) {
        $user = Auth::user();

        DB::table('carservises')->where('carservise_id', '=', $user->carservise_id)->update([
            'carservise_name' => $request->carservise_name,
            'carservise_address' => $request->carservise_address,
            'carservise_phone' => $request->carservise_phone,
            'carservise_site' => $request->carservise_site,
            'carservise_schedule' => $request->carservise_schedule,
            'carservise_info' => $request->carservise_info,
            'carservise_car' => $request->carservise_car
        ]);

        return redirect()->route('servise.index', Auth::user()->carservise_id);
    }

    public function updateServiseServises() {
        $servises = DB::table('servises')
        ->get()
        ->all();

        $servises_add = DB::table('servises')
        ->join('providedes', 'servises.servise_id', '=', 'providedes.servise_id')
        ->select('servises.*')
        ->where('providedes.carservise_id', '=', Auth::user()->carservise_id)
        ->get()
        ->all();
        
        return view('updateServiseServises', ['servises' => $servises, 'servises_add' => $servises_add]);
    }

    public function addServiseServises(Request $request) {
        $request->all();

        $data = DB::table('servises')
        ->select('servise_id')
        ->where('servise_name', '=', $request->servise_name)
        ->get()
        ->all();

        $element;

        foreach($data as $i) {
            $element = $i->servise_id;
        }

        DB::table('providedes')->insert([
            'servise_id' => $element,
            'carservise_id' => Auth::user()->carservise_id
        ]);

        return redirect()->route('servise.updateServiseServises', Auth::user()->carservise_id);
    }

    public function deleteServiseServises($servise_id) {
        $servises = DB::table('providedes')
        ->where('providedes.servise_id', '=', $servise_id)
        ->where('providedes.carservise_id', '=', Auth::user()->carservise_id);

        if($servises) {
            $servises->delete();
        }
        
        return redirect()->route('servise.updateServiseServises', Auth::user()->carservise_id);
    }

    public function deleteBid($bid_id) {
        $bid = DB::table('bids')
        ->where('bids.bid_id', '=', $bid_id);

        if($bid) {
            $bid->delete();
        }
        
        return redirect()->route('dispatcher.index');
    }
}
