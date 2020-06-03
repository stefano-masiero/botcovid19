<?php
require_once 'crawler.php';

Crawler::newsCrawler($_GET['sito'],$_GET['continente']);

?>