<?php

/**
 * Mini Framework
 * 
 * (c) Marc Augier
 */
include_once "classes/Page.php";
 $ma_page = new Page();//Appel de la classe Page
//Les variables sont forcées ici sinon par défaut dans la fonction construct
//ma_page->setControllers("controllers/");
$ma_page->setTheme("html5up-massively");
//$ma_page->setTemplate("catalogue");
$ma_page->prepare();//Appel de la fonction prepare
 echo $ma_page;//J'affiche ma page

 ?>