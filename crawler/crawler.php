<?php
require_once('../assets/simple_html_dom.php');
require_once('../Datamodel/notizia.php');
require_once('../Datamodel/regione.php');

class Crawler{

public static function newsCrawler($site,$continente){
    
$html = new simple_html_dom();
$html->load_file($site);

$notizia = new Notizia();
$nrow=0;
foreach($html->find('div.xrnccd article') as $row) {
    $titolo=$row->children(1)->plaintext;
    $descrizione=$row->children(2)->plaintext;
    $link="https://www.news.google.com/".$row->find('a',1)->href;
    $data=$row->children(3)->children(0)->children(3)->plaintext;
    $immagine=$html->find('img.tvs3Id.QwxBBf',$nrow)->src;
    
    $notizia->setAll($titolo, null, $data, $link, $descrizione, $immagine, $continente);
    Notizie::inserisciObj($notizia);
    $nrow++;

}
return;
}


public static function datiContagiItaliaCrawler(){
$site = "https://github.com/pcm-dpc/COVID-19/blob/master/dati-regioni/dpc-covid19-ita-regioni-latest.csv";

$html = new simple_html_dom();

$html->load_file($site);

$table = $html->find('tbody',0);

$regione = new Regione();

foreach($table->find('tr') as $row) {
    $regione->setAll($row->find('td',4)->innertext,$row->find('td',16)->innertext,$row->find('td',15)->innertext,$row->find('td',14)->innertext,$row->find('td',11)->innertext,$row->find('td',13)->innertext,$row->find('td',17)->innertext,"Italy");
    //Regioni::inserisciObj($regione);
  Regioni::modificaObj($regione, $row->find('td',4)->innertext);
    }
}

public static function datiContagiMondoCrawler(){
$site = "https://www.worldometers.info/coronavirus/#countries";

$html = new simple_html_dom();
$html->load_file($site);

$table = $html->find('table#main_table_countries_today tbody',0);

$trovatoworld=false;
$regione = new Regione();
foreach($table->find('tr') as $row) {
    if($trovatoworld==true){
        if($row->find('td',1)->plaintext!='Diamond Princess'&&$row->find('td',1)->plaintext!='MS Zaandam'&&$row->find('td',1)->plaintext!='Italy'){
            $regione->setAll($row->find('td',1)->plaintext,str_replace(",","",$row->find('td',2)->innertext),str_replace(",","",$row->find('td',4)->plaintext),str_replace(",","",$row->find('td',6)->innertext),str_replace(",","",$row->find('td',7)->innertext),str_replace(",","",ltrim($row->find('td',3)->plaintext, '+')),str_replace(",","",$row->find('td',11)->plaintext),$row->find('td',1)->plaintext);
            Regioni::modificaObj($regione, $row->find('td',1)->plaintext);}
        }else{
            if($row->find('td',1)->plaintext=="World")
                $trovatoworld=true;
        }
    
    }
}

}
?>