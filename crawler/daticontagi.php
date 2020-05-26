<?php
require_once('../assets/simple_html_dom.php');

$site = "https://www.worldometers.info/coronavirus/#countries";

$html = new simple_html_dom();
$html->load_file($site);
//$items = $html->find('div.dzRe8d.pym81b',0)->children(1)->; 


$table = $html->find('table tbody',0);
/*
// initialize empty array to store the data array from each row
$theData = array();

// loop over rows
foreach($table->find('tr') as $row) {

    // initialize array to store the cell data from each row
    $rowData = array();
    foreach($row->find('td, th') as $cell) {

        // push the cell's text to the array
        $rowData[] = $cell->outertext;
    }

    // push the row's data array to the 'big' array
    $theData[] = $rowData;
}
print_r($theData);*/


$rowData = array();

foreach($table->find('tr') as $row) {
    // initialize array to store the cell data from each row
    $flight = array();
    foreach($row->find('td') as $cell) {
        // push the cell's text to the array
        $flight[] = $cell->plaintext;
    }
    $rowData[] = $flight;
}

echo '<table>';
foreach ($rowData as $row => $tr) {
    echo '<tr>'; 
    foreach ($tr as $td)
        echo '<td>' . $td .'</td>';
    echo '</tr>';
}
echo '</table>';
?>