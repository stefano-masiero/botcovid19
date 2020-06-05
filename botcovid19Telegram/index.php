<?php
session_start(); 

require_once("../Datamodel/regione.php");
require_once("../Datamodel/notizia.php");



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

        $tastieraBenvenuto = '["Contagi ðŸ“ˆ","Notizie ðŸ—ž"],["Help"]';

        sendMessage($chatId, "Benvenuto in questo bot, <b>" . $nameUtente . "</b> ", $tastieraBenvenuto);

        sendPhoto($chatId, "https://www.botcovid19.it/img/startCovid19-min.jpg");
        break;

    case "Back":

        $tastieraBenvenuto = '["Contagi ðŸ“ˆ","Notizie ðŸ—ž"],["Help"]';

        sendMessage($chatId, "Menu Principale", $tastieraBenvenuto);

        break;

    //Invio della foto del profilo
    case "/img":

        sendPhoto($chatId, sendPhoto($chatId, "https://www.botcovid19.it/img/fotoProfilo.jpg"));

        break;
    
    //Comando che invia la lista dei possibili comandi
    case "/help":

    case "Help":

        sendMessage($chatId, "Comandi disponibili:\n
        <b>/start</b> per vedere le opzioni 
        disponibili;\n
        <b>/img</b> per ricevere la foto del profilo;\n
        <b>/contagi</b> per vedere i dati relativi
        nella zona del mondo a tua scelta;\n
        <b>/notizie</b> per vedere le notizie
        relative alla zona del mondo a tua 
        scelta;\n");

        break;

    case "/contagi":

    case "Contagi ðŸ“ˆ":
        $tastieraBenvenuto = '["ðŸ“‰ Europa ðŸ“ˆ","ðŸ“‰ America ðŸ“ˆ"],["ðŸ“‰ Asia ðŸ“ˆ", "ðŸ“‰ Africa ðŸ“ˆ"],["ðŸ“‰ Oceania ðŸ“ˆ", "ðŸ“‰ Tutto il mondo ðŸ“ˆ"],["ðŸ“‰ Italia ðŸ“ˆ"],["Back"]';
        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);
        break;
        
    case "/notizie":   
    case "Notizie ðŸ—ž":
            $tastieraBenvenuto = '["ðŸ—ž Europa ðŸ—ž","ðŸ—ž America ðŸ—ž"],["ðŸ—ž Asia ðŸ—ž", "ðŸ—ž Africa ðŸ—ž"],["ðŸ—ž Oceania ðŸ—ž", "ðŸ—ž Tutto il mondo ðŸ—ž"],["Back"]';
        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);
        break;

    //Parte della selezione del continente
    case "ðŸ“‰ America ðŸ“ˆ":
        $tastieraBenvenuto = '["ðŸ“‰ Nord America ðŸ“ˆ","ðŸ“‰ Sud America ðŸ“ˆ"],["Back"]';
        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);
        break;

    case "ðŸ“‰ Nord America ðŸ“ˆ":
        $ContScelto = 'America Nord';
        invioDatiContagi($ContScelto);
        break;

    case "ðŸ“‰ Sud America ðŸ“ˆ":
        $ContScelto = 'America Sud';
        invioDatiContagi($ContScelto);
        break;

    case "ðŸ“‰ Europa ðŸ“ˆ":
        $ContScelto = 'Europa';
        invioDatiContagi($ContScelto);
        break;

    case "ðŸ“‰ Asia ðŸ“ˆ":
        $ContScelto = 'Asia';
        invioDatiContagi($ContScelto);
        break;

    case "ðŸ“‰ Africa ðŸ“ˆ":
        $ContScelto = 'Africa';
        invioDatiContagi($ContScelto);
        break;

    case "ðŸ“‰ Oceania ðŸ“ˆ":
        $ContScelto = 'Oceania';
        invioDatiContagi($ContScelto);
        break;
        
    case "ðŸ“‰ Italia ðŸ“ˆ":
        $italia = 'Italy';
        invioDatiContagiRegione($italia);
        break;
        
    case "ðŸ“‰ Tutto il mondo ðŸ“ˆ":
        invioDatiContagi();
        break;
    
    /*case "ðŸ“‰Cerca regioneðŸ“ˆ":
        $tastieraBenvenuto = '["Back"]';
        sendMessage($chatId, "Lavori in corso ðŸš§", $tastieraBenvenuto);
        sendMessage($chatId, "Scrivi il nome di una regione (in inglese)", $tastieraBenvenuto);
        //invioDatiContagiRegione($regioneScelta);
        break;*/
        
    /******************************************************************************** */
        
   case "ðŸ—ž America ðŸ—ž":
            invioNotiziePerContinente("America");
        break;

    case "ðŸ—ž Europa ðŸ—ž":
        $ContScelto = 'Europa';
            invioNotiziePerContinente($ContScelto);
        break;

    case "ðŸ—ž Asia ðŸ—ž":
         $ContScelto = 'Asia';
            invioNotiziePerContinente($ContScelto);
        break;

    case "ðŸ—ž Africa ðŸ—ž":
        $ContScelto = 'Africa';
            invioNotiziePerContinente($ContScelto);
        break;

    case "ðŸ—ž Oceania ðŸ—ž":
        $ContScelto = 'Oceania';
            invioNotiziePerContinente($ContScelto);
        break;
        
    case "ðŸ—ž Tutto il mondo ðŸ—ž":
            invioNotiziePerContinente();
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

