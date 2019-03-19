<?php

class connection extends PDO
{
    private $stmt;

    //Initialisation des identifiants de connexion
    public function __construct(string $dsn, string $username, string $passwd)
    {
        parent::__construct($dsn, $username, $passwd);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //Exécuter des requêtes SQL
    public function executeQuery($query, array $parameters=[]){
        $this->stmt = parent::prepare($query);
        foreach($parameters as $name => $value){
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }

    //Retourner le code obtenu par la requête
    public function getResults(){
        return $this->stmt->fetchall();
    }
}