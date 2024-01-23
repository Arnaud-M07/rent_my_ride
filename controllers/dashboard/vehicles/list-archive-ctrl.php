<?php
session_start();
require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $archived = true;

    $title = 'Liste des véhicules archivés';
    $page = 'vehicles';
    $vehicles = Vehicle::getAll(0, false, $archived);

    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    }

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';