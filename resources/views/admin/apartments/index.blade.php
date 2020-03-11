@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1 class="text-uppercase">Tutti i tuoi appartamenti</h1>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titolo Descrittivo</th>
                        <th scope="col">Numero Camere</th>
                        <th scope="col">Numero Ospiti</th>
                        <th scope="col">Numero Bagni</th>
                        <th scope="col">Metri Quadrati</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Tags</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($apartments as $apartment)
                        <tr>
                            <th scope="row">{{ $apartment->id }}</th>
                            <td>{{ $apartment->sommary_title }}</td>
                            <td>{{ $apartment->room_number }}</td>
                            <td>{{ $apartment->guest_number }}</td>
                            <td>{{ $apartment->wc_number}}</td>
                            <td>{{ $apartment->square_meters}}</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-secondary" {{--href="{{ route('admin.posts.show', ['post' => $post->id])}}--}}">Details</a>
                                <a class="btn btn-warning" {{--href="{{ route('admin.posts.edit', ['post' => $post->id])}}--}}">Update</a>
                                <form method="post" {{--action="{{ route('admin.posts.destroy', ['post' => $post->id])}}--}}">
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
