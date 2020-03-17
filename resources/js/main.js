require('./bootstrap');

var $ = require('jquery');

function confirmed() {
    document.write('<h1>ciao</h1>');
    // location.href = '/admin';
}
// $(document).ready(function(event) {
// '.prova2'.onclick = function(){
//     console.log('ciaoaaaaaaaaaaaaa');
// }
// });
var clicked = document.getElementsByClassName('.prova2').onclick = function() {};
if (clicked('.prova2') && '.prova'.length == 0) {
    console.log('errore');
}
// else {
//     document.write('<br><br><br><br><br><br><br><br><br><br><br><br><br><h1><center>Il tuo messaggio è stato inviato con successo, ti risponderemo il prima possibile!</center></h1><br><br><br><br><br><br><br><br><br><br><br>');
//     document.write("Redirect in corso… si prega di attendere qualche istante…");
//     setTimeout(confirmed(), 5000);
//     // clearTimeout();
// }
// '.prova2'.onclick == false
