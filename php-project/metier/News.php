<?php

class News
{
    private $titre;
    private $description;
    private $lien;
    private $guid;
    private $datePub;
    private $categorie;
    private $site;


    public function __construct(string $titre, string $description, string $lien, string $guid, string $datePub, string $categorie, string $site)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->lien = $lien;
        $this->guid = $guid;
        $this->datePub = $datePub;
        $this->categorie = $categorie;
        $this->site = $site;
    }

    /**
     * @return string
     */
    public function getCategorie(): string
    {
        return $this->categorie;
    }

    /**
     * @return string
     */
    public function getDatePub(): string
    {
        return $this->datePub;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getGuid(): string
    {
        return $this->guid;
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
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @return string
     */
    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie(string $categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @param string $datePub
     */
    public function setDatePub(string $datePub)
    {
        $this->datePub = $datePub;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @param string $guid
     */
    public function setGuid(string $guid)
    {
        $this->guid = $guid;
    }

    /**
     * @param string $lien
     */
    public function setLien(string $lien)
    {
        $this->lien = $lien;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre)
    {
        $this->titre = $titre;
    }

    /**
     * @param string $site
     */
    public function setSite(string $site)
    {
        $this->site = $site;
    }

}
