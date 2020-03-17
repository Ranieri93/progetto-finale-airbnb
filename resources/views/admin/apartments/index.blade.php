@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h1>Tutti i tuoi appartamenti</h1>
            </div>
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
