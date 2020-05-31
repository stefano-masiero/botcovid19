<?php
require_once('../assets/simple_html_dom.php');
require_once('../Datamodel/regione.php');

$site = "https://www.worldometers.info/coronavirus/#countries";

$html = new simple_html_dom();
$html->load_file($site);

$table = $html->find('table#main_table_countries_today tbody',0);

$trovatoworld=false;
$regione = new Regione();
foreach($table->find('tr') as $row) {
    if($row->find('td',1)->plaintext=="World")
        $trovatoworld=true;
    else
        if($trovatoworld==true){
            if($row->find('td',1)->plaintext!='Diamond Princess'&&$row->find('td',1)->plaintext!='MS Zaandam'&&$row->find('td',1)->plaintext!='Italy'){
            $regione->setAll($row->find('td',1)->plaintext,str_replace(",","",$row->find('td',2)->innertext),str_replace(",","",$row->find('td',4)->plaintext),str_replace(",","",$row->find('td',6)->innertext),str_replace(",","",$row->find('td',7)->innertext),str_replace(",","",ltrim($row->find('td',3)->plaintext, '+')),str_replace(",","",$row->find('td',11)->plaintext),$row->find('td',1)->plaintext);
            //Regioni::inserisciObj($regione);
            Regioni::modificaObj($regione, $row->find('td',1)->plaintext);}
        }
    
    }
    //setAll($row->find('td',1)->plaintext,$row->find('td',2)->innertext,$row->find('td',4)->plaintext,$row->find('td',6)->innertext,$row->find('td',7)->innertext,$nNuoviCasi,$row->find('td',11)->plaintext,$row->find('td',1)->plaintext)
?>