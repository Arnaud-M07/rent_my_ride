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
    public static function getAll(): array {
        // Connexion BDD et récupération 
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `categories`'; // $sql = 'SELECT `name`, `id_category` FROM `categories`';
        $sth = $pdo->query($sql); // Prepare et execute
        $result = $sth->fetchAll(PDO::FETCH_OBJ); // Retourne un tableau d'objet
        
        return $result;
    }

    // GET
    // Récupérer l'id depuis l'URL
    public static function get(int $id): object | false {
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `categories`
                WHERE `id_category` = :id_category';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_category', $id, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);
        
        return $result;
    }

    // UPDATE
    public function update(int $id_category){
        // Connexion BDD
        $pdo = Database::connect();
        // Requête SQL de sélection dans la table 'categories'
        $sql = "UPDATE `categories`
            SET `name` = :categoryName
            WHERE `id_category` = :id_category";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':categoryName', $this->getName());
        $sth->bindValue(':id_category', $id_category);
        $result = $sth->execute();
        
        return $result;
    }

}