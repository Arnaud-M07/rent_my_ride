<?php
require_once __DIR__ . '/../config/const.php';
require_once __DIR__ . '/../helpers/Database.php';

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

    // INSERT BDD
    public function insert(){
        // Connexion BDD et envoi
        $pdo = Database::connect();
        $sql = "INSERT INTO `categories`(`name`)
                VALUES(:categoryName);"; // Est egal à $categoryName (sécurité)

        // Préparation de la requête
        $sth = $pdo->prepare($sql); //prepare() = permet d'eviter les injections SQL / sth = statement handle
        $sth->bindValue(':categoryName', $this->getName());
        $result = $sth->execute();

        return $result;
    }

    // GETALL
    public static function getAll():array{
        // Connexion BDD et récupération 
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `categories`'; // $sql = 'SELECT `name`, `id_category` FROM `categories`';
        $sth = $pdo->query($sql); // Prepare et execute
        $result = $sth->fetchAll(PDO::FETCH_OBJ); // Retourne un tableau d'objet
        
        return $result;
    }

    // UPDATE
    // public function update(){
    //     // Connexion BDD
    //     $pdo = new PDO(DSN, USER, PASSWORD);
    //     // On définit le mode d'erreur de PDO sur Exception
    //     // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     // Requête SQL de sélection dans la table 'categories'
    //     $sql = "UPDATE `categories`
    //             SET `name`='$category['name']'
    //             WHERE `id_category`=`$category['id_category']`";
    //     $sth = $pdo->prepare($sql);
    //     $sth->execute();
        
    // }

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