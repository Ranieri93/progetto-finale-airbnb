@extends('layouts.admin')
@section('content')
<div class="container mt-5 index">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h1>Tutti i tuoi appartamenti</h1>
            </div>

            @if (session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach($apartments as $apartment)
            <div class="apartment-card">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 ap-img d-flex align-items-center justify-content-center card-sez">
                         <img class="lg md" src=@if(strpos($apartment->cover_image, 'https') !== false)
                            "{{$apartment->cover_image}}">
                        @else
                            "{{asset('storage/' . $apartment->cover_image)}}">
                        @endif
                    </div>
                    <div class="col-6 col-md-6 col-sm-12 d-flex flex-column">
                        <div class="card-sez">
                            <h1>{{ $apartment->sommary_title }}</h1>
                            <h2>Camere: {{ $apartment->room_number }}<h2>
                        </div>
                        <div class="actions card-sez medium-spacer">
                            <h3>Azioni</h3>
                            <div class="d-flex flex-row medium-spacer">
                                <a id="details-button" class="act-butt tbl lg" href="{{ route('admin.apartments.show', ['apartment' => $apartment->id])}}"><i class="fas fa-search"></i></a>
                                <a id="edit-button" class="act-butt tbl lg" href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id])}}"><i class="fas fa-pencil-alt"></i></a>
                                <form method="post" action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="del-btn">
                                        <button id="send-form"><i id="delete-button" class="fas fa-trash act-butt tbl lg"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="sponsor-btn">
                    @if (isset(($apartment->ads)->last()->ad_end))
                            @php
                                $end_ad = (($apartment->ads)->last()->ad_end)
                            @endphp
                        @else
                            {{ $end_ad = NULL }}
                    @endif
                    @if (!isset($end_ad) || $today > $end_ad)
                        <a href="{{ route('admin.ad', ['apartment' => $apartment->id]) }}"><img id="not-spons" src="https://image.flaticon.com/icons/svg/1435/1435174.svg"></a>
                    @else
                        <img src="https://image.flaticon.com/icons/svg/1435/1435174.svg">
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('layouts.partials.footer')
@endsection
