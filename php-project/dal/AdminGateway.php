<?php

class AdminGateway
{
    private $con;

    //Initialisation de la connection
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    //Chercher un admin dans la base de données avec son nom d'utilisateur
    public function chercherAdmin(string $login){
        $query = "SELECT mdp FROM admin where login=:login";
        $this->con->executeQuery($query, array(":login"=>array($login, PDO::PARAM_STR)));

        $results = $this->con->getResults();

        if(isset($results)){
            return $results[0]['mdp'];
        }
        else return null;

    }

}