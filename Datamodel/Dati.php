<?php

require_once 'database.php';

class Dati
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
            $query = "INSERT INTO utenti (
            ID, 
            userName, 
            pw, 
            nome, cognome, cf,
            provincia, indirizzo )
            VALUES (
            null, 
            :username, 
            :pw, 
            :nome, 
            :cognome,
            :cf,
            :provincia,
            :indirizzo)";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($query);
            $username = $p->getUserName();
            $pw = $p->getPW();
            $nome = $p->getNome();
            $cognome = $p->getCognome();
            $cf = $p->getCF();
            $provincia = $p->getProvincia();
            $indirizzo = $p->getIndirizzo();
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':pw', $pw, PDO::PARAM_STR);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':cognome', $cognome, PDO::PARAM_STR);
            $stmt->bindParam(':cf', $cf, PDO::PARAM_STR);
            $stmt->bindParam(':provincia', $provincia, PDO::PARAM_STR);
            $stmt->bindParam(':indirizzo', $indirizzo, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "<script>alert('Errore esite gia questo utente');</script>";
        }
    }

    public static function modificaObj($p, $ukey)
    {
        try {
            $conn = Database::getConnectionPDO();

            $query = "UPDATE utenti SET 
                    userName = :username,
                    pw = :pw,
                    nome= :nome,
                    cognome= :cognome,
                    cf= :cf,
                    provincia= :provincia,
                    indirizzo= :indirizzo
                    WHERE ID = :ukey";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($query);
            $username = $p->getUserName();
            $pw = $p->getPW();
            $nome = $p->getNome();
            $cognome = $p->getCognome();
            $cf = $p->getCF();
            $provincia = $p->getProvincia();
            $indirizzo = $p->getIndirizzo();
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':pw', $pw, PDO::PARAM_STR);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':cognome', $cognome, PDO::PARAM_STR);
            $stmt->bindParam(':cf', $cf, PDO::PARAM_STR);
            $stmt->bindParam(':provincia', $provincia, PDO::PARAM_STR);
            $stmt->bindParam(':indirizzo', $indirizzo, PDO::PARAM_STR);
            $stmt->bindParam(':ukey', $ukey, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "<script>alert('Errore esite gia questo utente');</script>";
        }
    }


    public static function eliminaobj($username)
    {
        //la funzione è identica ad elimina. ha poco senso in questo caso utiizzare gli oggetti
        $conn = Database::getConnectionPDO();
        $sql = "DELETE FROM utenti WHERE userName =  :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public static function getUtenteObj($username)
    {
        $conn = Database::getConnectionPDO();

        $stmt = $conn->prepare("SELECT * FROM utenti WHERE userName=:username");
        $stmt->execute(['username' => $username]);
        $obj = $stmt->fetchObject('Utente');
        return $obj;
    }

    public static function getListaObj($where = null, $orderBy = null)
    {

        $conn = Database::getConnectionPDO();
        $query = "SELECT * FROM utenti";
        if (isset($where))
            $query .= " WHERE :where";
        if (isset($orderBy))
            $query .= " ORDERBY :order";
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute(array(':where' => $where, ':order' => $orderBy));
            $list = $stmt->fetchAll(PDO::FETCH_CLASS, 'Utente');
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $list;
    }

    /************************************************************************************
     * utilizzo di DAO senza DO. I metodi prendono un oggetto e restituiscono SOLO il resultset DELLA QUERY
     ************************************************************************************* */

    public static function getUtente($userName)
    {
        $conn = Database::getConnectionPDO();
        $query = "SELECT * FROM utenti WHERE userName=:username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $userName, PDO::PARAM_STR);
        return $stmt->fetch();
    }

    public static function getLista($where = null, $orderBy = null)
    {
        $conn = Database::getConnectionPDO();
        $query = "SELECT * FROM utenti";
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
class Dato
{

    private $ID;
    private $userName;
    private $pw;
    private $nome;
    private $cognome;
    private $cf;
    private $provincia;
    private $indirizzo;

    function __construct()
    { }
    function setAll($ID = null, $userName, $pw, $nome, $cognome, $cf, $provincia, $indirizzo)
    {
        $this->ID = $ID;
        $this->userName = $userName;
        $this->pw = $pw;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->cf = $cf;
        $this->provincia = $provincia;
        $this->indirizzo = $indirizzo;
    }
    function getID()
    {
        return $this->ID;
    }

    function getUserName()
    {
        return $this->userName;
    }

    function getPW()
    {
        return $this->pw;
    }
    function getNome()
    {
        return $this->nome;
    }
    function getCognome()
    {
        return $this->cognome;
    }
    function getCF()
    {
        return $this->cf;
    }
    function getProvincia()
    {
        return $this->provincia;
    }
    function getIndirizzo()
    {
        return $this->indirizzo;
    }

    function setID($ID)
    {
        $this->ID = $ID;
    }

    function setUserName($userName)
    {
        $this->userName = $userName;
    }

    function setPW($pw)
    {
        $this->pw = $pw;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    function setCF($cf)
    {
        $this->cf = $cf;
    }

    function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    }
}
