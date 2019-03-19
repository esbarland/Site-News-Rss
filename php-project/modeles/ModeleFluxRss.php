<?php

class ModeleFluxRss
{
    //Ajouter un flux rss
    public function addFluxRss(FluxRss $fluxRss){
        global $base, $login, $mdp;

        $fg = new FluxRssGateway(new Connection($base, $login, $mdp));

        $fg->addFluxRss($fluxRss);
    }

    //Supprimer un flux rss avec son nom
    public function removeFluxRssBySite(string $site){
        global $base, $login, $mdp;

        $fg = new FluxRssGateway(new Connection($base, $login, $mdp));

        $fg->removeFluxRssBySite($site);
    }

    //Obtenir tous les flux rss
    public function getFluxRss(): array
    {
        global $base, $login, $mdp;

        $fg = new FluxRssGateway(new Connection($base, $login, $mdp));
        return $fg->getAllFluxRssName();
    }

    //Obtenir tous les flux rss
    public function getAllFluxRss(): array
    {
        global $base, $login, $mdp;

        $fg = new FluxRssGateway(new Connection($base, $login, $mdp));
        return $fg->getAllFluxRss();
    }

    public function getNbFluxRss():int
    {
        global $base, $login, $mdp;

        $fg = new FluxRssGateway(new Connection($base, $login, $mdp));
        return $fg->getNbFluxRss();
    }

}