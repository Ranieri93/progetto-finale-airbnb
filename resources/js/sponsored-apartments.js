require('./bootstrap');

var $ = require('jquery');

$(document).ready(function() {
    $(".sponsored-apartment").mouseenter(function() {
        $(this).children(".sponsored-apartment-img").addClass('hover-img');
        $(this).children(".sponsored-apartment-body").addClass('active');
    });

    $(".sponsored-apartment").mouseleave(function() {
        $(this).children(".sponsored-apartment-img").removeClass('hover-img');
        $(this).children(".sponsored-apartment-body").removeClass('active');
    });
});
