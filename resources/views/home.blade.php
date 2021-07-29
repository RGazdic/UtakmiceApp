@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-between">
        <!-- Prikaz sezona -->
        <div class="col-7">
            <div class="row justify-content-between">
                <div>
                    <h1>Sezone</h1>
                </div>
                <div>
                    @auth
                        <a class="btn btn-outline-primary mt-1" href="season/create" role="button">Dodaj sezonu</a>
                    @endauth
                </div>
            </div>

            <div class="row">
                @foreach($seasons as $season)
                    <a href="/season/{{ $season->year }}"><button type="button" class="btn btn-outline-primary mr-2">{{ $season->year }}</button></a>
                @endforeach
            </div>
        </div>
        <div class="col-3 float-right ml-5">
            <div class="row justify-content-between">
                <div>
                    <h1>Timovi</h1>
                </div>
                <div>
                    @auth
                    <a class="btn btn-outline-success mt-1" href="team/create" role="button">Dodaj tim</a>
                    @endauth
                </div>
            </div>
            <div class="row">
                <ul class="list-group w-100">
                    @foreach($teams as $team)
                        <li class="list-group-item ">{{ $team->name }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
</div>
@endsection
