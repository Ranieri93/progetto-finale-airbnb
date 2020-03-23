@extends('layouts.admin')
@section('content')
<div class="container index">
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
                    <div class="col-lg-2 col-md-6 col-sm-12 ap-img d-flex align-items-center justify-content-center">
                         <img class="lg" src=@if(strpos($apartment->cover_image, 'https') !== false)
                            "{{$apartment->cover_image}}">
                        @else
                            "{{asset('storage/' . $apartment->cover_image)}}">
                        @endif
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <h2>{{ $apartment->sommary_title }}</h2>
                        <p>{{ $apartment->description }}<p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <h3>Info aggiuntive</h3>
                        <p>Camere: {{ $apartment->room_number }}<p>
                        <p>Ospiti: {{ $apartment->guest_number }}<p>
                        <p>Bagni: {{ $apartment->wc_number }}<p>
                        <p>Metri quadrati: {{ $apartment->square_meters }}mq<p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-12 services">
                        <h3>Servizi</h3>
                        @forelse($apartment->services as $service)
                            {{$service->name}} {{$loop->last ? '' : '-'}}
                            @empty
                            -
                            @endforelse
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-12 actions">
                        <h3>Azioni</h3>
                        <a id="details-button" class="act-butt tbl lg" href="{{ route('admin.apartments.show', ['apartment' => $apartment->id])}}"><img src="https://image.flaticon.com/icons/svg/751/751381.svg"></a>
                        <a class="act-butt tbl lg" href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id])}}"><img src="https://image.flaticon.com/icons/svg/526/526127.svg"></a>
                        <form method="post" action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id])}}">
                            @csrf
                            @method('DELETE')
                            <div class="del-btn">
                                <button id="send-form"><img class="act-butt tbl lg" src="https://image.flaticon.com/icons/svg/1345/1345925.svg"></button>
                            </div>
                        </form>
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
            
            {{-- <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titolo Descrittivo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Numero Camere</th>
                        <th scope="col">Numero Ospiti</th>
                        <th scope="col">Numero Bagni</th>
                        <th scope="col">Metri Quadrati</th>
                        <th scope="col">Serivizi</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($apartments as $apartment)
                    <tr>
                        <th scope="row">{{ $apartment->id }}</th>
                        <td>{{ $apartment->sommary_title }}</td>
                        <td>{{ $apartment->slug }}</td>
                        <td class="text-truncate" style="max-width: 200px;">{{ $apartment->description }}</td>
                        <td>{{ $apartment->room_number }}</td>
                        <td>{{ $apartment->guest_number }}</td>
                        <td>{{ $apartment->wc_number}}</td>
                        <td>{{ $apartment->square_meters}}</td>
                        <td>
                            @forelse($apartment->services as $service)
                            {{$service->name}} {{$loop->last ? '' : '-'}}
                            @empty
                            -
                            @endforelse
                        </td>
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-primary mr-1" href="{{ route('admin.apartments.show', ['apartment' => $apartment->id])}}">Details</a>
                            <a class="btn btn-secondary mr-1" href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id])}}">Update</a>
                            @if (isset(($apartment->ads)->last()->ad_end))
                                @php  
                                    $end_ad = (($apartment->ads)->last()->ad_end)
                                @endphp
                            @else
                                {{ $end_ad = NULL }}
                            @endif

                            @if (!isset($end_ad) || $today > $end_ad)
                                <a class="btn btn-info" href="{{ route('admin.ad', ['apartment' => $apartment->id]) }}">Sponsorizza</a>
                            @else
                                <a class="btn btn-success">Sponsorizzato!</a>
                            @endif
                            <form method="post" action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id])}}">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>non ci sono Post</td>
                    </tr>
                    @endforelse
                </tbody>
            </table> --}}
        </div>
    </div>
</div>
@endsection
