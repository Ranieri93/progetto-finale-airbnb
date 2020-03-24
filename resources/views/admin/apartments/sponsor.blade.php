@extends('layouts.admin')
@section('content')
    <div class="container-fluid sponsor">
        <h1 class="h1-sm">Sponsorizza <br>"{{ $apartment->sommary_title }}"</h1>
        <h1 id="s-large" class="h1-tablet h1-lg">Porta il tuo appartamento <br>"{{ $apartment->sommary_title }}" ad un livello superiore</h1>
       

        <div class="row sm tablet lg">
            <div class="col-md-6 col-sm-12 sponsor-section">
                <form method="post" id="payment-form" action="{{ url('/admin/checkout') }}">
                    @csrf
                    <label for="amount">
                        <h2 class="input-label">Scegli la tua offerta</h2>
                        <div class="input-wrapper amount-wrapper">
                            <input type="radio" id="amount-1" name="amount" value="2.99">
                            <label class="amount-ad" for="amount-1">2.99€ - 24 ore</label>
                            <input type="radio" id="amount-2" name="amount" value="5.99">
                            <label class="amount-ad" for="amount-2">5.99€ - 72 ore</label>
                            <input type="radio" id="amount-3" name="amount" value="9.99">
                            <label class="amount-ad" for="amount-3">9.99€ - 144 ore</label>


                            <input id="apartment_id" type="hidden" value="{{ $apartment->id }}" name="apartment_id">
                            <input id="user_id" type="hidden" value="{{ $apartment->user_id }}" name="user_id">
                            <input id="nonce" name="payment_method_nonce" type="hidden" />
                            <button class="spons-button" type="submit" disabled><span>Acquista Sponsorizzazione</span></button>
                        </div>
                    </label>
                </form>
            </div>
            <div class="col-md-6 col-sm-12 sponsor-section">
                <div class="bt-drop-in-wrapper">
                    <div id="bt-dropin"></div>
                </div>
            </div>
        </div>
        
        <script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.js">></script>
        <script>
            var form = document.querySelector('#payment-form');

            var client_token = '{{ $token }}'; //Recupero token

            braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
            }, function (createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }

                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                    });
                });
            });
        </script>
    </div>
    @include('layouts.partials.footer')
@endsection

