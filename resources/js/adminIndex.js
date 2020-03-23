require('./bootstrap');

var $ = require('jquery');

$(document).ready(function() {
    $(document).on("click", ".apartment-card", function() {
        $(this).find("#details-button").triggerHandler('click'); //trigger non funzionante
    });

    $(".del-btn").click(function(){
        $('#send-form').submit();
    });
});