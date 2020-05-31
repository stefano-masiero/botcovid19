<?php

require_once 'database.php';

class Notizie
{
    /* DAO
     * 	mappatura della tabella come oggetto. Deve contenere ALMENO i metodi essenziali del CRUD
     *  INSERT
     * UPDATE
     * DELETE
     * SELECT su id dell'elemto o con WHERE condition
     * Di seguito verranno implementati i metodi per la mappaturra stretta sia con DO che solo con DAO
     * ************************************************************************************
     * utilizzo di DAO con DO. I metodi prendono un oggetto e restituiscono, a seconda dei casi degli oggetti
     *  o delle liste di oggetti
     * ************************************************************************************ */
     
    public static function inserisciObj($p)
    {
        try {
            
            $conn = Database::getConnectionPDO();
            $query = "INSERT INTO Notizia (
            titolo, 
            idNotizia,
            data,
            link,
            descrizione,
            immagine,
            nomeContinente )
            VALUES (
            :titolo, 
            null, 
            :data, 
            :link, 
            :descrizione,
            :immagine,
            :nomeContinente)";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($query);
            $titolo = $p->getTitolo();
            $data = $p->getData();
            $link = $p->getLink();
            $descrizione = $p->getDescrizione();
            $immagine = $p->getImmagine();
            $nomeContinente = $p->getNomeContinente();
            $stmt->bindParam(':titolo', $titolo, PDO::PARAM_STR);
            $stmt->bindParam(':data', $data, PDO::PARAM_STR);
            $stmt->bindParam(':link', $link, PDO::PARAM_STR);
            $stmt->bindParam(':descrizione', $descrizione, PDO::PARAM_STR);
            $stmt->bindParam(':immagine', $immagine, PDO::PARAM_STR);
            $stmt->bindParam(':nomeContinente', $nomeContinente, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            var_dump($p);
        }
    }
/*
    public static function getUtente($userName)
    {
        $conn = Database::getConnectionPDO();
        $query = "SELECT * FROM utenti WHERE userName=:username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $userName, PDO::PARAM_STR);
        return $stmt->fetch();
    }
*/
    public static function getLista($where = null, $orderBy = null)
    {
        $conn = Database::getConnectionPDO();
        $query = "SELECT * FROM Notizia";
        if (isset($where))
            $query .= " WHERE :where";
        if (isset($orderBy))
            $query .= " ORDERBY :order";

        $stmt = $conn->prepare($query);
        $stmt->execute(array(':where' => $where, ':order' => $orderBy));
        $results = $stmt->fetchAll();

        $list = [];
        foreach ($results as $row) {
            $list[] = $row;
        }
        return $list;
    }
}
/*
****************************************************DATA OBJECT ****************************************************
DO-> mappatura del record tabella
L'overloading del costruttore in PHP 5 non è PROPRIAMENTE  possibile. 
Tuttavia ciò non è un problema, dato che PHP permette, come C++ e al contrario di Java, 
di inserire valori di default = null per i parametri del costruttore. iN QUESTO MODO è POSSIBILE RICHIAMARE IL METODO SENZA PASSARE
I PARAMETRI SETTATI A NULL
*/
class Notizia
{

    private $titolo;
    private $idNotizia;
    private $data;
    private $link;
    private $descrizione;
    private $immagine;
    private $nomeContinente;

    function __construct()
    { }
    function setAll($titolo, $idNotizia, $data, $link, $descrizione, $immagine, $nomeContinente)
    {
        $this->titolo = $titolo;
        $this->idNotizia = $idNotizia;
        $this->data = $data;
        $this->link = $link;
        $this->descrizione = $descrizione;
        $this->immagine = $immagine;
        $this->nomeContinente = $nomeContinente;
    }
    function getTitolo() {
        return $this->titolo;
    }

    function getIdNotizia() {
        return $this->idNotizia;
    }

    function getData() {
        return $this->data;
    }

    function getLink() {
        return $this->link;
    }

    function getDescrizione() {
        return $this->descrizione;
    }

    function getImmagine() {
        return $this->immagine;
    }

    function getNomeContinente() {
        return $this->nomeContinente;
    }

    function setTitolo($titolo) {
        $this->titolo = $titolo;
    }

    function setIdNotizia($idNotizia) {
        $this->idNotizia = $idNotizia;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setDescrizione($descrizione) {
        $this->descrizione = $descrizione;
    }

    function setImmagine($immagine) {
        $this->immagine = $immagine;
    }

    function setNomeContinente($nomeContinente) {
        $this->nomeContinente = $nomeContinente;
    }


    
}
