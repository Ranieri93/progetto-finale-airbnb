@extends('layouts.admin')
@section('content')
<div class="container">
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
            <table class="table table-striped">
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
                                <a class="btn btn-info">Sponsorizzato!</a>
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
            </table>
        </div>
    </div>
</div>
@endsection
