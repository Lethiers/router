<?php

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';
/*-------------------------------------------
ROUTER
-------------------------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch($path){
//route /routing/test -> ./test.php
case $path === "/router/ajouterArticle" :
include './evalmvc/controler/controler_article.php';
break;
//route /routing/addUser -> ./controler/controler_add_user.php
case $path === "/router/voirArticle":
include './evalmvc/controler/controler_afficher.php';
break;
//route /routing/addUser -> ./controler/controler_add_user.php
case $path === "/router/modifierArticle":
include './evalmvc/controler/controler_modifier.php';
break;
case $path === "/router/supprimerArticle":
include './evalmvc/controler/controler_supprimer.php';
break;
case $path === "/router/connexion":
include './evalmvc/controler/controler_connexion.php';
break;
case $path === "/router/addUser":
include './evalmvc/controler/controler_addUser.php';
break;
}


?>