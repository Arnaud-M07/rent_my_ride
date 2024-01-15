<?php
require_once __DIR__ . '/Category.php';
require_once __DIR__ . '/../config/const.php';
require_once __DIR__ . '/../helpers/Database.php';

class Vehicle{

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

    // Méthode magique construct
    public function __construct(
        string $brand = '',
        string $model = '',
        string $registration = '',
        int $mileage = 0,
        string $picture = null,
        string $created_at = null,
        string $updated_at = null,
        string $deleted_at = null,
        int $id_vehicle = null,
        int $id_category = null) {

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

    // $id_vehicles
    public function setIdVehicles(?int $id_vehicle){
        $this->id_vehicle = $id_vehicle;
    }
    public function getIdVehicles(): ?int{
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

    // INSERT BDD
    public function insert(){
        // Connexion BDD et envoi
        $pdo = Database::connect();
        $sql = "INSERT INTO `vehicles`(`brand`, `model`, `registration`, `mileage`, `picture`, `id_category`)
                VALUES(:vehicleBrand, 
                :vehicleModel, 
                :vehicleRegistration, 
                :vehicleMileage, 
                :vehiclePicture, 
                :id_category);";

        // Préparation de la requête
        $sth = $pdo->prepare($sql); //prepare() = permet d'eviter les injections SQL / sth = statement handle
        $sth->bindValue(':vehicleBrand', $this->getBrand());
        $sth->bindValue(':vehicleModel', $this->getModel());
        $sth->bindValue(':vehicleRegistration', $this->getRegistration());
        $sth->bindValue(':vehicleMileage', $this->getMileage());
        $sth->bindValue(':vehiclePicture', $this->getPicture());
        $sth->bindValue(':id_category', $this->getIdCategory());
        $result = $sth->execute();

        return $result;
    }

    // GETALL
    public static function getAll(): array {
        // Connexion BDD et récupération 
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `vehicles`'; // $sql = 'SELECT `name`, `id_category` FROM `categories`';

        $sth = $pdo->query($sql); // Prepare et execute
        $result = $sth->fetchAll(PDO::FETCH_OBJ); // Retourne un tableau d'objet

        return $result;
    }

}
