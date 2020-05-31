<?php
require_once("database.php");
/*
SELECT c.*, c.* FROM Continente AS c 
INNER JOIN Nazione AS n ON c.nomeContinente = n.nomeContinente
WHERE c.nomeContinente = "Africa"
*/
class Continenti{
   

}

class Continente
{
    private $nomeContinente;
    function __construct()
    {
        
    }

    function getNomeContinente()
    {
        return $this->nome;
    }

    function setNomeContinente($nomeContinente)
    {
        $this->nomeContinente = $nomeContinente;
    }
}
?>
        
      