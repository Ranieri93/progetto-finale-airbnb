$(document).ready(function(){
    $(document).on("click", ".messaggio", function(){
        $(this).find(".testo_mess").toggleClass("active");
        $(this).find(".immagine_mess").toggleClass("active");
    // if ($(this).children(".testo_mess").toggleClass("active")) {
    //     $(".testo_mess").hide();
    // } else {
    //     $(".testo_mess").hide();
    //     $(this).children(".testo_mess").show();
    // }
} )
})
