<?php
    class Article{
        /*-----------------------------------------
                        ATTRIBUTS
        ----------------------------------------*/
        private $id_article;
        private $nom_article;
        private $prix_article;
        /*-----------------------------------------
                        CONSTRUCTEUR
        ----------------------------------------*/
        public function __construct($nom, $prix){
            $this->nom_article = $nom;
            $this->prix_article = $prix;
        }
        /*-----------------------------------------
                    GETTERS AND SETTER
        ----------------------------------------*/
        public function getIdArticle():int{
            return $this->id_article;
        }
        public function getNomArticle():string{
            return $this->nom_article;
        }
        public function getPrixArticle():float{
            return $this->prix_article;
        }
        public function setIdArticle($id):void{
            $this->id_article = $id;
        }
        public function setNomArticle($nom):void{
            $this->nom_article = $nom;
        }
        public function setPrixArticle($prix):void{
            $this->prix_article = $prix;
        }
        /*-----------------------------------------
                        METHODES
        ----------------------------------------*/
        //version avec des paramétres
        public function addArticle($bdd, $nom, $prix):void{
            try{
                $req = $bdd->prepare('INSERT INTO article(nom_article, prix_article) 
                VALUES(:nom_article, :prix_article)');
                $req->execute(array(
                    'nom_article' => $nom,
                    'prix_article' =>$prix
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        //version depuis l'instance de l'objet
        public function addArticleV2($bdd):void{
            $nom = $this->getNomArticle();
            $prix = $this->getPrixArticle();
            try{
                $req = $bdd->prepare('INSERT INTO article(nom_article, prix_article) 
                VALUES(:nom_article, :prix_article)');
                $req->execute(array(
                    'nom_article' => $nom,
                    'prix_article' =>$prix
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }


        // aficher tout les articles
        public function afficherArticle($bdd):void{
            $req = $bdd->prepare('SELECT * FROM  article');
            $req->execute();
            while ($data = $req->fetch()){
                $prix = $data['prix_article'];
                $nom = $data['nom_article'];
                $id = $data['id_article'];
               
                echo '<li> le nom du produit est <a href="/router/modifierArticle?id='.$id.'">'.$nom.'</a> le prix est de'.$prix.'<a href="/router/supprimerArticle?id='.$id.'">pour supprimer</a></li>';
            }
            echo '</ul>';
            echo '</div>';
        }

        public function afficherUnArticle($bdd,$id):void{
            $req = $bdd->prepare('SELECT * FROM  article WHERE id_article = :id_article');
            $req->execute(array(
                'id_article' => $id
            ));
            while ($data = $req->fetch()){
                $prix = $data['prix_article'];
                $nom = $data['nom_article'];

               echo '<p>nom :</p>';
               echo '<input type="text" name="nom_article" value="'.$nom.'">';
               echo '<p>prix :</p>';
               echo '<input type="text" name="prix_article" value="'.$prix.'">';
               echo '<input type="submit" value="modifier">';
               echo '</form>';
               echo '</div>';
            }
        }

        public function afficherArticleV2($bdd):array{
            $req = $bdd->prepare('SELECT * FROM  article');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        // fonction pour mettre un jour un produit
        public function modifierArticle($bdd,$nom,$prix,$id):void{
            $req = $bdd->prepare('UPDATE article SET prix_article = :prix_article, nom_article = :nom_article WHERE id_article = :id_article');
            $req->execute(array(
                'id_article' => $id,
                'prix_article' => $prix,
                'nom_article' => $nom
            ));
        }

        // fonction pour supprimer un produit
        public function supprimerArticle($bdd,$id):void{
            $req = $bdd->prepare('DELETE FROM article WHERE id_article = :id_article');
            $req->execute(array(
                'id_article' => $id
            ));
        }


        

    }
?>