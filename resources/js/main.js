require('./bootstrap');

var $ = require('jquery');

function doRedirect() {
    document.write('<h1>ciao</h1>');
    // location.href = '/admin';
}


// $(document).ready(function(event) {
if ('.prova'.length == 0 && '.prova'.onclick = true) {
    console.log('errore');
} else {
    document.write('<br><br><br><br><br><br><br><br><br><br><br><br><br><h1><center>Il tuo messaggio è stato inviato con successo, ti risponderemo il prima possibile!</center></h1><br><br><br><br><br><br><br><br><br><br><br>');
    var warning = document.write("Redirect in corso… si prega di attendere qualche istante…");
    setTimeout(doRedirect, 3000);

    // clearTimeout();
}
}
// });
