<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Season;
use App\Models\Team;
use Illuminate\Http\Request;

class SeasonController extends Controller
{


    // New season form
    public function create()
    {
        return view('season.create');
    }

    // Store new season
    public function store()
    {
        $data = request()->validate([
            'year' => ['required','integer','unique:seasons'],
        ]);

        Season::create($data);

        return redirect('/');

    }


    // Display matches from season
    public function show($year)
    {
        $season = Season::where('year', $year)->first();
        $matches = Match::orderBy('created_at','desc')->where('season', $year)->get();

        $teams = Team::all();
        $scores = array();
        $temp = array();
        $teams_sorted_id = array();
        $teams_sorted = array();

        foreach ($teams as $team)
            array_push($scores,$team->countPoints($team->id,$year));

        foreach ($scores as $score)
        {
            $max = max($scores);
            $pos = array_search($max,$scores);
            unset($scores[$pos]);
            array_push($teams_sorted_id,$pos);
        }

        foreach ($teams_sorted_id as $key => $val)
        {
            $a = Team::find($val+1);
            array_push($teams_sorted,$a);
        }

        return view('season.show', [
            'season' => $season,
            'matches' => $matches,
            'teams' => $teams_sorted,
        ]);
    }


}
