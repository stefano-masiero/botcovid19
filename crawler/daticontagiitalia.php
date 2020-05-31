<?php

require_once('../assets/simple_html_dom.php');
require_once('../Datamodel/regione.php');


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
    
   



?>