<?php

class ParseurXML {
    private $path;
    private $result;
    private $depth;

    private $titre = "";
    private $description = "";
    private $lien = "";
    private $guid = "";
    private $datePub = "";
    private $categorie = "";

    private $itemBool = false;
    private $titreBool = false;
    private $descriptionBool = false;
    private $lienBool = false;
    private $guidBool = false;
    private $datePubBool = false;
    private $categorieBool = false;

    private $tab;

    public function __construct($path)
    {
        $this -> path = $path;
        $this -> depth = 0;
    }

    //Obtenir le résultat
    public function getResult() {
        return $this->tab;
    }
     
    //Parse le fichier
    public function parse()
    {
        ob_start();
        $xml_parser = xml_parser_create();
        xml_set_object($xml_parser, $this);
        xml_set_element_handler($xml_parser, "startElement", "endElement");
        xml_set_character_data_handler($xml_parser, 'characterData');
        if (!($fp = fopen($this -> path, "r"))) {
            die("could not open XML input");
        }
 
        while ($data = fread($fp, 4096)) {
            if (!xml_parse($xml_parser, $data, feof($fp))) {
                die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
            }
        }
        ob_end_clean();
        fclose($fp);
        xml_parser_free($xml_parser);
    }

    //Traitement lorsque la balise est ouvrante
    private function startElement($parser, $name, $attrs)
    {
        switch ($name){
            case "ITEM":;
                $this->itemBool = true;
                break;
            case "TITLE":
                $this->titreBool = true;
                break;
            case "DESCRIPTION":
                $this->descriptionBool = true;
                break;
            case "LINK":
                $this->lienBool = true;
                break;
            case "GUID":
                $this->guidBool = true;
                break;
            case "PUBDATE":
                $this->datePubBool = true;
                break;
            case "CATEGORY":
                $this->categorieBool = true;
                break;
        }
    }

    //Traitement lorsque la balise est fermante
    private function endElement($parser, $name)
    {
        switch ($name){
            case "ITEM":
                $this->itemBool = false;

                if(empty($this->categorie))
                    $this->categorie = "pas de catégorie";

                $this->tab[] = new News($this->titre, $this->description, $this->lien, $this->guid, $this->datePub, $this->categorie, "");

                $this->titre = "";
                $this->description = "";
                $this->lien = "";
                $this->guid = "";
                $this->datePub = "";
                $this->categorie = "";

                break;
            case "TITLE":
                $this->titreBool = false;
                break;
            case "DESCRIPTION":
                $this->descriptionBool = false;
                break;
            case "LINK":
                $this->lienBool = false;
                break;
            case "GUID":
                $this->guidBool = false;
                break;
            case "PUBDATE":
                $this->datePubBool = false;
                $this->datePub = date("Y-m-d", strtotime($this->datePub));
                break;
            case "CATEGORY":
                $this->categorieBool = false;
                break;
        }
    }

    //Traitement des données entre les balises
    private function characterData($parser, $data)
    {
        $data = trim($data);
         
        if (strlen($data) > 0 && $this->itemBool)
        {
            if($this->titreBool){
                $this->titre .= $data;
            }
            if($this->descriptionBool){
                $this->description .= $data;
            }
            if($this->lienBool){
                $this->lien .= $data;
            }
            if($this->guidBool){
                $this->guid .= $data;
            }
            if($this->datePubBool){
                $this->datePub .= $data;
            }
            if($this->categorieBool){
                $this->categorie .= $data;
            }

        }
    }
}
