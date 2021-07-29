@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <!-- Prikaz sezona -->
        <div class="col-8">
            <div class="row justify-content-between">
                <div class="d-flex align-content-between">
                    <div>
                        <a href="/">
                        <button type="button" class="btn btn-primary mt-1 mr-3">Nazad</button>
                        </a>
                    </div>
                    <div>
                        <h1>Sezona {{ $season->year }}</h1>
                    </div>
                </div>
                <div>
                    <a class="btn btn-primary" href="/match/create/{{ $season->year }}" role="button">Dodaj utakmicu</a>
                </div>
            </div>

            <div class="row mt-5 ">
                <h1>Tabela </h1>
                <table class="table table-bordered table-hover table-striped text-center">
                    <thead>
                    <tr>
                        <th scope="col">Team</th>
                        <th scope="col">W</th>
                        <th scope="col">L</th>
                        <th scope="col">D</th>
                        <th scope="col">P</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td scope="row">{{ $team->name }}</td>
                            <td>{{ $team->countWins($team->id,$season->year) }}</td>
                            <td>{{ $team->countLosses($team->id,$season->year) }}</td>
                            <td>{{ $team->countDraws($team->id,$season->year) }}</td>
                            <td>{{ $team->countPoints($team->id,$season->year) }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>


            <div class="row mt-5 ">
                <h1>Odigrane utakmice </h1>
                <table class="table table-bordered table-hover table-striped text-center">
                    <thead>
                    <tr>
                        <th scope="col">Domacin</th>
                        <th scope="col">Gost</th>
                        <th scope="col">Rezultat</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($matches as $match)
                        <tr>
                            <td scope="row">{{ \App\Models\Team::where('id',$match->home_id)->first()->name }}</td>
                            <td>{{ \App\Models\Team::where('id',$match->away_id)->first()->name }}</td>
                            <td>{{ $match->home_goals.":".$match->away_goals }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
