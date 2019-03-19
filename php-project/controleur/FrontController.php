<?php

class FrontController
{

    public function __construct()
    {
        global $vues, $rep, $dVueEreur;

        //Liste des actions qu'un admin peut faire
        $listeAction_Admin = array('deconnexion','ajouter','supprimer', 'addnews', 'addfluxrss', 'removenews', 'removefluxrss', 'formulaireaddnews', 'formulaireaddfluxrss', 'formulaireremovenews', 'formulaireremovefluxrss', 'majfluxrss');
        try{
            //On récupère l'action et si l'admin ne peut pas l'a faire, on envoie au user controller
            $a = ModeleAdmin::isAdmin();
            $action = $_REQUEST['action'];
            if (in_array($action, $listeAction_Admin)){
                if ($a == null) {
                    require($rep . $vues['admin']);
                }else{
                    new AdminController();
                }
            }else{
                new UserController();
            }
        }catch (Exception $e){
            $dVueErreur[] = "non admin";
            require($rep . $vues['erreur']);
        }
    }

}