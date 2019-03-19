<?php

class UserController
{

    public function __construct()
    {
        //Appel des variables globales
        global $rep, $vues, $dVueErreur;


        //on initialise un tableau d'erreur
        $dVueErreur = array();

        try {
            //On récupère l'action et on l'a traite
            $action = $_REQUEST['action'];
            switch ($action) {
                //pas d'action, on réinitialise 1er appel
                case NULL:
                    $this->Reinit();
                    break;

                case "connexion":
                    $this->connexion();
                    break;

                case "formulaireConnexion":
                    $this->acceeFormulaireConnexion();
                    break;

                default:
                    $dVueErreur[] = "Action invalide";
                    require($rep . $vues['erreur']);
                    break;
            }

        } catch (PDOException $e) {
            //Erreurs liées à la base de données
            $dVueErreur[] = "PDO Exception: Erreur inattendue!!! ";
            echo $e->getMessage();
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            //Autres cas d'erreurs
            if($e2->getMessage() == "error auth")
                $dVueErreur[] = "Nom d'utilisateur et/ou mot de passe incorrect";
            else
                $dVueErreur[] = "Exception: Erreur inattendue!!! ";

            require($rep . $vues['erreur']);
        }

        exit(0);
    }

    //Action vide qui appel dans la base le nombre de news avec le système de pagination
    public function Reinit()
    {
        global $rep, $vues, $nbNewsParPage;
        $total = 0;
        $tab = array();

        $page = $_GET['page'];

        $m = new ModeleNews();
        $page = (isset($page)) ? abs(intval($page)) : 1;

        $total = $m->getNbNews();
        $nbPage = ceil($total / $nbNewsParPage);

        $page = ($page == 0) ? 1 : $page;

        if ($page > $nbPage) {
            $page = $nbPage;
        }

        if($total != 0)
            $tab = $m->getNewsParPage($page);


        require($rep . $vues['accueil']);
    }

    //Connexion à une session admin
    public function connexion()
    {
        $user = $_POST['user'];
        $password = $_POST['password'];

        ModeleAdmin::connexion($user, $password);
        $_REQUEST['action'] = NULL;
        new UserController();
    }

    //Accéder au formuaire de connexion pour admin
    public function acceeFormulaireConnexion(){
        global $rep, $vues;

        require ($rep. $vues['admin']);
    }

}

?>
