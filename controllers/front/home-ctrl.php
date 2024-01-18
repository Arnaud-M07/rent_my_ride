<?php
require_once __DIR__ . '/../../models/Vehicle.php';


try {
    $title = 'Accueil';
    $vehicles = Vehicle::getAll();

    // On détermine sur quelle page on se trouve
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = (int) strip_tags($_GET['page']);
    }else{
        $currentPage = 1;
    }

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}



include __DIR__ . '/../../views/templates/front/header.php';
include __DIR__ . '/../../views/templates/front/navbar.php';
include __DIR__ . '/../../views/front/home.php';
include __DIR__ . '/../../views/templates/front/footer.php';