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

    case "Contagi":
        $tastieraBenvenuto = '["Europa","America"],["Asia", "Africa"],["Oceania", "Tutto il mondo"],["Italia","Cerca una regione"],["Back"]';
        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);
         sendMessage($chatId,$_SESSION['lastScelta']);
        break;
        
    case "/notizie":   
    case "Notizie":
            $tastieraBenvenuto = '["Europa","America"],["Asia", "Africa"],["Oceania", "Tutto il mondo"],["Back"]';
        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);
        break;

    //Parte della selezione del continente
    case "America":
        if($last_scelta=="Contagi"){
        $tastieraBenvenuto = '["Nord America","Sud America"],["Back"]';
        sendMessage($chatId, "Seleziona il continente", $tastieraBenvenuto);
        }
        else{
            invioNotiziePerContinente("America");
        }
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
        if($_SESSION['lastScelta']=="Contagi"){
        invioDatiContagi($ContScelto);
        sendMessage($chatId,$_SESSION['lastScelta']);
        }else{
            invioNotiziePerContinente($ContScelto);
            sendMessage($chatId,$_SESSION['lastScelta']);
        }
        break;

    case "Asia":
        $ContScelto = 'Asia';
       if($_SESSION['lastScelta']=="Contagi"){
        invioDatiContagi($ContScelto);
        }else{
            invioNotiziePerContinente($ContScelto);
        }
        break;

    case "Africa":
        $ContScelto = 'Africa';
        if($last_scelta=="Contagi"){
        invioDatiContagi($ContScelto);
        }else{
            invioNotiziePerContinente($ContScelto);
        }
        break;

    case "Oceania":
        $ContScelto = 'Oceania';
        if($last_scelta=="Contagi"){
        invioDatiContagi($ContScelto);
        }else{
            invioNotiziePerContinente($ContScelto);
        }
        break;
        
    case "Italia":
        $italia = 'Italy';
        invioDatiContagiRegione($italia);
        break;
        
    case "Tutto il mondo":
        if($last_scelta=="Contagi"){
        invioDatiContagi();
        }else{
            invioNotiziePerContinente();
        }
        break;
    
    /*case "Cerca una regione":
        $tastieraBenvenuto = '["Back"]';
        sendMessage($chatId, "Scrivi il nome di una regione (in inglese)", $tastieraBenvenuto);
        //invioDatiContagiRegione($regioneScelta);
        break;*/
        

    default:

        sendMessage($chatId, "Comando non presente, /help per la lista comandi ");
}

$_SESSION['lastScelta'] = $text;
print_r($_SESSION['lastScelta']);
var_dump($_SESSION['lastScelta']);


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
                            " <b>Numero contagi totali:</b> " . "<i>" . $continente->getNContagiTot() . "</i>\n" .
                            " <b>Numero morti:</b> " . "<i>" . $continente->getNMorti() . "</i>\n" .
                            " <b>Numero guariti:</b> " . "<i>" . $continente->getNGuariti() . "</i>\n" .
                            " <b>Numero infetti attivi:</b> " . "<i>" . $continente->getNInfettiAttivi() . "</i>\n" .
                            " <b>Numero nuovi casi:</b> " . "<i>" . $continente->getNNuoviCasi() . "</i>\n" .
                            " <b>Numero test effettuati:</b> " . "<i>" . $continente->getNTest() . "</i>\n"
                        ); 
        }
}

//funzione per prelevare i dati di una singola regione
function invioDatiContagiRegione($regioneScelta)
{
    $regione = Regioni::getContagiFromContinenteSingoloObj($regioneScelta);
    
    foreach($regione as $regioni){
        sendMessage($GLOBALS[chatId], "<b>Nome nazione:</b> " . "<i>" . $regioni->getNomeRegione() . "</i>\n" . 
                            " <b>Numero contagi totali:</b> " . "<i>" . $regioni->getNContagiTot() . "</i>\n" .
                            " <b>Numero morti:</b> " . "<i>" . $regioni->getNMorti() . "</i>\n" .
                            " <b>Numero guariti:</b> " . "<i>" . $regioni->getNGuariti() . "</i>\n" .
                            " <b>Numero infetti attivi:</b> " . "<i>" . $regioni->getNInfettiAttivi() . "</i>\n" .
                            " <b>Numero nuovi casi:</b> " . "<i>" . $regioni->getNNuoviCasi() . "</i>\n" .
                            " <b>Numero test effettuati:</b> " . "<i>" . $regioni->getNTest() . "</i>\n"
                        ); 
    }
}

//funzione per prelevare le notizie dei continenti
function invioNotiziePerContinente($continenteScelto)
{
    $notizie = Notizie::getNotizieFromContinenteObj($continenteScelto);
    
    foreach($notizie as $notizia){
        sendPhoto($GLOBALS[chatId],$notizia->getImmagine());
        sendMessage($GLOBALS[chatId], "<b>Titolo:</b> " . "<i>" . $notizia->getTitolo() . "</i>\n" . 
                            " <b>Descrizione:</b> " . "<i>" . $notizia->getDescrizione() . "</i>\n" .
                            " <b>Link:</b> " . "<i>" . $notizia->getLink() . "</i>\n" .
                            " <b>Data:</b> " . "<i>" . $notizia->getData() . "</i>\n"
                        ); 
    }
}