<?php

class Utilisateur{



/*------------------------------- 
                    ATTRIBUTS
        -------------------------------*/
private $nom;
private $prenom;
private $email;
private $mdp;

/*------------------------------- 
                    CONSTRUCTEUR
        -------------------------------*/

public function __constructor($nom,$prenom,$email,$mdp){
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->mdp = $mdp;
}

/*------------------------------- 
                    SETTER ET GETTEUR
        -------------------------------*/

public function getNom():string{
    return $this->nom_util;
}
public function setNom($nom):void{
    $this->nom_util = $nom;
}

public function getPrenom():string{
    return $this->prenom_util;
}
public function setPrenom($prenom):void{
    $this->prenom_util = $prenom;
}

public function getEmail():string{
    return $this->email_util;
}
public function setEmail($email):void{
    $this->email_util = $email;
}

public function getMdp():string{
    return $this->mdp_util;
}
public function setMdp($mdp):void{
    $this->mdp_util = $mdp;
}

/*------------------------------- 
                    METHODES
        -------------------------------*/

        // fonction pour créer l'utilisateur
public function addUser($bdd){

try {
    $req = $bdd->prepare('INSERT INTO utilisateur(password_util,nom_util,prenom_util,mail_util) 
    VALUES(:password_util,:nom_util,:prenom_util,:mail_util)');
    $req->execute(array(
        ':password_util' => $this->getMdp(),
        ':nom_util' => $this->getNom(),
        ':prenom_util' => $this->getPrenom(),
        ':mail_util' => $this->getEmail()

    ));
} catch (Exception $e) {
    die ('Erreur :' .$e->getMessage());
}
}


    // fonction pour voir les informations de l'utilisateur

public function showUser($bdd){
    try{
       
        $req = $bdd->prepare('SELECT * FROM utilisateur');
        $req->execute();
        while ($data = $req->fetch()){
            $nom= $data['nom_util'];
            $prenom= $data['prenom_util'];
            $email= $data['mail_util'];
            $mdp= $data['password_util'];


            echo '<li>'.$nom.'</li>';
            echo '<li>'.$prenom.'</li>';
            echo '<li>'.$email.'</li>';
            echo '<li>'.$mdp.'</li>';
        }
        echo '</ul>';
        echo '</div>';
    

    } catch (Exception $e) {
        die ('Erreur :' .$e->getMessage());
    }
}

public function checkUser($bdd,$mail,$password){
    try {
        $req = $bdd->prepare('SELECT mail_util, password_util, id_util FROM utilisateur WHERE mail_util = :mail_util AND password_util = :password_util');
        $req->execute(array(
            'mail_util' => $mail,
            'password_util' => $password
        ));
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        die('Erreur :' .$e->getMessage());
    }
}


}

?>