<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function countWins($team_id,$season)
    {
        $home_win = Match::where('home_id',$team_id)->whereColumn('home_goals','>','away_goals')->where('season',$season)->count();
        $away_win = Match::where('away_id',$team_id)->whereColumn('home_goals','<','away_goals')->where('season',$season)->count();
        return $home_win + $away_win;
    }

    public function countLosses($team_id,$season)
    {
        $home_loss = Match::where('home_id',$team_id)->whereColumn('home_goals','<','away_goals')->where('season',$season)->count();
        $away_loss = Match::where('away_id',$team_id)->whereColumn('home_goals','>','away_goals')->where('season',$season)->count();
        return $home_loss + $away_loss;
    }

    public function countDraws($team_id,$season)
    {
        $home_draw = Match::where('home_id',$team_id)->whereColumn('home_goals','=','away_goals')->where('season',$season)->count();
        $away_draw = Match::where('away_id',$team_id)->whereColumn('home_goals','=','away_goals')->where('season',$season)->count();
        return $home_draw + $away_draw;
    }

    public function countPoints($team_id,$season)
    {
        return $this->countWins($team_id,$season)*3 + $this->countDraws($team_id,$season);
    }
}
