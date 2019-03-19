<?php

class FluxRssGateway
{
    private $con;

    //Initialisation de la connection
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    //Ajouter un flux dans la base
    public function addFluxRss(FluxRss $fluxrss){
        $query = "INSERT INTO fluxrss VALUES(:site, :lien)";

        $this->con->executeQuery($query, array(
                    ':site'=>array($fluxrss->getSite(), PDO::PARAM_STR),
                    ':lien'=>array($fluxrss->getLien(), PDO::PARAM_STR)
            ));
    }

    //Supprimer un flux dans la base avec son guid
    public function removeFluxRssBySite(string $site){
        $query = "DELETE FROM fluxrss WHERE site = :site";

        $this->con->executeQuery($query, array(
                    ':site'=>array($site, PDO::PARAM_STR)
            ));
    }

    //Avoir la liste des noms des flux rss
    public function getAllFluxRssName():array {
        $query = "SELECT site FROM fluxrss";

        $this->con->executeQuery($query);

        $results = $this->con->getResults();
        foreach ($results as $site){
            $tab[] = $site['site'];
        }

        return $tab;
    }

    public function getNbFluxRss():int
    {
        $query = "SELECT COUNT(*) FROM fluxrss";

        $this->con->executeQuery($query);

        $results = $this->con->getResults();
        return $results[0]['COUNT(*)'];
    }

    //Avoir la liste des flux rss
    public function getAllFluxRss():array {
        $query = "SELECT * FROM fluxrss";

        $this->con->executeQuery($query);

        $results = $this->con->getResults();
        foreach ($results as $lien){
            $tab[] = new FluxRss($lien['site'], $lien['lien']);
        }

        return $tab;
    }

}