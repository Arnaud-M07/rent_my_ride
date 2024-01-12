<?php
require_once __DIR__ . '/Category.php';

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

    public function __construct(string $brand = '', string $model = '', string $registration = '', int $mileage = 0, ?string $picture = null, ?int $id_vehicle = null){
        $this->brand = $brand;
        $this->model = $model;
        $this->registration = $registration;
        $this->mileage = $mileage;
        $this->picture = $picture;
        $this->id_vehicle = $id_vehicle;
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
    public function getCreatedAt(): string{
        return $this->created_at;
    }

    // updated_at
    public function setUpdatedAt(?string $updated_at){
        $this->updated_at = $updated_at;
    }
    public function getUpdatedAt(): string{
        return $this->updated_at;
    }

    // deleted_at
    public function setDeletedAt(?string $deleted_at){
        $this->deleted_at = $deleted_at;
    }
    public function getDeletedAt(): string{
        return $this->deleted_at;
    }

    // INSERT BDD
    public function insert(){
        // Connexion BDD et envoi
        $pdo = Database::connect();
        $sql = "INSERT INTO `vehicles`(`brand`, `model`, `registration`, `mileage`, `picture`)
                VALUES(:vehicleBrand, :vehicleModel, :vehicleRegistration, :vehicleMileage, :vehiclePicture);"; // Est egal à $categoryName (sécurité)

        // Préparation de la requête
        $sth = $pdo->prepare($sql); //prepare() = permet d'eviter les injections SQL / sth = statement handle
        $sth->bindValue(':vehicleBrand', $this->getBrand());
        $sth->bindValue(':vehicleModel', $this->getModel());
        $sth->bindValue(':vehicleRegistration', $this->getRegistration());
        $sth->bindValue(':vehicleMileage', $this->getMileage());
        $sth->bindValue(':vehiclePicture', $this->getPicture());
        $result = $sth->execute();

        return $result;
    }

}
