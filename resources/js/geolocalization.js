var $ = require('jquery');

$(document).ready(function() {

    // evento che controlla la conversione dell'indirizzo nella create
    $('#btn-create-submit').click(function (event) {
        var myapikey = 'bFSI4kMwJMdayytGsYArg3lzUM1wsCjG';
        var addressQuery = $('#address').val();
        console.log(addressQuery);
        event.preventDefault();

        getMyGeoCord(addressQuery, myapikey, '#create-form-apartment', 1);
    });

    // evento che controlla la conversione dell'indirizzo nella update
    $('#btn-update-submit').click(function (event) {
        var myapikey = 'bFSI4kMwJMdayytGsYArg3lzUM1wsCjG';
        var addressQuery = $('#address-edit').val();
        event.preventDefault();

        getMyGeoCord(addressQuery, myapikey, '#update-form-apartment', 1);
    });

    // funzione con chiamata ajax all'api di tomtom
    function getMyGeoCord ( query, apikey, idSubmitForm, limitResults) {
        $.ajax ({
            'url':'https://api.tomtom.com/search/2/geocode/'+ query + '.json?key=' + apikey,
            'method': 'GET',
            'data': {
                'limit': limitResults,
            },
            'success': function(data) {
                var latitude = data.results[0].position.lat;
                var longitude = data.results[0].position.lon;

                $(idSubmitForm).append(
                    "<input type='hidden' name='latitude' value='" + latitude + "'/>",
                    "<input type='hidden' name='longitude' value='" + longitude + "'/>",
                );
                $(idSubmitForm).append(
                    "<input type='submit' id='submit-append-inputs' style='display:none;'></input>"
                );
                $('#submit-append-inputs').click();

            },
            'error': function(){
                alert('error');
            },
        });
    }
});
