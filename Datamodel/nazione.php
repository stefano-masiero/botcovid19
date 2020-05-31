<?php
include 'database.php';
class Nazioni
{
    
}

class Nazione
{
    private $nomeNazione;
    private $bandiera;
    private $nomeConfigurazione;
    
    function __constructor(){
        
    }
    function __setAll($nomeNazione, $bandiera, $nomeConfigurazione) {
        $this->nomeNazione = $nomeNazione;
        $this->bandiera = $bandiera;
        $this->nomeConfigurazione = $nomeConfigurazione;
    }
    function getNomeNazione() {
        return $this->nomeNazione;
    }

    function getBandiera() {
        return $this->bandiera;
    }

    function getNomeConfigurazione() {
        return $this->nomeConfigurazione;
    }

    function setNomeNazione($nomeNazione) {
        $this->nomeNazione = $nomeNazione;
    }

    function setBandiera($bandiera) {
        $this->bandiera = $bandiera;
    }

    function setNomeConfigurazione($nomeConfigurazione) {
        $this->nomeConfigurazione = $nomeConfigurazione;
    }


    
}

?>
