<?php
require_once __DIR__ . '/Category.php';
require_once __DIR__ . '/../config/const.php';
require_once __DIR__ . '/../helpers/Database.php';

class Vehicle
{
    // ATTRIBUTS
    private ?int $id_vehicle;
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private ?string $picture;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;
    private ?int $id_category;


    // METHODE CONSTRUCT
    public function __construct(string $brand = '', string $model = '', string $registration = '', int $mileage = 0, string $picture = null, string $created_at = null, string $updated_at = null, string $deleted_at = null, int $id_vehicle = null, int $id_category = null)
    {
        $this->id_category = $id_category;
        $this->id_vehicle = $id_vehicle;
        $this->brand = $brand;
        $this->model = $model;
        $this->registration = $registration;
        $this->mileage = $mileage;
        $this->picture = $picture;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
    }


    // METHODE SETTERS / GETERS
    // $id_vehicles
    public function setIdVehicle(?int $id_vehicle){
        $this->id_vehicle = $id_vehicle;
    }
    public function getIdVehicle(): ?int{
        return $this->id_vehicle;
    }

    // $brand
    public function setBrand(string $brand){
        $this->brand = $brand;
    }
    public function getBrand(): string{
        return $this->brand;
    }

    // $model
    public function setModel(string $model){
        $this->model = $model;
    }
    public function getModel(): string{
        return $this->model;
    }

    // $registration
    public function setRegistration(string $registration){
        $this->registration = $registration;
    }
    public function getRegistration(): string{
        return $this->registration;
    }

    // $mileage
    public function setMileage(int $mileage){
        $this->mileage = $mileage;
    }
    public function getMileage(): int{
        return $this->mileage;
    }

    // $picture
    public function setPicture(?string $picture){
        $this->picture = $picture;
    }
    public function getPicture(): ?string{
        return $this->picture;
    }

    // created_at
    public function setCreatedAt(?string $created_at){
        $this->created_at = $created_at;
    }
    public function getCreatedAt(): ?string{
        return $this->created_at;
    }

    // updated_at
    public function setUpdatedAt(?string $updated_at){
        $this->updated_at = $updated_at;
    }
    public function getUpdatedAt(): ?string{
        return $this->updated_at;
    }

    // deleted_at
    public function setDeletedAt(?string $deleted_at){
        $this->deleted_at = $deleted_at;
    }
    public function getDeletedAt(): ?string{
        return $this->deleted_at;
    }

    // id_category
    public function setIdCategory(int $id_category){
        $this->id_category = $id_category;
    }
    public function getIdCategory(): int{
        return $this->id_category;
    }



