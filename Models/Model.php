<?php

class Model
{
    private $bd;

    private static $instance = null;

    private function __construct()
    {
        try {
            $this->bd = new PDO('mysql:host=localhost;dbname=librairie', 'root', '');
            $this->bd->query("SET NAMES 'utf8'");
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('<p>Echec connexion. Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }

    public static function get_model()
    {

        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    // ----------------------------------PARTIE HOME--------------------------------------------//



    // ----------------------------------PARTIE LIVRE--------------------------------------------//

    // ************************************** PAR ALL LIVRES UTILISATEURS *********************************

    public function get_all_livres()
    {
        try {
            $requete = $this->bd->prepare('SELECT * FROM livres ORDER BY Titre_livre ASC');
            $requete->execute();
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    // ************************************** PAR ALL LIVRES ADMIN *********************************

    public function get_all_livres_admin()
    {
        try {
            $requete = $this->bd->prepare('SELECT * FROM livres ORDER BY Titre_livre ASC');
            $requete->execute();
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    // ************************************** PAR AUTEUR *********************************

    public function get_livres_par_auteur()
    {
        try {
            $requete = $this->bd->prepare('SELECT Nom_auteur FROM livres');
            $requete->execute();
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_livres_par_auteur_resultat()
    {
        $choixAuteur = $_POST['select_auteur']; {
            try {
                $requete = $this->bd->prepare("SELECT * FROM livres WHERE `Nom_auteur`= :a");
                $requete->execute(array(':a' => $choixAuteur));
            } catch (PDOException $e) {
                die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
            }
            return $requete->fetchAll(PDO::FETCH_OBJ);
        }
    }
    // *************************************************************************************

    // ************************************** PAR TITRE *********************************

    public function get_livres_par_titre()
    {
        try {
            $requete = $this->bd->prepare('SELECT Titre_livre FROM livres ORDER BY Titre_livre ASC');
            $requete->execute();
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_livres_par_titre_resultat()
    {
        $choixTitre = $_POST['select_titre']; {
            try {
                $requete = $this->bd->prepare("SELECT * FROM livres WHERE Titre_livre = :a");
                $requete->execute(array(':a' => $choixTitre));
            } catch (PDOException $e) {
                die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
            }
            return $requete->fetchAll(PDO::FETCH_OBJ);
        }
    }

    // ************************************** PAR EDITEUR *********************************

    public function get_livres_par_editeur()
    {
        try {
            $requete = $this->bd->prepare('SELECT Editeur  FROM livres ORDER BY Editeur  ASC');
            $requete->execute();
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_livres_par_editeur_resultat()
    {
        $choixEditeur = $_POST['select_editeur']; {
            try {
                $requete = $this->bd->prepare("SELECT * FROM livres WHERE Editeur = :a");
                $requete->execute(array(':a' => $choixEditeur));
            } catch (PDOException $e) {
                die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
            }
            return $requete->fetchAll(PDO::FETCH_OBJ);
        }
    }

    // ----------------------------------PARTIE FOURNISSEUR UTILISISATEUR ---------------------------------------------------------------------------------------------//
    public function get_all_fournisseurs()
    {
        try {
            $requete = $this->bd->prepare('SELECT * FROM fournisseurs');
            $requete->execute();
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

       // ----------------------------------PARTIE FOURNISSEUR ADMIN ---------------------------------------------------------------------------------------------//
       public function get_all_fournisseurs_admin()
       {
           try {
               $requete = $this->bd->prepare('SELECT * FROM fournisseurs');
               $requete->execute();
           } catch (PDOException $e) {
               die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
           }
           return $requete->fetchAll(PDO::FETCH_OBJ);
       }
    // ************************************** PAR RAISON SOCIALE *********************************

    public function get_fournisseurs_par_raison_sociale()
    {
        try {
            $requete = $this->bd->prepare('SELECT Raison_sociale FROM fournisseurs ORDER BY Raison_sociale ASC');
            $requete->execute();
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_fournisseurs_par_raison_sociale_resultat()
    {
        $choixTitre = $_POST['select_raison_sociale']; {
            try {
                $requete = $this->bd->prepare("SELECT * FROM fournisseurs WHERE Raison_sociale = :a");
                $requete->execute(array(':a' => $choixTitre));
            } catch (PDOException $e) {
                die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
            }
            return $requete->fetchAll(PDO::FETCH_OBJ);
        }
    }

    // ************************************** PAR LOCALITE *********************************

    public function get_fournisseurs_par_localite()
    {
        try {
            $requete = $this->bd->prepare('SELECT Localite FROM fournisseurs ORDER BY Localite ASC');
            $requete->execute();
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_fournisseurs_par_localite_resultat()
    {
        $choixTitre = $_POST['select_localite'];
        try {
            $requete = $this->bd->prepare("SELECT * FROM fournisseurs WHERE Localite = :a");
            $requete->execute(array(':a' => $choixTitre));
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }

        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    // ----------------------------------PARTIE COMMANDES UTILISATEURS --------------------------------------------//
    public function get_all_commandes()
    {
        try {
            $requete = $this->bd->prepare('SELECT * FROM commander');
            $requete->execute();
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

        // ----------------------------------PARTIE COMMANDES ADMIN --------------------------------------------//
        public function get_all_commandes_admin()
        {
            try {
                $requete = $this->bd->prepare('SELECT * FROM commander');
                $requete->execute();
            } catch (PDOException $e) {
                die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
            }
            return $requete->fetchAll(PDO::FETCH_OBJ);
        }

    
    // ----------------------------------PARTIE LOGIN --------------------------------------------//


    public function get_login()
    {
        $mail = $_POST['E_mail'];
        $MdP = $_POST['MdP'];

        try {
            $requete = $this->bd->prepare("SELECT * FROM utilisateur WHERE E_mail = :E_mail AND MdP = :MdP");

            $requete->execute(array(  ':MdP' => $MdP,  ':E_mail' => $mail));
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage());
        }
        return $requete->fetch(PDO::FETCH_OBJ);
    }
}
