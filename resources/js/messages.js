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
    // $('#myElement').click(function() {
    //     // leggo il testo inserito dall'utente
    //     var new_message_email = ($('#email').val()).trim();
    //     var new_message_text = ($('#text_message').val()).trim();
    //     var id_apartment = ($('#apartment_id').val());
    //     if(new_message_email.length > 0 && new_message_text.length > 0) {
    //         // resetto l'input
    //         $('#email').val('');
    //         $('#text_message').val('');
    //
    //         $.ajax({
    //         'url': 'admin/search/show' + id_apartment
    //         'method': 'POST',
    //         'dataType': "json",
    //         'data': {
    //             'email': new_message_email,
    //             'text': new_message_text
    //
    //         },
    //         'success': function(data) {
    //             alert('salvato');
    //         },
    //         'error': function() {
    //             alert('errore');
    //         }
    //         });
    //     } else {
    //         alert('Inserisci email e testo!');
    //     }
    //
    // });

})