//funzione per prelevare i dati del continente scelto
function invioDatiContagi($contScelto=null)
{
    $continenti = Regioni::getContagiFromContinenteObj($contScelto);
    
    foreach($continenti as $continente){
        sendMessage($GLOBALS[chatId], "<b>Nome nazione:</b> " . "<i>" . $continente->getNomeNazione() . "</i>\n" . 
                            "<b>Numero contagi totali:</b> " . "<i>" . $continente->getNContagiTot() . "</i>\n" .
                            "<b>Numero morti:</b> " . "<i>" . $continente->getNMorti() . "</i>\n" .
                            "<b>Numero guariti:</b> " . "<i>" . $continente->getNGuariti() . "</i>\n" .
                            "<b>Numero infetti attivi:</b> " . "<i>" . $continente->getNInfettiAttivi() . "</i>\n" .
                            "<b>Numero nuovi casi:</b> " . "<i>" . $continente->getNNuoviCasi() . "</i>\n" .
                            "<b>Numero test effettuati:</b> " . "<i>" . $continente->getNTest() . "</i>\n"
                        ); 
        }
}

//funzione per prelevare i dati di una singola regione
function invioDatiContagiRegione($regioneScelta)
{
    $regione = Regioni::getContagiFromContinenteSingoloObj($regioneScelta);
    
    foreach($regione as $regioni){
        sendMessage($GLOBALS[chatId], "<b>Nome nazione:</b> " . "<i>" . $regioni->getNomeRegione() . "</i>\n" . 
                            "<b>Numero contagi totali:</b> " . "<i>" . $regioni->getNContagiTot() . "</i>\n" .
                            "<b>Numero morti:</b> " . "<i>" . $regioni->getNMorti() . "</i>\n" .
                            "<b>Numero guariti:</b> " . "<i>" . $regioni->getNGuariti() . "</i>\n" .
                            "<b>Numero infetti attivi:</b> " . "<i>" . $regioni->getNInfettiAttivi() . "</i>\n" .
                            "<b>Numero nuovi casi:</b> " . "<i>" . $regioni->getNNuoviCasi() . "</i>\n" .
                            "<b>Numero test effettuati:</b> " . "<i>" . $regioni->getNTest() . "</i>\n"
                        ); 
    }
}

//funzione per prelevare le notizie dei continenti
function invioNotiziePerContinente($continenteScelto=null)
{
    $notizie = Notizie::getNotizieFromContinenteObj($continenteScelto);
    
    foreach($notizie as $notizia){
        sendPhoto($GLOBALS[chatId],$notizia->getImmagine());
        sendMessage($GLOBALS[chatId], "<b>Titolo:</b> " . "<i>" . $notizia->getTitolo() . "</i>\n" . 
                            "<b>Descrizione:</b> " . "<i>" . $notizia->getDescrizione() . "</i>\n" .
                            "<b>Link:</b> " . "<i>" . $notizia->getLink() . "</i>\n" .
                            "<b>Data:</b> " . "<i>" . $notizia->getData() . "</i>\n"
                        ); 
    }
}
