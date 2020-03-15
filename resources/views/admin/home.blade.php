@extends('layouts.admin')

@section('content')
    <div class="">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div id="main-admin">
            <div id="search-home-admin">

                <h2>Cerchiamo insieme l' appartamento dei tuoi sogni!</h2>
                <div class="form-group my-form form-inline">
                    <input type="text" class="form-control fluid" placeholder="Everywhere">
                    <button type="button" class="btn btn-success ml-4 mr-2 ">Search</button>
                    <button type="button" class="btn btn-info"><a href="{{route('admin.search')}}">TEST</a> </button>
                </div>
            </div>
        </div>


@endsection
