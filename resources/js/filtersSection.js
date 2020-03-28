require('./bootstrap');

var $ = require('jquery');

$(document).ready(function() {
    $(".filter-chev").click(function(){
        if($(".filters").hasClass('open-an')) {
            $(".filters").removeClass('open-an');
            $(".filter-chev .open-bt").removeClass('no-active-open');
            $(".filter-chev .close-bt").removeClass('active-close');
        } else {
            $(".filters").addClass('open-an');
            $(".filter-chev .open-bt").addClass('no-active-open');
            $(".filter-chev .close-bt").addClass('active-close');
        }
    });

});