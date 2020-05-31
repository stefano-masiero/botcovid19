<?php
require_once('../assets/simple_html_dom.php');
require_once('../Datamodel/notizia.php');
$site = "https://news.google.com/topics/CAAqBwgKMPq5lwswmuKuAw?hl=it&gl=IT&ceid=IT%3Ait";

$html = new simple_html_dom();
$html->load_file($site);



foreach($html->find('div.xrnccd article') as $row) {
   echo $row->find(a)->href." ".$row->children(1)->plaintext." ciao ".$row->children(3)->plaintext;
}
$notizia = new Notizia();
$notizia->setAll('p', 'p', 'p', 'p', 'p', 'p', 'Africa');
//Notizie::inserisciObj($notizia);
//echo $news;
?>