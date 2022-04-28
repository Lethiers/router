<?php
    //import
    include './evalmvc/utils/connectBdd.php';
    include './evalmvc/model/model_user.php';
    include './evalmvc/view/view_addUser.php';

    $utilisateur = new Utilisateur(null,null,null,null);
    if (isset($_POST['nom_util'])&& !empty($_POST['nom_util'])&&
    isset($_POST['prenom_util'])&& !empty($_POST['prenom_util'])&&
    isset($_POST['mail_util'])&& !empty($_POST['mail_util'])&&
    isset($_POST['password_util'])&& !empty($_POST['password_util'])) {
        
        $utilisateur->setNom($_POST['nom_util']);
        $utilisateur->setPrenom($_POST['prenom_util']);
        $utilisateur->setEmail($_POST['mail_util']);
        $utilisateur->setMdp($_POST['password_util']);
        var_dump($utilisateur);
        // $utilisateur->addUser($bdd);
        echo 'bienvenue '.$utilisateur->getNom().'';
    }else {
        echo 'merci de remplir les champs !';
    }
    ?>