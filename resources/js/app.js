require('./bootstrap');

var $ = require('jquery');

$( document ).ready(function() {
    $('#convert-map').click(function () {
        // convert.preventDefault();
        var myapikey = 'bFSI4kMwJMdayytGsYArg3lzUM1wsCjG';
        var addressQuery = $('#address').val();

        AllGeoCord = [];
        getMyGeoCord(addressQuery, myapikey);
        console.log(AllGeoCord);

    });

    $('#btn-create-submit').click(function () {
        
    });

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

