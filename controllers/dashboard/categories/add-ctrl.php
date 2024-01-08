<?php
require_once __DIR__ . '/../../../config/const.php';

$servername = "localhost"; // localhost
$dbname = "rent_my_ride"; // rent_my_ride
$username = "Arnaud_M_rent_my_ride"; // Arnaud_M_rent_my_ride
$password = "F#N7Lc&5dd53yXsz"; // F#N7Lc&5dd53yXsz


if($_SERVER['REQUEST_METHOD'] =='POST'){
    // Tableau d'erreurs
    $error = [];
    $adToBdd = [];
    // CATEGORY INPUT
    $category = filter_input(INPUT_POST,'category', FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($category)){
        $error['category'] = 'Veuillez renseigner une catégorie à ajouter.';
    } else {
        $isOk = filter_var($category, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.CATEGORY.'/')));
        if(!$isOk){
            $error['category'] = 'La catégorie renseigné n\'est pas valide.';
        } else {
            // BDD
            try {
                // Connexion BDD
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connexion réussie";

                // Envoi BDD
                $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // Requête SQL d'insertion dans la table 'categories'
                $sql = "INSERT INTO categories(name)
                VALUES('$category')";
        
                $dbco->exec($sql);
                $addToBdd['category'] = 'Entrée ajoutée dans la table';
                // echo 'Entrée ajoutée dans la table';

            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }

        }
    }
}


include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';

