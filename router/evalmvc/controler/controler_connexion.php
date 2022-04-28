<?php
    //import
    include './evalmvc/utils/connectBdd.php';
    include './evalmvc/model/model_user.php';
    include './evalmvc/view/view_connexion.php';
    session_start();


    $utilisateur = new Utilisateur(null,null,null,null);

    if (isset($_POST['mail_util'])&& !empty($_POST['mail_util']) && 
    isset($_POST['password_util'])&& !empty($_POST['password_util'])) {
        $connexion = $utilisateur->checkUser($bdd,$_POST['mail_util'],$_POST['password_util']);
        var_dump($connexion);
        $_SESSION['id'] = $connexion[0]->id_util;
        $_SESSION['ok'] = 'ok';
        if (!empty($connexion)) {
            echo 'coucou !';
            header('Location: /router/voirArticle');
        }else {
            echo 'wrong password or login';
        }
        
    }else {
        echo 'merci de remplir les champs !';
    }


    // if(isset($_SESSION['id'])){
    //     echo '<p>tu es connecté</p>';
    //     echo ''.$_SESSION['id'].'';
    // }


?>