<?php
session_start();
    //import
    include './evalmvc/utils/connectBdd.php';
    include './evalmvc/model/model_article.php';
    include './evalmvc/view/view_header.php';
    include './evalmvc/view/view_afficher.php';
    
    if(isset($_SESSION['id'])&& !empty($_SESSION['id'])){
        $article = new Article(null,null);
        $article->afficherArticle($bdd);
        echo "<div class='afficherArticle'> <ul>";   
        foreach ($article->afficherArticleV2($bdd) as $value){              
            echo '<li>Le nom du produit est : '.$value['nom_article'].'<br> avec un prix de '.$value['prix_article'].'</li>';
        }   
        echo '</ul></div>';
    }else{
        header('Location: /router/connexion');
    }
?>