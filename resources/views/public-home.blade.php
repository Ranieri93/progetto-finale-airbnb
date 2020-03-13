
    @extends('layouts.public')
    @section('content')
    <main>
        <div class="form">
            <h1>Prenota allogi e attività unici.</h1>
            <div class="where mb-3">
                <h4>DOVE</h4>
                <input type="text" class="everywhere" id="" name="query" placeholder="Ovunque">
            </div>
            <div class="where mb-3">
                <h4>OSPITI</h4>
                <button id="" class="guest_select mb-3" type="button" aria-haspopup="true" aria-expanded="false">
                    <div class="guest">Ospiti</div>
                    <div class="guest_select_triangle">
                        <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height:12px;width:12px;display:block;fill:currentColor">
                            <path d="m16.29 4.3a1 1 0 1 1 1.41 1.42l-8 8a1 1 0 0 1 -1.41 0l-8-8a1 1 0 1 1 1.41-1.42l7.29 7.29z" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                </button>
                <button type="button" class="btn btn-danger find">Cerca</button>
            </div>
        </div>
    </main>
@endsection
