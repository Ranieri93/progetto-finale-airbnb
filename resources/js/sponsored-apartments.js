require('./bootstrap');

var $ = require('jquery');

$(document).ready(function() {
    $(".sponsored-apartment").mouseenter(function() { //Quando l'utente entra in hover
        $(this).children(".sponsored-apartment-img").addClass('hover-img'); //aggiungo filtri all'immagine
        $(this).children(".sponsored-apartment-body").addClass('active'); //mostro dati appartamento
    });

    $(".sponsored-apartment").mouseleave(function() { //Quando l'utente esce
        $(this).children(".sponsored-apartment-img").removeClass('hover-img') //rimuovo filtri all'immagine;
        $(this).children(".sponsored-apartment-body").removeClass('active'); //rimuovo dati appartamento
    });

    $(".sponsored-apartment").on("touchstart",function(){ //Quando l'utente usa il touch screen
        $(".sponsored-apartment").children(".sponsored-apartment-img").removeClass('hover-img') //rimuovo filtri all'immagine;
        $(".sponsored-apartment").children(".sponsored-apartment-body").removeClass('active'); //rimuovo dati appartamento
        $(".sponsored-apartment").children(".fa-question-circle").removeClass('active'); //Cambio colore al punto interrogativo

        $(this).children(".sponsored-apartment-img").addClass('hover-img'); //aggiungo filtri all'immagine
        $(this).children(".sponsored-apartment-body").addClass('active'); //mostro dati appartamento
        $(this).children("i").addClass('active'); //Cambio colore al punto interrogativo
      });
});
