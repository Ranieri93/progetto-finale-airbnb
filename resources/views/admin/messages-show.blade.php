@extends('layouts.admin')

@section('content')
    <div id="mess_title">
        <h2  class="text-center">Ecco i messaggi che hai ricevuto per questo appartamento</h2>
    </div>
    <br>
    <br>
    <div class="container container_messaggi">

        @forelse ($messaggi_appartamento as $messaggio)
            @if ($messaggio->apartment_id == $apartment->id)
                <div class="row messaggio">
                    <div class="media">
                        <form method="post" action="{{ route('admin.message.destroy', [
                            'message' => $messaggio->id,
                            'apartment'=> $apartment->id
                            ])}}">
                            @csrf
                            @method('DELETE')
                            <div class="del-btn">
                                <button><i class="fas fa-trash act-butt tbl lg"></i></button>
                            </div>
                        </form>
                      <img src="https://www.freepngimg.com/thumb/iphone/68607-email-computer-iphone-icons-download-free-image.png" class="align-self-start mr-3 immagine_mess" alt="...">
                      <div class="media-body">
                        <h5 class="mt-0 e">{{$messaggio->email}} <small class="ricevuto">{{$messaggio->created_at}}</small></h5>
                        <p class="testo_mess">{{$messaggio->text_message}}</p>
                      </div>
                    </div>
                </div>
                <hr>
            @endif
        @empty
                <div class="row">
                    <div class="card">
                      <div class="card-header">
                      </div>
                      <div class="card-body">
                        <p class="card-text">Non hai ricevuto messaggi. Se vuoi che il tuo appartamento sia in evidenza rispetto agli altri nei risultati di ricerca, sponsorizzalo!</p>
                      </div>
                    </div>
                </div>
        @endforelse
    </div>

        @include('layouts.partials.footer')
@endsection
