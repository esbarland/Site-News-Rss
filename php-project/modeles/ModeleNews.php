<?php

class ModeleNews
{
    //Obtenir toutes les news
	public function getNews(): array
	{
		global $base, $login, $mdp;

		$ng = new NewsGateway(new Connection($base, $login, $mdp));
		return $ng->afficherNews();
	}

	//Obtenir toutes les news en fonction de la page demandée
    public function getNewsParPage(int $page): array
    {
        global $base, $login, $mdp;

        $ng = new NewsGateway(new Connection($base, $login, $mdp));

        return $ng->afficherNewsParPage($page);
    }

    //Obtenir le nombre de news
    public function getNbNews(): int{
        global $base, $login, $mdp;

        $ng = new NewsGateway(new Connection($base, $login, $mdp));

        return $ng->getNbNews();
    }

    //Ajouter une news
    public function addNews(News $news){
        global $base, $login, $mdp;

        $ng = new NewsGateway(new Connection($base, $login, $mdp));

        $ng->addNews($news);
    }

    //Supprimer une news avec son guid
    public function removeNewsByGuid(string $guid){
        global $base, $login, $mdp;

        $ng = new NewsGateway(new Connection($base, $login, $mdp));

        $ng->removeNewsByGuid($guid);
    }

    //Supprimer des news avec le nom du flux rss
    public function removeNewsBySite(string $site){
        global $base, $login, $mdp;

        $ng = new NewsGateway(new Connection($base, $login, $mdp));

        $ng->removeNewsBySite($site);
    }

}