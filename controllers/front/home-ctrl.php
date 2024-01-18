<?php
require_once __DIR__ . '/../../models/Vehicle.php';


try {
    $title = 'Accueil';
    $vehicles = Vehicle::getAll();

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}



include __DIR__ . '/../../views/templates/front/header.php';
include __DIR__ . '/../../views/templates/front/navbar.php';
include __DIR__ . '/../../views/front/home.php';
include __DIR__ . '/../../views/templates/front/footer.php';