<?php
require_once __DIR__ . '/Category.php';

class Vehicles{

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
    // updated_at
    // deleted_at
}
