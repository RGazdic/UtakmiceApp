<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Score;
use App\Models\Season;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    // Restrict acces to only logged users
    public function __construct()
    {
        $this->middleware('auth');
    }

    // New match form
    public function create($season)
    {
        $teams = Team::all();

        return view('match.create', [
            'teams' => $teams,
            'season' => $season,
        ]);
    }

    // Store new match
    public function store()
    {

        $data = request()->validate([
            'home_id' => ['required','integer'],
            'away_id' => ['required','integer'],
            'season' => ['required','integer'],
            'home_goals' => ['required','integer'],
            'away_goals' => ['required','integer'],
        ]);

        // Provjera ako su isti timovi odabrani
        if (request()->home_id == request()->away_id)
            return back()->with('status','Tim ne moze igrati protiv samog sebe');

        // Provjeriti da li su u toj sezoni timovi vec odigrali utakmicu
        if(Match::where('home_id',request()->home_id)->where('away_id',request()->away_id)->where('season',request()->season)->count()>0)
            return back()->with('status','Timovi mogu odigrati medjusobno samo 2 utakmice, kao domacin i u gostima');

        Match::create($data);




        return redirect('/season/'.request()->season);

    }
}
