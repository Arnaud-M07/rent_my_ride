<?php
require_once __DIR__ . '/../models/Vehicle.php';


try {
    $title = 'Accueil';
    // Récupérer l'id de la page actuelle
    $currentPage = intval(filter_input(INPUT_GET, 'currentPage', FILTER_SANITIZE_NUMBER_INT));

    // Définir le calcul de l'offset
    $offset = LIMIT * ($currentPage - 1 );

    // Définir la pagination
    $nbVehicles = Vehicle::countVehicles();
    $nbPages = ceil($nbVehicles / LIMIT);

    $vehicles = Vehicle::getAllPaginate($offset);

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}



include __DIR__ . '/../views/templates/front/header.php';
include __DIR__ . '/../views/templates/front/navbar.php';
include __DIR__ . '/../views/front/home.php';
include __DIR__ . '/../views/templates/front/footer.php';