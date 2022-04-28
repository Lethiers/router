<?php
    //import
    include './evalmvc/utils/connectBdd.php';
    include './evalmvc/model/model_article.php';
    include './evalmvc/view/view_article.php';
    include './evalmvc/view/view_header.php';
    //test

    if(isset($_SESSION['ok'])&& $_SESSION['ok']='ok'){
        if(isset($_POST['nom_article']) AND isset($_POST['prix_article']) AND 
        $_POST['nom_article'] != "" AND $_POST['prix_article'] !=""){
            //instancier un nouvel objet Article (appel au constructeur)
            $article = new Article($_POST['nom_article'], $_POST['prix_article']);
            //appel à la méthode addArticleV2 de la classe Article
            $article->addArticleV2($bdd);
            //utiliser le getter pour afficher le nom
            echo 'l\'article '.$article->getNomArticle().' à été ajouté';
        }
        else{
            echo 'veuillez remplir les champs du formulaire';
        }
        
    }else {
        header('Location: /router/connexion');
    }

    
    // if(isset($_POST['nom_article']) AND isset($_POST['prix_article']) AND 
    // $_POST['nom_article'] != "" AND $_POST['prix_article'] !=""){
    //     //instancier un nouvel objet Article (appel au constructeur)
    //     $article = new Article($_POST['nom_article'], $_POST['prix_article']);
    //     //appel à la méthode addArticleV2 de la classe Article
    //     $article->addArticleV2($bdd);
    //     //utiliser le getter pour afficher le nom
    //     echo 'l\'article '.$article->getNomArticle().' à été ajouté';
    // }
    // else{
    //     echo 'veuillez remplir les champs du formulaire';
    // }

?>