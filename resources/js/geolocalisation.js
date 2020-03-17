var $ = require('jquery');

$(document).ready(function() {

    $('#btn-create-submit').click(function (event) {
        var myapikey = 'bFSI4kMwJMdayytGsYArg3lzUM1wsCjG';
        var addressQuery = $('#address').val();
        event.preventDefault();

        getMyGeoCord(addressQuery, myapikey, '#create-form-apartment');
    });


    function getMyGeoCord ( query, apikey, idSubmitForm) {
        $.ajax ({
            'url':'https://api.tomtom.com/search/2/geocode/'+ query + '.json?key=' + apikey,
            'method': 'GET',
            'data': {
                'limit':'1',
            },
            'success': function(data) {
                var latitude = data.results[0].position.lat;
                console.log(latitude);

                var longitude = data.results[0].position.lon;
                console.log(longitude);
                $(idSubmitForm).append(
                    "<input type='hidden' name='latitude' value='" + latitude + "'/>",
                    "<input type='hidden' name='longitude' value='" + longitude + "'/>",
                )
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
