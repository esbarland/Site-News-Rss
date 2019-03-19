<?php

class NewsGateway
{
    private $con;

    //Initialisation de la connection
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    //Afficher la liste des news
    public function afficherNews(){
        $query="select * from news";

        $this->con->executeQuery($query);

        $result = $this->con->getResults();
        foreach ($result as $news){
            $tab[] = new News($news['titre'], $news['description'], $news['lien'], $news['guid'], $news['datePub'], $news['categorie'], $news['site']);
        }

        return $tab;
    }

    //Afficher la liste des news par page
    public function afficherNewsParPage(int $page): array
    {
        global $nbNewsParPage;

        $query="select * from news order by datePub DESC LIMIT :firstn,:nbnp";

        $this->con->executeQuery($query, array(':firstn'=>array(($page-1)*$nbNewsParPage, PDO::PARAM_INT), ':nbnp'=>array($nbNewsParPage, PDO::PARAM_INT)));
        $result = $this->con->getResults();
        foreach ($result as $news){
            $tab[] = new News($news['titre'], $news['description'], $news['lien'], $news['guid'], $news['datePub'], $news['categorie'], $news['site']);
        }

        return $tab;
    }

    //Obtenir le nombre de news dans la base
    public function getNbNews(): int{

        $query="select count(guid) from news";

        $this->con->executeQuery($query);
        $result = $this->con->getResults();
        return $result[0]['count(guid)'];
    }

    //Ajouter une news dans la base
    public function addNews(News $news){
        $query = "INSERT INTO news VALUES(:guid, :titre, :description, :lien, :datepub, :categorie, :site)";

        $this->con->executeQuery($query, array(
                    ':guid'=>array($news->getGuid(), PDO::PARAM_STR),
                    ':titre'=>array($news->getTitre(), PDO::PARAM_STR),
                    ':description'=>array($news->getDescription(), PDO::PARAM_STR),
                    ':lien'=>array($news->getLien(), PDO::PARAM_STR),
                    ':datepub'=>array($news->getDatePub(), PDO::PARAM_STR),
                    ':categorie'=>array($news->getCategorie(), PDO::PARAM_STR),
                    ':site'=>array($news->getSite(), PDO::PARAM_STR)
            ));
    }

    //Supprimer une news grâce à son guid
    public function removeNewsByGuid(string $guid){
        $query = "DELETE FROM news WHERE guid = :guid";

        $this->con->executeQuery($query, array(':guid'=>array($guid, PDO::PARAM_STR)));

    }

    //Supprimer des news selon leur site rss
    public function removeNewsBySite(string $site){
        $query = "DELETE FROM news WHERE site = :site";

        $this->con->executeQuery($query, array(
            ':site'=>array($site, PDO::PARAM_STR)
        ));

    }

}