require('./bootstrap');

var $ = require('jquery');

$(document).ready(function() {

    $(".amount-ad").click(function() { //Controllo che l'utente clicchi un'offerta
        $(".spons-button").addClass("allowed").prop('disabled',false); //Se ha cliccato un offerta, permetto di cliccare il button di submit
    });

});