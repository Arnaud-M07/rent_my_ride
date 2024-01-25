<?php
require_once __DIR__ . '/../helpers/Database.php';

class clients {

    private ?int $id_client;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $birthday;
    private string $phone;
    private string $city;
    private string $zipcode;
    private ?string $created_at;
    private ?string $updated_at;


    public function __construct(string $lastname = '',
                                string $firstname = '',
                                string $email = '',
                                string $birthday = '',
                                string $phone = '',
                                string $city = '',
                                string $zipcode = '',
                                string $created_at = null,
                                string $updated_at = null,
                                string $id_client = null){

        $this->id_client = $id_client;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->phone = $phone;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }



    public function setIdClient(?int $id_client){
        $this->id_client = $id_client;
    }
    public function getIdClient(): ?int {
        return $this->id_client;
    }

    public function setLastname(string $lastname){
        $this->lastname = $lastname;
    }
    public function getLastname(): string{
        return $this->lastname;
    }

    public function setFirstname(string $firstname){
        $this->firstname = $firstname;
    }
    public function getFirstname(): string{
        return $this->firstname;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }
    public function getEmail(): string{
        return $this->email;
    }

    public function setBirthday(string $birthday){
        $this->birthday = $birthday;
    }
    public function getBirthday():string{
        return $this->birthday;
    }

    public function setPhone(string $phone){
        $this->phone = $phone;
    }
    public function getPhone(): string{
        return $this->phone;
    }

    public function setCity(string $city){
        $this->city = $city;
    }
    public function getCity(): string{
        return $this->city;
    }

    public function setZipCode(string $zipcode){
        $this->zipcode = $zipcode;
    }
    public function getZipCode(): string{
        return $this->zipcode;
    }

    public function setCreatedAt(?string $created_at){
        $this->created_at = $created_at;
    }
    public function getCreatedAt(): ?string{
        return $this->created_at;
    }

    public function setUpdatedAt(?string $updated_at){
        $this->updated_at = $updated_at;
    }
    public function getUpdatedAt(): ?string{
        return $this->updated_at;
    }


    // INSERT
    public function insert(): bool{
        $pdo = Database::connect();

        $sql = "INSERT INTO `client`(`lastname`, `firstname`, `email`, `birthday`, `phone`, `city`, `zipcode`)
                VALUES(:clientLastname,
                        :clientFirstname,
                        :clientEmail,
                        :clientBirthday,
                        :clientPhone,
                        :clientCity,
                        :clientZipcode)";

        $sth = $pdo->prepare($sql);

        $sth->bindValue(`:clientLastname`, $this->getLastname());
        $sth->bindValue(`:clientFirstname`, $this->getFirstname());
        $sth->bindValue(`:clientEmail`, $this->getEmail());
        $sth->bindValue(`:clientBirthday`, $this->getBirthday());
        $sth->bindValue(`:clientPhone`, $this->getPhone());
        $sth->bindValue(`:clientCity`, $this->getCity());
        $sth->bindValue(`:clientZipcode`, $this->getZipCode());

        $result = $sth->execute();
        return $result;
    }











}