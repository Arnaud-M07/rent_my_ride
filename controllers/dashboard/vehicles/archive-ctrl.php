<?php
session_start(); // Passage de la donnée $msg via la session

require_once __DIR__ . "/../../../models/Vehicle.php";
require_once __DIR__ . "/../../../config/const.php";

try {

    $id_vehicle = intval(filter_input(INPUT_GET, 'id_vehicle', FILTER_SANITIZE_NUMBER_INT));

    $isDeleted = Vehicle::archive($id_vehicle);

    if ($isDeleted) {
        $msg = 'Le véhicule a été archivé';
    } else {
        $msg = 'Erreur, Le véhicule n\'a pas été désarchivé';
    }
    $_SESSION['msg'] = $msg;
    // Passage de la donnée par l'URL
    // header('Location: /controllers/dashboard/categories/list-ctrl.php?msg='.$msg);
    // Passage de la donnée via $_SESSION
    header('Location: /controllers/dashboard/vehicles/list-ctrl.php');

    die;
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}