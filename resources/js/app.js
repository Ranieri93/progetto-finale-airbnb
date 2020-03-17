require('./bootstrap');

var $ = require('jquery');

$( document ).ready(function(event) {

    $('#btn-create-submit').click(function () {
        event.preventDefault();
        var myapikey = 'bFSI4kMwJMdayytGsYArg3lzUM1wsCjG';
        var addressQuery = $('#address').val();

        AllGeoCord = [];
        getMyGeoCord(addressQuery, myapikey);
        sendMydata(AllGeoCord);

        $(this).closest('form').submit();


    });

    function sendMydata (array) {
        $.ajax({
            url:'/admin/apartments',
            type: 'POST',
            dataType:'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: 'json',
            data: {
                data: JSON.stringify(array)
            },
            contentType: 'application/json; charset=utf-8',
        });
    }

    function getMyGeoCord ( query, apikey) {
        $.ajax ({
            'url':'https://api.tomtom.com/search/2/geocode/'+ query + '.json?key=' + apikey,
            'method': 'GET',
            'success': function(data) {
                var results = data.results;

                for (var i = 0; i < results.length; i++) {
                    var singleResult = results[i];
                    // console.log(singleResult);
                    var addressResult = singleResult.address;
                    var positionResult = singleResult.position;
                    var latPositionResult = positionResult.lat;
                    var lonPositionResult = positionResult.lon;

                    if (singleResult.type == 'Point Address') {
                        AllGeoCord.push(latPositionResult,lonPositionResult);
                    }
                }
            },
            'error': function(){
                alert('error');
            },
        });
    }



});

