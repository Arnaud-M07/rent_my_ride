<?php

include __DIR__ . '../views/dashboard/categories/add.php';



$servername = "localhost"; // localhost
$dbname = "rent_my_ride"; // rent_my_ride
$username = "username"; // Arnaud_M_rent_my_ride
$password = "password"; // F#N7Lc&5dd53yXsz


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
