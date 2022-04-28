<?php
//import
include './evalmvc/utils/connectBdd.php';
include './evalmvc/model/model_article.php';
include './evalmvc/view/view_modifier.php';
include './evalmvc/view/view_header.php';



if(isset($_SESSION['id'])&& !empty($_SESSION['id'])){

    if (isset($_GET['id']) AND !empty($_GET['id'])) {
        $article = new Article(null,null);
        $article->afficherUnArticle($bdd,$_GET['id']);   
    }
    
    if (isset($_POST['nom_article']) AND !empty($_POST['nom_article']) && isset($_POST['prix_article']) AND !empty($_POST['prix_article'])) {
        $nom = $_POST['nom_article'];
        $prix = $_POST['prix_article'];
        $article->modifierArticle($bdd,$nom,$prix,$_GET['id']);
        echo ''.$nom.' est modifié !';
    }

}else {
    header('Location: /router/connexion');
}






?>