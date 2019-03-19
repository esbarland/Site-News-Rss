<?php

//Chargement de la configuration
require_once(__DIR__.'/config/config.php');

//Chargement de la classe Autoload
require_once(__DIR__.'/config/Autoload.php');

//Appel pour autoload des classes
Autoload::charger();

//Ouverture de session
session_start();

//Appel du Front Controller
$frontController = new FrontController();


?> 