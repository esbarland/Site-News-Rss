<?php

class FluxRss{

    private $site;
    private $lien;

    public function __construct(string $site, string $lien)
    {
        $this->site = $site;
        $this->lien = $lien;
    }

    /**
     * @return string
     */
    public function getLien(): string
    {
        return $this->lien;
    }

    /**
     * @return string
     */
    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * @param string $lien
     */
    public function setLien(string $lien)
    {
        $this->lien = $lien;
    }

    /**
     * @param string $site
     */
    public function setSite(string $site)
    {
        $this->site = $site;
    }


}