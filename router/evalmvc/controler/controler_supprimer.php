<?php
//import
include './evalmvc/utils/connectBdd.php';
include './evalmvc/model/model_article.php';
include './evalmvc/view/view_header.php';
include './evalmvc/view/view_supprimer.php';

session_start();

if(isset($_SESSION['id'])&& !empty($_SESSION['id'])){
    if (isset($_GET['id'])&& !empty($_GET['id'])) {
        $id = $_GET['id'];
        $article = new Article(null,null);
        $article->supprimerArticle($bdd,$id);
        echo 'l\'article est supprimer';
    }else{
        echo 'probleme lors de la suppression!';
    }    
}else{
    header('Location: /router/connexion');
}
?>