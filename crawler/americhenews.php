<?php
require_once('../../assets/simple_html_dom.php');

$site = "https://news.google.com/topics/CAAqBwgKMKm5lwswm-KuAw?hl=it&gl=IT&ceid=IT%3Ait";

$html = new simple_html_dom();
$html->load_file($site);


$news = $html->find('c-wiz.MNK4Vd',0)->outertext;

echo $news;

?>