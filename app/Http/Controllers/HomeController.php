<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $seasons = Season::orderBy('year','desc')->get();
        $teams = Team::all();

        return view('home', [
            'seasons' => $seasons,
            'teams' => $teams,
        ]);
    }
}