    // INSERT
    // MÉTHODE PERMETTANT L'ENREGISTREMENT D'UN NOUVEAU VÉHICULE
    public function insert(): bool
    {
        // Création d'une variable recevant un objet issu de la classe PDO
        $pdo = Database::connect();
        // Requête contenant des marqueurs nominatifs
        $sql = "INSERT INTO `vehicles`(`brand`, `model`, `registration`, `mileage`, `picture`, `id_category`)
                VALUES(:vehicleBrand,
                :vehicleModel,
                :vehicleRegistration,
                :vehicleMileage,
                :vehiclePicture,
                :id_category);";
        // Si marqueur nominatif, il faut préparer la requête //prepare() = permet d'eviter les injections SQL / sth = statement handle
        $sth = $pdo->prepare($sql);
        // Affectation des valeurs correspondantes aux marqueurs nominatifs concernés
        $sth->bindValue(':vehicleBrand', $this->getBrand());
        $sth->bindValue(':vehicleModel', $this->getModel());
        $sth->bindValue(':vehicleRegistration', $this->getRegistration());
        $sth->bindValue(':vehicleMileage', $this->getMileage(), PDO::PARAM_INT);
        $sth->bindValue(':vehiclePicture', $this->getPicture());
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);
        // 4 Possibilités d'éxecution :
        // *1
        $result = $sth->execute();
        return $result;
        // *2
        // $nbrows = $sth->rowCount();
        // return $nbrows > 0 ? true : false
        // *3
        // return $sth->rowCount() > 0;
        // *4
        // return (bool) $sth->rowCount();
    }
    // GETALL
    public static function getAll(int $offset = 0, bool $paginate = false, bool $isArchived = false, int $id_category = 0, string $search = NULL): array|false
    {
        $pdo = Database::connect();
        // Ajout du nom de la catégorie dans la class Vehicles / Liaison de la clé primaire à la clé trangère.
        //( , `categories`.`name` AS `categoryName` ) -> Renomage de la variable
        $sql = 'SELECT *
                FROM `vehicles`
                INNER JOIN `categories` ON `categories`.`id_category` = `vehicles`.`id_category`';
        $sql .= ' WHERE 1 = 1';

        if($isArchived){
            $sql .= ' AND `vehicles`.`deleted_at` IS NOT NULL' ;
        } else {
            $sql .= ' AND `vehicles`.`deleted_at` IS NULL' ;
        }
        // FILTRE
        if ($id_category !== 0) {
            $sql .= ' AND `vehicles`.`id_category` = :id_category';
        }
        // SEARCH
        if($search !== NULL){
            $sql .= ' AND (`vehicles`.`brand` LIKE :search OR `vehicles`.`model` LIKE :search OR `categories`.`name` LIKE :search)';
        }
        // Ajoute la condition pour paginer si $paginate est TRUE
        if ($paginate) {
            $sql .= " LIMIT " . NB_ELEMENT_PER_PAGE . " OFFSET :offset";
        }

        // var_dump($sql);
        $sth = $pdo->prepare($sql);

        if ($id_category !== 0) {
            $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);
        }
        if ($paginate) {
            $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
        }
        // SEARCH
        if($search !== NULL){
            $sth->bindValue(':search', "%$search%");
        }

        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ); // Retourne un tableau d'objet
        return $result;
    }



    // COUNT VEHICLES
    public static function countVehicles(int $id_category = 0, ?bool $isArchived = false, string $search = NULL): int
    {
        $pdo = Database::connect();
        $sql = 'SELECT COUNT(`id_vehicle`)
                FROM `vehicles`
                INNER JOIN `categories` ON `categories`.`id_category` = `vehicles`.`id_category`';
        $sql .= ' WHERE 1 = 1';

        // Ajouter la condition pour la catégorie si elle est spécifiée
        if ($id_category !== 0) {
            $sql .= ' AND `id_category` = :id_category';
        }
        if($isArchived){
            $sql .= ' AND `vehicles`.`deleted_at` IS NOT NULL' ;
        } else {
            $sql .= ' AND `vehicles`.`deleted_at` IS NULL' ;
        }
        // SEARCH
        if($search !== NULL){
            $sql .= ' AND (`vehicles`.`brand` LIKE :search OR `vehicles`.`model` LIKE :search OR `categories`.`name` LIKE :search)';
        }

        $sth = $pdo->prepare($sql);

        // Binder la valeur de la catégorie si elle est spécifiée
        if ($id_category !== 0) {
            $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);
        }
        // SEARCH
        if($search !== NULL){
            $sth->bindValue(':search', "%$search%");
        }

        // var_dump($sql);
        $sth->execute();
        $result = $sth->fetchColumn();

        return $result;
    }



    // GET
    // Récupère toutes les colonnes de la table 'vehicles' en fonction de l'id du véhicule
    public static function get(int $id): object | false
    {
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `vehicles`
                INNER JOIN `categories` ON `categories`.`id_category` = `vehicles`.`id_category`
                WHERE `id_vehicle` = :id_vehicle';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicle', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ); // Va chercher la table et la retourne sous forme d'objet

        return $result;
    }
    // UPDATE
    // Modifier le nom du véhicule selon l'ID passé en URL
    public function update()
    {
        // Connexion BDD
        $pdo = Database::connect();
        // Requête SQL de sélection dans la table 'vehicles'
        $sql = "UPDATE `vehicles`
            SET `brand` = :vehicleBrand,
                `model` = :vehicleModel,
                `registration` = :vehicleRegistration,
                `mileage` = :vehicleMileage,
                `picture` = :vehiclePicture,
                `id_category` = :id_category
            WHERE `id_vehicle` = :id_vehicle";

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':vehicleBrand', $this->getBrand());
        $sth->bindValue(':vehicleModel', $this->getModel());
        $sth->bindValue(':vehicleRegistration', $this->getRegistration());
        $sth->bindValue(':vehicleMileage', $this->getMileage(), PDO::PARAM_INT);
        $sth->bindValue(':vehiclePicture', $this->getPicture());
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT); // Récupération de l'id passé en URL
        $sth->bindValue(':id_vehicle', $this->getIdVehicle(), PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }
    // ARCHIVE
    // Faire une méthode Archive ajoutant le timestamp dans la colonne deleted_at.
    // Si deleted_at, ne pas récupérer dans le getAll.
    public static function archive(int $id): bool
    {
        // Récupértion de l'id du véhicule
        $objVehicle = self::get($id);
        // Récupération de la valeur de la colonne deleted_at
        $deletedAt = $objVehicle->deleted_at;
        // Si deleted_at est NULL, alors on peut l'archiver
        if ($deletedAt == NULL) {
            $archive = 'NOW()';
        } else {
            $archive = 'NULL';
        }
        $pdo = Database::connect();
        $sql = "UPDATE `vehicles`
            SET `deleted_at` = " . $archive . "
            WHERE `id_vehicle` = :id_vehicle";

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicle', $id, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }
    // DELETE
    // Supprimer une entrée dans une table
    public static function delete(int $id): bool
    {
        $pdo = Database::connect();
        // Requête SQL
        $sql = "DELETE FROM `vehicles`
                WHERE `id_vehicle` = :id_vehicle";

        $sth = $pdo->prepare($sql); // Prepare est une methode appartenant à la classe PDO, elle attend une chaine de caractère en paramètre d'entrée. Elle retourne un objet de type PDOStatement
        $sth->bindValue(':id_vehicle', $id, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }
    // ISEXIST
    public static function isExist(string $registration): bool
    {
        $pdo = Database::connect(); //On fait appel à la methode static connect() qui appartient à la classe Database. Elle repond un objet de type PDO.
        // Requête SQL
        $sql = 'SELECT COUNT(`id_vehicle`) AS `nbcolumn`
                FROM `vehicles`
                WHERE `registration` = :registration';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':registration', $registration);
        $sth->execute();
        $result = $sth->fetchColumn();

        return ($result > 0); // Si c'est suppérieur à 0 alors c'est TRUE

    }


}
