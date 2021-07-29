@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dodaj novu utakmicu') }}</div>

                <div class="card-body">
                    @if(session('status'))
                        <span class="bg-danger w-100 text-center float-left text-white p-1 mb-2">
                            <strong>{{ session('status') }}</strong>
                        </span>
                    @endif
                    <form method="POST" action="/match" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Domacin') }}</label>

                            <div class="col-md-6">
                                <select required name="home_id" class="form-control" id="home_id">
                                    <option>- Domacin -</option>
                                    @foreach ($teams as $key => $value)
                                        <option value="{{ $value->id }}"

                                        >{{ $value->name }}</option>
                                    @endforeach
                                </select>

                                @error('home_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Gost') }}</label>

                            <div class="col-md-6">
                                <select required name="away_id" class="form-control" id="away_id">
                                    <option>- Gost -</option>
                                    @foreach ($teams as $key => $value)
                                        <option value="{{ $value->id }}"

                                        >{{ $value->name }}</option>
                                    @endforeach
                                </select>

                                @error('away_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="home_goal" class="col-md-4 col-form-label text-md-right">{{ __('Golovi domacina') }}</label>

                            <div class="col-md-6">
                                <input id="home_goals"  type="home_goals" class="form-control @error('home_goals') is-invalid @enderror" name="home_goals" value="{{ old('home_goals') }}" required autocomplete="home_goals" autofocus>

                                @error('home_goals')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="away_goals" class="col-md-4 col-form-label text-md-right">{{ __('Golovi gosta') }}</label>

                            <div class="col-md-6">
                                <input id="away_goals"  type="away_goals" class="form-control @error('away_goals') is-invalid @enderror" name="away_goals" value="{{ old('away_goals') }}" required autocomplete="away_goals" autofocus>

                                @error('away_goals')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="season" class="col-md-4 col-form-label text-md-right">{{ __('Sezona') }}</label>

                            <div class="col-md-6">
                                <input id="season" readonly type="season" class="form-control @error('season') is-invalid @enderror" name="season" value="{{ $season }}" required autocomplete="season" autofocus>

                                @error('season')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Dodaj') }}
                                </button>
                                <a href="/season/{{ $season }}" class="btn btn-secondary">Odustani</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
