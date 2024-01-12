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
    // Récupère toutes les colonnes de la table 'categories' en fonction de l'id de la catégorie
    public static function get(int $id): object | false {
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `categories`
                WHERE `id_category` = :id_category';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_category', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ); // Va chercher la table et la retourne sous forme d'objet
        
        return $result;
    }

    // UPDATE
    // Modifier le nom de la catégorie selon l'ID passé en URL
    public function update(){
        // Connexion BDD
        $pdo = Database::connect();
        // Requête SQL de sélection dans la table 'categories'
        $sql = "UPDATE `categories`
            SET `name` = :categoryName
            WHERE `id_category` = :id_category";

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':categoryName', $this->getName());
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT); // Récupération de l'id passé en URL
        $result = $sth->execute();

        return $result;
    }

    // DELETE
    // Supprimer une entrée dans une table
    public static function delete(int $id){
        $pdo = Database::connect();
        // Requête SQL
        $sql = "DELETE FROM `categories`
                WHERE `id_category` = :id_category";

        $sth = $pdo->prepare($sql); // Prepare est une methode appartenant à la classe PDO, elle attend une chaine de caractère en paramètre d'entrée. Elle retourne un objet de type PDOStatement
        $sth->bindValue(':id_category', $id, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }

    // ISEXIST
    // Vérifie si une entrée existe déja dans la table
    public static function isExist(string $categoryName): bool{
        $pdo = Database::connect(); //On fait appel à la methode static connect() qui appartient à la classe Database. Elle repond un objet de type PDO.
        // Requête SQL
        $sql = 'SELECT COUNT(*) AS `nbcolumn`
                FROM `categories`
                WHERE `name` = :categoryName';
        
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetchColumn();
        
        return ($result > 0);
        
    }       
}