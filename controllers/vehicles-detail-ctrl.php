<?php
require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Category.php';

try {
    $title = 'Modifier un véhicule';

    $id_vehicle = intval(filter_input(INPUT_GET, 'id_vehicle', FILTER_SANITIZE_NUMBER_INT));
    // $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));
    $vehicle = Vehicle::get($id_vehicle);
    // $category = Category::get($vehicle->id_category);

    // var_dump($category);




} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}



include __DIR__ . '/../views/templates/front/header.php';
include __DIR__ . '/../views/templates/front/navbar.php';
include __DIR__ . '/../views/front/detail.php';
include __DIR__ . '/../views/templates/front/footer.php';