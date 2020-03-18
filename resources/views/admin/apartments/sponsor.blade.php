@extends('layouts.admin')
@section('content')
    <div class="container">
       <h1>Sponsorizza l'appartamento {{ $apartment->sommary_title }}</h1>

        <div class="row">
            <div class="col-6">
                <form method="post" id="payment-form" action="{{ url('/admin/checkout') }}">
                    @csrf
                    <section>
                        <label for="amount">
                            <span class="input-label">Prezzo</span>
                            <div class="input-wrapper amount-wrapper">
                                <select id="amount" name="amount">
                                    <option value="2.99">2.99€ - 24 ore</option>
                                    <option value="5.99">5.99€ - 72 ore</option>
                                    <option value="9.99">9.99€ - 144 ore</option>
                                </select>
                            </div>
                        </label>

                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>
                    </section>

                    <input id="apartment_id" type="hidden" value="{{ $apartment->id }}" name="apartment_id">
                    <input id="user_id" type="hidden" value="{{ $apartment->user_id }}" name="user_id">
                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                    <button class="button" type="submit"><span>Acquista Sponsorizzazione</span></button>
                </form>
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
@endsection

