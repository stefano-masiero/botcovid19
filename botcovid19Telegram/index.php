<?php
//modifica del 24/05/2020 22:14 
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
        sendPhoto($chatId,"https://www.balcanicaucaso.org/var/obc/storage/images/aree/croazia/croazia-conseguenze-economiche-da-covid-19-201468/1963446-1-ita-IT/Croazia-conseguenze-economiche-da-Covid-19.jpg");
    break;
    case "Back":
        $tastieraBenvenuto = '["Contagi","Notizie"],["Help"]';
        sendMessage($chatId, "Menu Principale", $tastieraBenvenuto);
    break;
    case "/img":
        sendPhoto($chatId,"https://www.bitmat.it/wp-content/uploads/2020/03/covid-696x434.jpg");
    break;
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
        $tastieraBenvenuto = '["Europa","America"],["Asia", "Africa"],["Oceania", "Antartide"],["Tutto il mondo", "Back"]';
        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);
    break;
    case "/notizie":
    case "Notizie":
        $tastieraBenvenuto = '["Europa","America"],["Asia", "Africa"],["Oceania", "Tutto il mondo"],["Back"]';
        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);
    break;
    case "America":
        $tastieraBenvenuto = '["Nord America","Sud America"],["Back"]';
        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);
    default:
         sendMessage($chatId, "Comando non presente, /help per la lista comandi ");
}


//funzione per l'invio di un messaggio di testo
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
    $img = $GLOBALS[website]."/sendPhoto?chat_id=".$chatId."&photo=".$photo;
    file_get_contents($img);
}


