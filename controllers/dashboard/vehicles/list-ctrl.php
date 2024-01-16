<?php
require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $title = 'Liste des véhicules';
    $page = 'vehicles'; 
    $vehicles = Vehicle::getAll();
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';