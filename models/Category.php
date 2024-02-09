<?php
require_once __DIR__ . '/../helpers/Database.php';

class Category
{
    // ATTRIBUTS
    private ?int $id_category;
    private string $name;


    // METHODE CONSTRUCT
    public function __construct(string $name = '', ?int $id_category = NULL)
    {
        $this->id_category = $id_category;
        $this->name = $name;
    }


    // METHODE SETTERS / GETERS
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setIdCategory(?int $id_category)
    {
        $this->id_category = $id_category;
    }
    public function getIdCategory(): ?int
    {
        return $this->id_category;
    }



    // INSERT
    // MÉTHODE PERMETTANT L'ENREGISTREMENT D'UNE NOUVELLE CATÉGORIE
    public function insert(): bool
    {
        // Création d'une variable recevant un objet issu de la classe PDO
        $pdo = Database::connect();
        // Requête contenant un marqueur nominatif
        $sql = "INSERT INTO `categories` (`name`)
                VALUES(:categoryName);";
        // Si marqueur nominatif, il faut préparer la requête //prepare() = permet d'eviter les injections SQL / sth = statement handle
        $sth = $pdo->prepare($sql);
        // Affectation de la valeur correspondant au marqueur nominatif concerné
        $sth->bindValue(':categoryName', $this->getName());
        // Exécution de la requête
        $result = $sth->execute();
        // Retourne true dans le cas contraire (tout s'est bien passé)
        return $result;
    }



    // GETALL
    // MÉTHODE PERMETTANT DE RÉCUPÉRER LA LISTE DE CATÉGORIES SOUS FORME DE TABLEAU D'OBJET
    public static function getAll(): array
    {
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `categories`';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }



    // GET
    // MÉTHODE PERMETTANT DE RÉCUPÉRER UN OBJET STANDARD AVEC POUR PROPRIÉTÉS, LES COLONNES SELECTIONNÉES
    public static function get(int $id): object | false
    {
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `categories`
                WHERE `id_category` = :id_category';
        // Si marqueur nominatif, il faut préparer la requête
        $sth = $pdo->prepare($sql);
        // Affectation de la valeur correspondant au marqueur nominatif concerné
        $sth->bindValue(':id_category', $id, PDO::PARAM_INT);
        // Exécution de la requête
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ); // Va chercher la table et la retourne sous forme d'objet
        return $result;
    }


    // UPDATE
    // MÉTHODE PERMETTANT L'ENREGISTREMENT DE LA MISE À JOUR D'UNE CATÉGORIE
    public function update()
    {
        // Création d'une variable recevant un objet issu de la classe PDO
        $pdo = Database::connect();
        // Requête contenant un marqueur nominatif
        $sql = "UPDATE `categories`
            SET `name` = :categoryName
            WHERE `id_category` = :id_category";
        // Si marqueur nominatif, il faut préparer la requête
        $sth = $pdo->prepare($sql);
        // Affectation de la valeur correspondant au marqueur nominatif concerné
        $sth->bindValue(':categoryName', $this->getName());
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT); // Récupération de l'id passé en URL
        $result = $sth->execute();
        return $result;
    }



    // DELETE
    // MÉTHODE PERMETTANT LA SUPPRESSION D'UNE CATÉGORIE
    public static function delete(int $id_category)
    {
        $pdo = Database::connect();
        $sql = "DELETE FROM `categories`
                WHERE `id_category` = :id_category";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);
        $result = $sth->execute();
        return $result;
    }



    // ISEXIST
    // MÉTHODE PERMETTANT DE SAVOIR SI UNE CATÉGORIE EXISTE DÉJÀ OU NON
    public static function isExist(string $categoryName): bool
    {
        $pdo = Database::connect();
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
