<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AuthServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index() {
        Gate::authorize('access-client');

        $type = DB::table('servises')
        ->select('servise_type')
        ->distinct()
        ->get()
        ->all();

        $carservise = DB::table('carservises')
        ->get()
        ->all();

        return view('search', ['type' => $type, 'carservises' => $carservise]);
    }
}
