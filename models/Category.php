<?php
require_once __DIR__ . '/../config/const.php';

class Category{
    // ATTRIBUTS
    private ?int $id_category;
    private string $name;

    // METHODES
    // CONSTRUCT
    public function __construct(string $name = '', ?int $id_category = null){
        $this->id_category = $id_category;
        $this->name = $name;
    }

    // SETTERS / GETTERS
    // $name
    public function setName(string $name){
        $this->name = $name;
    }
    public function getName(): string{
        return $this->name;
    }

    // $idCategory
    public function setIdCategory(?int $id_category){
        $this->id_category = $id_category;
    }
    public function getIdCategory(): ?int{
        return $this->id_category;
    }


    public function insert(){
        // Connexion BDD
        $pdo = new PDO(DSN, USER, PASSWORD);
        //On définit le mode d'erreur de PDO sur Exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connexion réussie";

        // Envoi BDD
        // Requête SQL d'insertion dans la table 'categories'
        $sql = "INSERT INTO `categories`(`name`)
                VALUES(:categoryName);"; // Est egal à $categoryName (sécurité)

        // Préparation de la requête
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':categoryName', $this->getName());
        $result = $sth->execute();

        return $result;
    }

    // GetALL
    public function getAll(){
        // Connexion BDD
        $pdo = new PDO(DSN, USER, PASSWORD);
        // On définit le mode d'erreur de PDO sur Exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Requête SQL de sélection dans la table 'categories'
        $sql = 'SELECT `id_category`,`name`
                FROM `categories`';
        // Préparation de la requête
        $sth = $pdo->prepare($sql);
        // // Exécution de la requête
        $sth->execute();
        // // Récupération des résultats
        $result = $sth->fetchAll();

        // // Retourne le tableau de catégories
        return $result;
    }
}



// $berline = new Category(null, 'berline');
// $berline->setName('berline')


        $pdo = new PDO(DSN, USER, PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Requête SQL de sélection dans la table 'categories'
        $sql = 'SELECT `id_category`, name FROM `categories`';
        // Préparation de la requête
        $sth = $pdo->prepare($sql);
        // // Exécution de la requête
        $sth->execute();
        // // Récupération des résultats
        $result = $sth->fetchAll();
        // // Retourne le tableau de catégories
        return $result;