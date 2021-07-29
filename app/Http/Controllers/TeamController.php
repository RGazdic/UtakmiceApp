<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Restrict acces to only logged users
    public function __construct()
    {
        $this->middleware('auth');
    }

    // New season form
    public function create()
    {
        return view('teams.create');
    }

    // Store new season
    public function store()
    {
        $data = request()->validate([
            'name' => ['required','string','unique:teams'],
        ]);

        Team::create($data);
        return redirect('/');

    }



}
