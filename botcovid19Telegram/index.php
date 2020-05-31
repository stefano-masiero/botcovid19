<?php
//modifica del 24/05/2020 22:14 

require_once("../Datamodel/regione.php");


$botToken = "1210512979:AAE9sTum2aO82tONl0npYP-5PhXS-iIruN0";

$website = "https://api.telegram.org/bot" . $botToken;



$update = file_get_contents('php://input');

$update = json_decode($update, TRUE);



$chatId = $update['message']['from']['id'];

$text = $update['message']['text'];

$nameUtente = $update['message']['from']['username'];


//switch per i vari comandi

switch ($text) {

    case "/start":

        $tastieraBenvenuto = '["Contagi","Notizie"],["Help"]';

        sendMessage($chatId, "Benvenuto in questo bot, <b>" . $nameUtente . "</b> ", $tastieraBenvenuto);

        sendPhoto($chatId, "https://www.botcovid19.it/img/startCovid19-min.jpg");

        break;

    case "Back":

        $tastieraBenvenuto = '["Contagi","Notizie"],["Help"]';

        sendMessage($chatId, "Menu Principale", $tastieraBenvenuto);

        break;

    //Invio della foto del profilo
    case "/img":

        sendPhoto($chatId, sendPhoto($chatId, "https://www.botcovid19.it/img/fotoProfilo.jpg"));

        break;
    
    //Comando che invia la lista dei possibili comandi
    case "/help":

    case "Help":

        sendMessage($chatId, "Comandi disponibili:

        <b>/start</b> per vedere le opzioni 

        disponibili;

        <b>/img</b> per ricevere la foto del profilo;

        <b>/contagi</b> per vedere i dati relativi

        nella zona del mondo a tua scelta;

        <b>/notizie</b> per vedere le notizie

        relative alla zona del mondo a tua 

        scelta;");

        break;

    case "/contagi":

    case "Contagi":

        $tastieraBenvenuto = '["Europa","America"],["Asia", "Africa"],["Oceania", "Tutto il mondo"],["Back"]';

        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);

        break;

        /* case "/notizie":

    case "Notizie":

        $tastieraBenvenuto = '["Europa","America"],["Asia", "Africa"],["Oceania", "Tutto il mondo"],["Back"]';

        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);

        break;*/

    //Parte della selezione del continente
    case "America":

        $tastieraBenvenuto = '["Nord America","Sud America"],["Back"]';

        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);
        break;

    case "Nord America":
        $ContScelto = 'America Nord';
        invioDatiContagi($ContScelto);
        break;

    case "Sud America":
        $ContScelto = 'America Sud';
        invioDatiContagi($ContScelto);
        break;

    case "Europa":
        $ContScelto = 'Europa';
        invioDatiContagi($ContScelto);
        break;

    case "Asia":
        $ContScelto = 'Asia';
        invioDatiContagi($ContScelto);
        break;

    case "Africa":
        $ContScelto = 'Africa';
        invioDatiContagi($ContScelto);
        break;

    case "Oceania":
        $ContScelto = 'Oceania';
        invioDatiContagi($ContScelto);
        break;
        
    case "Tutto il mondo":
        invioDatiContagi();
        break;
    case "/prova":
            sendMessage($chatId, 'ciao mondo crudele');
        break;

    default:

        sendMessage($chatId, "Comando non presente, /help per la lista comandi ");
}


//funzione per l'invio di un messaggio
function sendMessage($chatId, $text, $tastiera = null)
{
    if (isset($tastiera)) {
        $tastierino = '&reply_markup={"keyboard":[' . $tastiera . '],"resize_keyboard":true}';
    }
    $mess = $GLOBALS[website] . "/sendMessage?chat_id=$chatId&parse_mode=HTML&text=" . urlencode($text) . $tastierino;
    file_get_contents($mess);
}

//funzione per l'invio di una foto
function sendPhoto($chatId, $photo)
{
    $img = $GLOBALS[website] . "/sendPhoto?chat_id=" . $chatId . "&photo=" . $photo;
    file_get_contents($img);
}

//funzione per prelevare i dati dal database
function invioDatiContagi($contScelto=null)
{
    $continenti = Regioni::getContagiFromContinenteObj($contScelto);
    
    foreach($continenti as $continente){
        sendMessage($GLOBALS[chatId], "<b>Nome nazione:</b> " . "<i>" . $continente->getNomeNazione() . "</i>" . 
                            " <b>Numero contagi totali:</b> " . "<i>" . $continente->getNContagiTot() . "</i>" .
                            " <b>Numero morti:</b> " . "<i>" . $continente->getNMorti() . "</i>" .
                            " <b>Numero guariti:</b> " . "<i>" . $continente->getNGuariti() . "</i>" .
                            " <b>Numero infetti attivi:</b> " . "<i>" . $continente->getNInfettiAttivi() . "</i>" .
                            " <b>Numero nuovi casi:</b> " . "<i>" . $continente->getNNuoviCasi() . "</i>" .
                            " <b>Numero test effettuati:</b> " . "<i>" . $continente->getNTest() . "</i>"
                        ); 
        }
}