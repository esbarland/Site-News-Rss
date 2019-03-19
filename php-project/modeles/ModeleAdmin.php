<?php

class ModeleAdmin
{

    //Connexion en tant qu'admin
    public static function connexion(string $user, string $password){
        global $base, $login, $mdp, $dVueErreur;

        $user = Nettoyage::net_str($user, $dVueErreur);
        $user = Validation::val_str($user, $dVueErreur);
        $password = Nettoyage::net_str($password, $dVueErreur);
        $password = Validation::val_str($password, $dVueErreur);

        $ag = new AdminGateway(new Connection($base, $login, $mdp));

        $hashmdp = $ag->chercherAdmin($user);

        if(password_verify($password, $hashmdp)){
            $_SESSION['role'] = "admin";
            $_SESSION['login'] = $user;
            return new Admin($user, 'admin');
        }

        throw new Exception("error auth");
    }

    //Déconnexion de la session admin
    public static function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    //Voir si un admin est co ou pas
    public static function isAdmin(){
        global $dVueErreur;

        if (isset($_SESSION['login']) && isset($_SESSION['role'])){
            $login = Validation::val_str($_SESSION['login'], $dVueErreur);
            $role = Validation::val_str($_SESSION['role'], $dVueErreur);
            return new Admin($login, $role);
        }

        return null;
    }

}