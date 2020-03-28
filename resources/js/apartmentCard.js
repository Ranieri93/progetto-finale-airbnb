require('./bootstrap');

var $ = require('jquery');

$(document).ready(function() {
    var click = false; //Inizializzo varibaile che verifica se una card è cliccata

    $(".prew-apartment-card").mouseenter(function() { //Quando l'utente entra in hover
        if(click == false) { //Se una card non è già cliccata
            $(this).children(".single-apartment-img").addClass('hover-img'); //aggiungo filtri all'immagine
            $(this).children(".single-apartment-body").addClass('active'); //mostro dati appartamento
        }
    });

    $(".prew-apartment-card").mouseleave(function() { //Quando l'utente esce
        $(this).children(".single-apartment-img").removeClass('hover-img') //rimuovo filtri all'immagine;
        $(this).children(".single-apartment-body").removeClass('active'); //rimuovo dati appartamento
    });

    $(".prew-apartment-card").on("touchstart",function(){ //Quando l'utente usa il touch screen
        $(".prew-apartment-card").children(".single-apartment-img").removeClass('hover-img') //rimuovo filtri all'immagine;
        $(".prew-apartment-card").children(".single-apartment-body").removeClass('active'); //rimuovo dati appartamento
        $(".prew-apartment-card").children(".fa-question-circle").removeClass('active'); //Cambio colore al punto interrogativo

        $(this).children(".single-apartment-img").addClass('hover-img'); //aggiungo filtri all'immagine
        $(this).children(".single-apartment-body").addClass('active'); //mostro dati appartamento
        $(this).children("i").addClass('active'); //Cambio colore al punto interrogativo
      });
      
    $(".search-apartment-st").click(function() { //Quando l'utente clicca un appartamento nella sezione ricerca
        if(click == true) { //Se una card è già cliccata
            $(".search-apartment-st").removeClass('flip'); //Rimuovo l'effetto flip
            $(".search-apartment-st").children(".search-apartment-info").removeClass('show-info'); //Nascondo info
            $(".search-apartment-st").children(".search-apartment-img").removeClass('add-filter'); //Rimuovo filtro
            $(this).children(".search-apartment-body").addClass('active'); //Mostro dati base
            $(this).children(".single-apartment-img").addClass('hover-img'); //aggiungo filtri hover all'immagine

            click = false; //Setto variabile a 'non cliccato'

        } else { //Se una card non è cliccata
            $(this).addClass('flip'); //Flip della card cliccata
            $(this).children(".search-apartment-info").addClass('show-info'); //Mostro Info
            $(this).children(".search-apartment-img").addClass('add-filter'); //Mostro filtro
            $(this).children(".search-apartment-body").removeClass('active'); //Nascondo info base

            click = true; //Setto variabile a 'cliccato'
        }
    });
});
