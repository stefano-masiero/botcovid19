<?php



require_once 'database.php';



class Regioni

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

            $query = "INSERT INTO Regione (

            nomeRegione, 

            nContagiTot, 

            nMorti, 

            nGuariti, nInfettiAttivi, nNuoviCasi,

            nTest, nomeNazione )

            VALUES (

            :nomeRegione, 

            :nContagiTot, 

            :nMorti, 

            :nGuariti, 

            :nInfettiAttivi,

            :nNuoviCasi,

            :nTest,

            :nomeNazione)";

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare($query);

            $nomeRegione = $p->getNomeRegione();

            $nContagiTot = $p->getNContagiTot();

            $nMorti = $p->getNMorti();

            $nGuariti = $p->getNGuariti();

            $nInfettiAttivi = $p->getNInfettiAttivi();

            $nNuoviCasi = $p->getNNuoviCasi();

            $nTest = $p->getNTest();

            $nomeNazione = $p->getNomeNazione();

            $stmt->bindParam(':nomeRegione', $nomeRegione, PDO::PARAM_STR);

            $stmt->bindParam(':nContagiTot', $nContagiTot, PDO::PARAM_INT);

            $stmt->bindParam(':nMorti', $nMorti, PDO::PARAM_INT);

            $stmt->bindParam(':nGuariti', $nGuariti, PDO::PARAM_INT);

            $stmt->bindParam(':nInfettiAttivi', $nInfettiAttivi, PDO::PARAM_INT);

            $stmt->bindParam(':nNuoviCasi', $nNuoviCasi, PDO::PARAM_INT);

            $stmt->bindParam(':nTest', $nTest, PDO::PARAM_INT);

            $stmt->bindParam(':nomeNazione', $nomeNazione, PDO::PARAM_STR);

            $stmt->execute();

        } catch (PDOException $e) {

            var_dump($p);

        }

    }



    public static function modificaObj($p, $key)

    {

        try {

            $conn = Database::getConnectionPDO();



            $query = "UPDATE Regione SET 

                    nomeRegione=:nomeRegione, 

            nContagiTot=:nContagiTot, 

            nMorti=:nMorti, 

            nGuariti=:nGuariti, nInfettiAttivi=:nInfettiAttivi, nNuoviCasi=:nNuoviCasi,

            nTest=:nTest, nomeNazione=:nomeNazione

                    WHERE nomeRegione = :key";

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare($query);

            $nomeRegione = $p->getNomeRegione();

            $nContagiTot = $p->getNContagiTot();

            $nMorti = $p->getNMorti();

            $nGuariti = $p->getNGuariti();

            $nInfettiAttivi = $p->getNInfettiAttivi();

            $nNuoviCasi = $p->getNNuoviCasi();

            $nTest = $p->getNTest();

            $nomeNazione = $p->getNomeNazione();

            $stmt->bindParam(':nomeRegione', $nomeRegione, PDO::PARAM_STR);

            $stmt->bindParam(':nContagiTot', $nContagiTot, PDO::PARAM_INT);

            $stmt->bindParam(':nMorti', $nMorti, PDO::PARAM_INT);

            $stmt->bindParam(':nGuariti', $nGuariti, PDO::PARAM_INT);

            $stmt->bindParam(':nInfettiAttivi', $nInfettiAttivi, PDO::PARAM_INT);

            $stmt->bindParam(':nNuoviCasi', $nNuoviCasi, PDO::PARAM_INT);

            $stmt->bindParam(':nTest', $nTest, PDO::PARAM_INT);

            $stmt->bindParam(':nomeNazione', $nomeNazione, PDO::PARAM_STR);

            $stmt->bindParam(':key', $key, PDO::PARAM_STR);

            return $stmt->execute();

        } catch (PDOException $e) {

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

        $query = "SELECT * FROM Regione";

        if (isset($where))

            $query .= " WHERE :where";

        if (isset($orderBy))

            $query .= " ORDERBY :order";

        try {

            $stmt = $conn->prepare($query);

            $stmt->execute(array(':where' => $where, ':order' => $orderBy));

            $list = $stmt->fetchAll(PDO::FETCH_CLASS, 'Regione');

        } catch (Exception $e) {

            return $e->getMessage();

        }

        return $list;

    }

    

    public static function getContagiFromContinenteObj($where = null)

    {

        $conn = Database::getConnectionPDO();

        $query =    "SELECT nomeRegione,nomeNazione, SUM(nContagiTot) as nContagiTot, SUM(nMorti) as nMorti, SUM(nGuariti) as nGuariti , SUM(nInfettiAttivi) as nInfettiAttivi, SUM(nNuoviCasi) as nNuoviCasi, SUM(nTest) as nTest FROM `Regione` join Nazione using (nomeNazione) join Continente using(nomeContinente) ";

        if (isset($where))

            $query .= " where nomeContinente= :where ";

            

        $query .= " group by nomeNazione";



        try {

            $stmt = $conn->prepare($query);

            if (isset($where))

            $stmt->bindParam(':where', $where, PDO::PARAM_STR);

            $stmt->execute();

            $list = $stmt->fetchAll(PDO::FETCH_CLASS, 'Regione');

        } catch (Exception $e) {

            return $e->getMessage();

        }

        return $list;

    }

    

    public static function getContagiFromContinenteSingoloObj($where)

    {

        $conn = Database::getConnectionPDO();

        $query ="SELECT nomeRegione, nContagiTot, nMorti, nGuariti, nInfettiAttivi, nNuoviCasi, nTest FROM Regione ";
        if (isset($where))

            $query .= " WHERE nomeNazione = :where";


        try {

            $stmt = $conn->prepare($query);

            if (isset($where))

            $stmt->bindParam(':where', $where, PDO::PARAM_STR);

            $stmt->execute();

            $list = $stmt->fetchAll(PDO::FETCH_CLASS, 'Regione');

        } catch (Exception $e) {

            return $e->getMessage();

        }

        return $list;

    }



    

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



/************************************************************************************

     * utilizzo di DAO senza DO. I metodi prendono un oggetto e restituiscono SOLO il resultset DELLA QUERY

     ************************************************************************************* */



/*

****************************************************DATA OBJECT ****************************************************

DO-> mappatura del record tabella

L'overloading del costruttore in PHP 5 non è PROPRIAMENTE  possibile. 

Tuttavia ciò non è un problema, dato che PHP permette, come C++ e al contrario di Java, 

di inserire valori di default = null per i parametri del costruttore. iN QUESTO MODO è POSSIBILE RICHIAMARE IL METODO SENZA PASSARE

I PARAMETRI SETTATI A NULL

*/

class Regione

{



    private $nomeRegione;

    private $nContagiTot;

    private $nMorti;

    private $nGuariti;

    private $nInfettiAttivi;

    private $nNuoviCasi;

    private $nTest;

    private $nomeNazione;



function __construct(){}

    function setAll($nomeRegione,$nContagiTot,$nMorti,$nGuariti,$nInfettiAttivi,$nNuoviCasi,$nTest,$nomeNazione)

    {  $this->nomeRegione = $nomeRegione;

        $this->nContagiTot = $nContagiTot;

        $this->nMorti = $nMorti;

        $this->nGuariti = $nGuariti;

        $this->nInfettiAttivi = $nInfettiAttivi;

        $this->nNuoviCasi = $nNuoviCasi;

        $this->nTest = $nTest;

        $this->nomeNazione = $nomeNazione;

    }

    

   		public function getNomeRegione(){

		return $this->nomeRegione;

	}



	public function setNomeRegione($NomeRegione){

		$this->nomeRegione = $NomeRegione;

	}



	public function getNContagiTot(){

		return $this->nContagiTot;

	}



	public function setNContagiTot($nContagiTot){

		$this->nContagiTot = $nContagiTot;

	}



	public function getNMorti(){

		return $this->nMorti;

	}



	public function setNMorti($nMorti){

		$this->nMorti = $nMorti;

	}



	public function getNGuariti(){

		return $this->nGuariti;

	}



	public function setNGuariti($nGuariti){

		$this->nGuariti = $nGuariti;

	}



	public function getNInfettiAttivi(){

		return $this->nInfettiAttivi;

	}



	public function setNInfettiAttivi($nInfettiAttivi){

		$this->nInfettiAttivi = $nInfettiAttivi;

	}



	public function getNNuoviCasi(){

		return $this->nNuoviCasi;

	}



	public function setNNuoviCasi($nNuoviCasi){

		$this->nNuoviCasi = $nNuoviCasi;

	}



	public function getNTest(){

		return $this->nTest;

	}



	public function setNTest($nTest){

		$this->nTest = $nTest;

	}



	public function getNomeNazione(){

		return $this->nomeNazione;

	}



	public function setNomeNazione($NomeNazione){

		$this->nomeNazione = $NomeNazione;

	}

}

