
@extends('layouts.public')
    @section('content')
    <main>
        <div class="form">
            <h1>Prenota allogi e attività unici.</h1>
            <div class="where mb-3">
                <h4>DOVE</h4>
                <input type="text" class="everywhere" id="" name="query" placeholder="Ovunque">
            </div>
            <div class="where mb-3">
                <button type="button" class="btn btn-danger find">Cerca</button>
                <button type="button" class="btn btn-secondary find"><a href="{{route('search')}}">PROVA SEARCH</a> </button>
            </div>
        </div>
    </main>
@endsection
