<?php
require_once __DIR__ . "/../helpers/Database.php";

class Rent {

    private int $id_rent;
    private string $startdate;
    private string $enddate;
    private string $created_at;
    private string $confirmed_at;
    private int $id_vehicle;
    private int $id_client;

    public function __construct(int $id_rent = 0,
                                string $startdate = '',
                                string $enddate = '',
                                string $created_at = '',
                                string $confirmed_at = '',
                                int $id_vehicle = 0,
                                int $id_client = 0)
                                {
        $this->id_rent = $id_rent;
        $this->startdate = $startdate;
        $this->enddate = $enddate;
        $this->created_at = $created_at;
        $this->confirmed_at = $confirmed_at;
        $this->id_vehicle = $id_vehicle;
        $this->id_client = $id_client;
    }

    public function setIdRent(int $id_rent){
        $this->id_rent = $id_rent;
    }
    public function getIdRent(): int{
        return $this->id_rent;
    }

    public function setStartdate(string $startdate){
        $this->startdate = $startdate;
    }
    public function getStartdate(): string{
        return $this->startdate;
    }

    public function setEnddate(string $enddate){
        $this->enddate = $enddate;
    }
    public function getEnddate(): string{
        return $this->enddate;
    }

    public function setCreatedAt(string $created_at){
        $this->created_at = $created_at;
    }
    public function getCreatedAt(): string{
        return $this->created_at;
    }

    public function setConfirmedAt(string $confirmed_at){
        $this->confirmed_at = $confirmed_at;
    }
    public function getConfirmedAt(): string{
        return $this->confirmed_at;
    }

    public function setIdVehicle(int $id_vehicle){
        $this->id_vehicle = $id_vehicle;
    }
    public function getIdVehicle(): int{
        return $this->id_vehicle;
    }

    public function setIdClient(int $id_client){
        $this->id_client = $id_client;
    }
    public function getIdClient(): int{
        return $this->id_client;
    }


    public function insert(){
        $pdo = Database::connect();

        $sql = "INSERT INTO `rent` (`startdate`, `enddate`,`id_vehicle`, `id_client`)
        VALUES (:rentStartdate,
                :rentEnddate,
                :id_vehicle,
                :id_client);";

        $sth = $pdo->prepare($sql);

        $sth->bindValue(`:rentStartdate`, $this->getStartdate());
        $sth->bindValue(`:rentEnddate`, $this->getEnddate());
        $sth->bindValue(`:id_vehicle`, $this->getIdVehicle());
        $sth->bindValue(`:id_client`, $this->getIdClient());

        $result = $sth->execute();
        return $result;
    }

}
