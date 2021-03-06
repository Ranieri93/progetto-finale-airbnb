@extends('layouts.admin')
@section('content')
<script>
    function ConfermaOperazione() {
        var confirm = window.confirm("Il tuo appartamento è stato aggiunto con successo ! clicca 'OK' per proseguire");
        return confirm;
    }
</script>
<script>
    function validateForm() {
        var a = document.forms["Form"]["sommary_title"].value;
        var b = document.forms["Form"]["description"].value;
        var c = document.forms["Form"]["room_number"].value;
        var d = document.forms["Form"]["guest_number"].value;
        var e = document.forms["Form"]["wc_number"].value;
        var f = document.forms["Form"]["square_meters"].value;
        var g = document.forms["Form"]["address"].value;
        if (a == "" || a == null || b == "" || b == null || isNaN(c) ||
            c == "" || c == null || d == "" || d == null || isNaN(d) ||
            e == "" || e == null || f == "" || f == null || isNaN(e) ||
            g == "" || g == null || isNaN(f)) {
            alert("Controlla i tuoi dati");
            return false;
        } else {
            ConfermaOperazione();
        }
    }
</script>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-6 offset-3">
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
            <form name="Form" onsubmit="return validateForm()" method="post" id="create-form-apartment" action="{{route('admin.apartments.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="sommary_title">Titolo Descrittivo</label>
                    <input type="text" class="form-control" name="sommary_title" id="sommary_title" placeholder="Scrivi qui il titolo descrittivo" value="{{old('sommary_title')}}" required>
                </div>
                <div class="form-group">
                    <label for="description">Testo Articolo</label>
                    <textarea name="description" id="description" class="description" cols="80" required>{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="room_number">Numero Stanze</label>
                    <input type="number" min="1" max="8" class="form-control" name="room_number" id="room_number" placeholder="Inserisci qui il numero delle stanze" value="{{old('room_number')}}" required>
                </div>
                <div class="form-group">
                    <label for="guest_number">Numero Ospiti</label>
                    <input type="number" min="1" max="8" class="form-control" name="guest_number" id="guest_number" placeholder="Inserisci qui il numero degli ospiti" value="{{old('guest_number')}}" required>
                </div>
                <div class="form-group">
                    <label for="wc_number">Numero Bagni</label>
                    <input type="number" min="1" max="5" class="form-control" name="wc_number" id="wc_number" placeholder="Inserisci qui il numero dei bagni" value="{{old('wc_number')}}" required>
                </div>
                <div class="form-group">
                    <label for="square_meters">Metri Quadrati</label>
                    <input type="number" min="30" max="250" class="form-control" name="square_meters" id="square_meters" placeholder="Inserisci qui la metratura" value="{{old('square_meters')}}" required>
                </div>

                @if($services->count())
                <div class="form-group">
                    @foreach($services as $service)
                    <label for="service_{{ $service->id }}">
                        <input type="checkbox" id="service_{{ $service->id }}" name="service_id[]" value="{{$service->id}}" {{in_array('$service->id', old('service_id', array())) ? 'checked' : '' }}>
                        {{$service->name}}
                    </label>
                    @endforeach
                </div>
                @endif

                <div class="form-group">
                    <label for="address">Inserisci la città e l'indirizzo</label>
                    <input type="text" class="form-control" name="address" id="address" value="Scrivi qui l'indirizzo" required>
                    <div id="listAddresses"></div>
                </div>

                <div class="form-group">
                    <label for="cover_image">Immagine di copertina</label>
                    <input type="file" class="form-control-file" id="cover_image" name="cover_image" required>
                </div>
                <button id="btn-create-submit" type="submit" class="btn btn-primary">Inserisci</button>
            </form>
        </div>
    </div>
</div>
@include('layouts.partials.footer')
@endsection
