@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3" >
                <h1>Inserisci un nuovo Appartamento</h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" id="create-form-apartment" action="{{route('admin.apartments.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="sommary_title">Titolo Descrittivo</label>
                        <input type="text" class="form-control"
                               name="sommary_title" id="sommary_title"  placeholder="Scrivi qui il titolo descrittivo" value="{{old('sommary_title')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Testo Articolo</label>
                        <textarea name="description" id="description" cols="80" >{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="room_number">Numero Stanze</label>
                        <input type="text" class="form-control"
                               name="room_number" id="room_number" placeholder="Scrivi qui il numero delle stanze" value="{{old('room_number')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="guest_number">Numero Ospiti</label>
                        <input type="text" class="form-control"
                               name="guest_number" id="guest_number" placeholder="Scrivi qui il numero degli ospiti" value="{{old('guest_number')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="wc_number">Numero Bagni</label>
                        <input type="text" class="form-control"
                               name="wc_number" id="wc_number" placeholder="Scrivi qui il numero dei bagni" value="{{old('wc_number')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="square_meters">Metri Quadrati</label>
                        <input type="text" class="form-control"
                               name="square_meters" id="square_meters" placeholder="Scrivi qui la metratura" value="{{old('square_meters')}}" required>
                    </div>

                    @if($services->count())
                        <div class="form-group">
                            @foreach($services as $service)
                                <label for="service_{{ $service->id }}">
                                    <input type="checkbox" id="service_{{ $service->id }}" name="service_id[]" value="{{$service->id}}"
                                        {{in_array('$service->id', old('service_id', array())) ? 'checked' : '' }}>
                                    {{$service->name}}
                                </label>
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="address">Inserisci la città e l'indirizzo</label>
                        <input type="text" class="form-control"
                               name="address" id="address" placeholder="Scrivi qui l'indirizzo" value="{{old('address')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="cover_image">Immagine di copertina</label>
                        <input type="file" class="form-control-file" id="cover_image" name="cover_image">
                    </div>
                    <button id="btn-create-submit" type="submit" class="btn btn-primary">Inserisci</button>
                </form>
            </div>
        </div>
    </div>
@endsection
