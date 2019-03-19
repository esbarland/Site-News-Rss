<?php

class AdminController
{

    public function __construct()
    {
        //Appel de variables globales
        global $rep, $vues, $dVueErreur;

        //on initialise un tableau d'erreur
        $dVueErreur = array();

        //On récupère l'action et on l'a traite
        try {
            $action = $_REQUEST['action'];

            switch ($action) {
                case "deconnexion":
                    $this->deconnexion();
                    break;

                case "addnews":
                    $this->addNews();
                    break;

                case "removenews":
                    $this->removeNews();
                    break;

                case "addfluxrss":
                    $this->addFluxRss();
                    break;

                case "removefluxrss":
                    $this->removeFluxRss();
                    break;

                case "formulaireaddnews":
                    $this->formulaireAddNews();
                    break;

                case "formulaireaddfluxrss":
                    $this->formulaireAddFluxRss();
                    break;

                case "formulaireremovenews":
                    $this->formulaireRemoveNews();
                    break;

                case "formulaireremovefluxrss":
                    $this->formulaireRemoveFluxRss();
                    break;

                case "majfluxrss":
                    $this->majFluxRss();
                    break;

                default:
                    $dVueErreur[] = "Action invalide";
                    require($rep . $vues['erreur']);
                    break;
            }

        } catch (PDOException $e) {
            //Erreurs liées à la base de données
            $dVueErreur[] = "Erreur inattendue!!! ";
            echo $e->getMessage();
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            //Autres cas d'erreurs
            $dVueErreur[] = "Erreur inattendue!!! ";
            echo $e2->getMessage();
            require($rep . $vues['erreur']);
        }
        exit(0);

    }

    //Se déconnecter de la session admin
    public function deconnexion()
    {
        ModeleAdmin::deconnexion();
        $_REQUEST['action'] = NULL;
        new UserController();
    }

    //Ajouter une news dans la base de données
    public function addNews()
    {
        global $dVueErreur;

        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $lien = $_POST['lien'];
        $date = $_POST['date'];
        $categorie = $_POST['categorie'];
        $guid = $_POST['guid'];
        $site = "";

        //Nettoyage et Validation
        $titre = Nettoyage::net_str($titre, $dVueErreur);
        $titre = Validation::val_str($titre, $dVueErreur);
        $description = Nettoyage::net_str($description, $dVueErreur);
        $description = Validation::val_str($description, $dVueErreur);
        $lien = Nettoyage::net_str($lien, $dVueErreur);
        $lien = Validation::val_str($lien, $dVueErreur);
        $date = Nettoyage::net_str($date, $dVueErreur);
        $date = Validation::val_str($date, $dVueErreur);
        $categorie = Nettoyage::net_str($categorie, $dVueErreur);
        $categorie = Validation::val_str($categorie, $dVueErreur);
        $guid = Nettoyage::net_str($guid, $dVueErreur);
        $guid = Validation::val_str($guid, $dVueErreur);

        $news = new News($titre, $description, $lien, $guid, $date, $categorie, $site);

        $m = new ModeleNews();

        $m->addNews($news);

        $_REQUEST['action'] = NULL;
        new UserController();
    }

    //Retirer une news de la base de données
    function removeNews()
    {
        global $dVueErreur;

        $guid = $_POST['guid'];

        //Nettoyage et Validation
        $guid = Nettoyage::net_str($guid, $dVueErreur);
        $guid = Validation::val_str($guid, $dVueErreur);

        $m = new ModeleNews();

        $m->removeNewsByGuid($guid);

        $_REQUEST['action'] = NULL;
        new UserController();
    }

    //Mettre à jour tous les flux rss
    public function majFluxRss(){

        $m = new ModeleNews();
        $f = new ModeleFluxRss();

        if ($f->getNbFluxRss() > 0){
            $tabFluxRss = $f->getAllFluxRss();

            foreach ($tabFluxRss as $flux)
            {
                $m->removeNewsBySite($flux->getSite());
            }
            foreach ($tabFluxRss as $flux){
                $parser = new ParseurXML($flux->getLien());
                $parser->parse();
                $tabNews = $parser->getResult();

                foreach ($tabNews as $news){
                    $news->setSite($flux->getSite());
                    $m->addNews($news);
                }
            }
        }



        $_REQUEST['action'] = NULL;
        new UserController();
    }

    //Ajouter un flux rss dans la base de données
    public function addFluxRss()
    {
        global $dVueErreur;

        $site = $_POST['site'];
        $lien = $_POST['lien'];

        //Nettoyage et Validation
        $site = Nettoyage::net_str($site, $dVueErreur);
        $site = Validation::val_str($site, $dVueErreur);
        $lien = Nettoyage::net_url($lien, $dVueErreur);
        $lien = Validation::val_url($lien, $dVueErreur);

        $fluxrss = new FluxRss($site, $lien);

        $m = new ModeleFluxRss();

        $m->addFluxRss($fluxrss);

        $parser = new ParseurXML($lien);
        $parser->parse();
        $tab = $parser->getResult();

        $modeleNews = new ModeleNews();

        foreach ($tab as $news){
            $news->setSite($site);
            $modeleNews->addNews($news);
        }

        $_REQUEST['action'] = NULL;
        new UserController();
    }

    //Retirer un flux rss de la base de données
    public function removeFluxRss()
    {
        global $dVueErreur;

        $site = $_POST['siteselected'];

        //Nettoyage et Validation
        $site = Nettoyage::net_str($site, $dVueErreur);
        $site = Validation::val_str($site, $dVueErreur);

        $m = new ModeleFluxRss();

        $m->removeFluxRssBySite($site);

        $modeleNews = new ModeleNews();

        $modeleNews->removeNewsBySite($site);

        $_REQUEST['action'] = NULL;
        new UserController();
    }

    //Accéder au formulaire pour ajouter une news
    public function formulaireAddNews(){
        global $rep, $vues;

        require ($rep. $vues['addnews']);
    }

    //Accéder au formulaire pour ajouter un flux rss
    public function formulaireAddFluxRss(){
        global $rep, $vues;

        require ($rep. $vues['addfluxrss']);
    }

    //Accéder au formulaire pour supprimer une news
    public function formulaireRemoveNews(){
        global $rep, $vues;

        require ($rep. $vues['removenews']);
    }

    //Accéder au formulaire pour supprimer un flux rss
    public function formulaireRemoveFluxRss(){
        global $rep, $vues;

        $m = new ModeleFluxRss();
        if ($m->getNbFluxRss() == 0){
            $tab[] = "pas de flux";
        }else{
            $tab = $m->getFluxRss();
        }

        require ($rep. $vues['removefluxrss']);
    }

}
