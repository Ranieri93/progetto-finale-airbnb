require('./bootstrap');

var $ = require('jquery');

$( document ).ready(function() {



    $('#btn-create-submit').click(function (event) {
        var myapikey = 'bFSI4kMwJMdayytGsYArg3lzUM1wsCjG';
        var addressQuery = $('#address').val();
        event.preventDefault();

        AllGeoCord = [];
        getMyGeoCord(addressQuery, myapikey);
        console.log(AllGeoCord);
        for (var i = 0; i < AllGeoCord.length; i++) {
            var singleCord = AllGeoCord[i];
            console.log(singleCord);
        }
        // sendMydata(AllGeoCord);

        // $(this).closest('form').submit();

    });

    function sendMydata (coord) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url': '/admin/apartments',
            'method' : 'POST',
            'data': coord,
            'success': function(data) {
                console.log(data);
        }
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

