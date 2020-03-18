require('./bootstrap');

var $ = require('jquery');

function ConfermaOperazione() {
    var richiesta = window.confirm("Il tuo messaggio è stato inviato con successo, ti risponderemo il prima possibile! clicca 'OK' per proseguire");
    return richiesta;
}

var elementIsClicked = false;

function clickHandler() {
    elementIsClicked = true;
}

var element = document.getElementById('myElement');
document.addEventListener('click', clickHandler);

function isElementClicked() {
    console.log(elementIsClicked ? ConfermaOperazione() : 'NOT');
}

if ('.prova'.length == 0) {
    console.log('errore');
} else {
    isElementClicked('myElement');
    // setInterval(isElementClicked, 2000);
}
