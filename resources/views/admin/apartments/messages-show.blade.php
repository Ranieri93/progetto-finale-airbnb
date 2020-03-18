@extends('layouts.admin')

@section('content')
    <div class="container">
        @forelse ($messaggi_appartamento as $messaggio)
                <div class="row">
                    <div class="col-6">
                        <h3>{{$messaggio->email}}</h3>
                        <p>{{$messaggio->text_message}}</p>
                    </div>
                </div>
        @empty

                <div class="row">
                    <div class="col-6">
                        <p>Non c'è alcun post</p>
                    </div>
                </div>


        @endforelse
    </div>

        @include('layouts.partials.footer')
@endsection
