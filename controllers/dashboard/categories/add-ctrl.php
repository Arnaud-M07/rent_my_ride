<?php

require_once __DIR__ . '/../../../config/const.php';


// CATEGORY INPUT
$category = filter_input(INPUT_POST,'category', FILTER_SANITIZE_SPECIAL_CHARS);
if(empty($category)){
    $error['category'] = 'Veuillez renseigner une catégorie à ajouter.';
} else {
    $isOk = filter_var($category, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.CATEGORY.'/')));
    // $isOK = preg_match('/^[A-Za-zéèëêçà]{2,50}(-| )?([A-Za-zéèçà]{2,50})?$/', $_POST['category']);
    if(!$isOk){
        $error['category'] = 'La catégorie renseigné n\'est pas valide.';
    }
}



include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';





// $servername = "localhost"; // localhost
// $dbname = "rent_my_ride"; // rent_my_ride
// $username = "username"; // Arnaud_M_rent_my_ride
// $password = "password"; // F#N7Lc&5dd53yXsz


// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
