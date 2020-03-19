var $ = require('jquery');

$(document).ready(function() {
    var myapikey = 'bFSI4kMwJMdayytGsYArg3lzUM1wsCjG';

    // evento che controlla la conversione dell'indirizzo nella create
    $('#btn-create-submit').click(function (event) {
        var addressQuery = $('#address').val();
        event.preventDefault();

        getMyGeoCord(addressQuery, myapikey, '#create-form-apartment', 1);
    });

    // evento che controlla la conversione dell'indirizzo nella update
    $('#btn-update-submit').click(function (event) {
        var addressQuery = $('#address-edit').val();
        event.preventDefault();

        getMyGeoCord(addressQuery, myapikey, '#update-form-apartment', 1);
    });

    //evento che gestisce la ricerca avanzata
    $("#search-addresses-form-admin button").click(function(event) {
        event.preventDefault();
        var addressQuery = $('#input-search-address-admin').val();
        console.log(addressQuery);
        getMyGeoCord(addressQuery, myapikey, "#search-addresses-form-admin",1);
    });

    $('#input-search-address-admin').keyup(function () {
        $("#listAddresses").empty();

        var addressQuery = $('#input-search-address-admin').val();
        if ((addressQuery).length >= 3) {
            autoSearch(addressQuery,myapikey,4)
        }

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
                alert('error prima call');
            },
        });
    }

    function autoSearch (query,apikey,limitResults) {
        $.ajax({
            "url": "https://api.tomtom.com/search/2/geocode/" + query + '.json?key=' + apikey,
            "method": "GET",
            "data": {
                "limit": limitResults,
            },
            "success": function (data) {
                console.log(data);
                if (data.results.length !== 0){
                    $("#listAddresses").append(
                        '<ul class="dropdown-menu" style="display:block; position:absolute;">'
                    );
                        for (var i = 0; i < data.results.length ; i++) {
                            var singleAddress = data.results[i].address.freeformAddress;
                            $("#listAddresses ul").append("<li class='listAuto'>" + singleAddress + "</li>");
                        }
                    $("#listAddresses").append("</ul>");
                }
            },
            'error': function(){
                alert('error seconda call');
            },
        });
    }
});
