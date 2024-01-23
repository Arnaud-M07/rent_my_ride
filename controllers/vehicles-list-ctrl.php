<?php
require_once __DIR__ . '/../models/Vehicle.php';


try {
    $title = 'Accueil';
    // Récupérer l'id de la page actuelle
    $currentPage = intval(filter_input(INPUT_GET, 'currentPage', FILTER_SANITIZE_NUMBER_INT));
    if(!isset($_GET['currentPage'])){
        $currentPage = 1;
    }

    // Définir la pagination
    // Compter le nombre de véhicule
    $nbVehicles = Vehicle::countVehicles();
    // Diviser le nbre de véhicule par le nombre de véhicules à afficher par page pour obtenir le nombre de pages
    $nbPages = ceil($nbVehicles / LIMIT);

    // Définir le calcul de l'offset
    $offset = LIMIT * ($currentPage - 1 );
    // Appel de tous les elements à partir de l'offset
    $vehicles = Vehicle::getAll($offset, true, false);

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}



include __DIR__ . '/../views/templates/front/header.php';
include __DIR__ . '/../views/templates/front/navbar.php';
include __DIR__ . '/../views/front/home.php';
include __DIR__ . '/../views/templates/front/footer.php';