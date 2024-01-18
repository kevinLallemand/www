<?php

class Personnage extends Database
{
    //Attribut
    public $id;
    public $name;
    public $atk;
    public $life;
    public $color;
    public $csrf_token;
    /**
     * Method construct qui ce connecte a ma base de données
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Method qui retourne un TOKEN 
     * @return HASH
     */
    public function generateCSRFToken()
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Method qui sert a inserer un nouveau user
     * @return requete INSERT
     */
    public function addPersonnage()
    {
        $insert = 'INSERT INTO `personnages` (`name`, `atk`, `life`, `color`, `csrf_token`) VALUES (:name, :atk, :life, :color, :csrf_token);';
        $insertPersonnage = $this->db->prepare($insert);
        $insertPersonnage->bindValue(':name', $this->name, PDO::PARAM_STR);
        $insertPersonnage->bindValue(':atk', $this->atk, PDO::PARAM_INT);
        $insertPersonnage->bindValue(':life', $this->life, PDO::PARAM_INT);
        $insertPersonnage->bindValue(':color', $this->color, PDO::PARAM_STR);
        $insertPersonnage->bindValue(':csrf_token', $this->generateCSRFToken(), PDO::PARAM_STR);
    
        // Use try-catch block to catch any PDOExceptions
        try {
            return $insertPersonnage->execute();
        } catch (PDOException $e) {
            // Handle the exception, you might want to log or display an error message
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Method qui permet de recuperer les infos d'un personnage via son nom
     */
    public function getAllPersonnages()
    {
        $query = 'SELECT * FROM `personnages`;';
        $fetchAllPersonnages = $this->db->query($query);
    
        // Fetch all personnage entries
        $allPersonnages = $fetchAllPersonnages->fetchAll(PDO::FETCH_OBJ);
    
        // Check if any personnage exists
        if ($allPersonnages) {
            return $allPersonnages;
        } else {
            return 'Aucun personnage n\'existe en base de données. Veuillez créer un personnage.';
        }
    }

    /**
     * Method qui permet de recuperer les infos d'un personnage via son nom
     */
    public function getPersonnageName()
    {
        $query = 'SELECT * FROM `personnages` WHERE `name`=:name;';
        $fetchProfil = $this->db->prepare($query);
        $fetchProfil->bindValue(':name', $this->name, PDO::PARAM_STR);
        $fetchProfil->execute();
        return $fetchProfil->fetch(PDO::FETCH_OBJ);
    }
    
    /**
     * Method qui permet de recuperer les infos d'un personnage via son id
     */
    public function getPersonnageDetails($id)
    {
        $query = 'SELECT * FROM `personnages` WHERE `id` = :id;';
        $fetchPersonnageDetails = $this->db->prepare($query);
        $fetchPersonnageDetails->bindValue(':id', $id, PDO::PARAM_INT);
        $fetchPersonnageDetails->execute();
    
        // Fetch the personnage details
        $personnageDetails = $fetchPersonnageDetails->fetch(PDO::FETCH_OBJ);
    
        return $personnageDetails;
    }

    /**
     * Method qui permet de modifer les infos d'un personnage via son id
     */

public function updatePersonnage($id, $newAtk, $newLife, $newColor)
{
    $updateQuery = 'UPDATE `personnages` SET `atk` = :atk, `life` = :life, `color` = :color WHERE `id` = :id;';
    $updateStatement = $this->db->prepare($updateQuery);
    $updateStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $updateStatement->bindValue(':atk', $newAtk, PDO::PARAM_INT);
    $updateStatement->bindValue(':life', $newLife, PDO::PARAM_INT);
    $updateStatement->bindValue(':color', $newColor, PDO::PARAM_STR);

    try {
        return $updateStatement->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//création de la Méthode deadAttack
public function deadAttack() {
    $this->life = 0;
}
//création de la Méthode isAlive
public function isAlive() {
    if ($this->life > 0) {
        return $this->name . " est vivant.";
    } else {
        return $this->name . " est mort.";
    }
}

//création de la Méthode pour effectuer une attaque puissante (90% de la vie en moins)
public function attack($cible) {
    return $cible->life -= $this->atk; // Retire la valeur d'attaque de l'attaquant de la vie de la cible
}
//création de la Méthode pour effectuer une attaque contre une cible
public function regenerate() {
if ($this->life <= 0) {
//création de la Méthode pour Régénérer le personnage en lui redonnant une certaine quantité de vie (par exemple, 100 dans cet exemple)
    $this->life = 100;
}}
//création de la Méthode pour faire courir le personnage
    public function courir() {
        return " est en train de courir";
    }

//création de la Méthode pour faire marcher le personnage
    public function marcher() {
        return " est en train de marcher";
    }}
//création de l'objet Action pour affiché l'état de l'action des personnages
class Action {
    public function action1() {
//création de la Méthode vide
    }

public function action2() {
        //création de la Méthode vide
    }
}

// Instanciation de la classe Action
$action = new Action();

// Appel des méthodes de la classe Action
$action->action1();
$action->action2();

