<?php
require_once('../assets/simple_html_dom.php');
require_once('../Datamodel/notizia.php');
$site = "https://news.google.com/topics/CAAqBwgKMPq5lwswmuKuAw?hl=it&gl=IT&ceid=IT%3Ait";

$html = new simple_html_dom();
$html->load_file($site);


$news = $html->find('c-wiz.MNK4Vd',0)->outertext;


$notizia = new Notizia();
$notizia->setAll('p', 'p', 'p', 'p', 'p', 'p', 'Europa');
Notizie::inserisciObj($notizia);
//echo $news;
?>