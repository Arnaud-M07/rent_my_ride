<?php
require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Category.php';


try {
    $title = 'Accueil';
    $categories = Category::getAll();

    // Récupérer le numéro de page actuel depuis l'URL
    $currentPage = intval(filter_input(INPUT_GET, 'currentPage', FILTER_SANITIZE_NUMBER_INT));
    // Récupérer l'ID de la catégorie depuis l'URL
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));


    // Compter le nombre de véhicules en fonction de la catégorie sélectionnée
    if ($id_category !== 0) {
        $nbVehicles = Vehicle::countVehicles($id_category);
    } else {
        $nbVehicles = Vehicle::countVehicles();
    }
    // Si aucune catégorie n'est choisie, définir id_category à null et affiche donc tous les véhicules
    if($id_category !== 0){
        $id_category = $id_category;
    } else {
        $id_category = null;
    }


    // Calculer le nombre de pages nécessaires pour la pagination
    $nbPages = ceil($nbVehicles / NB_ELEMENT_PER_PAGE);

    // Définir la page actuelle à 1 si elle n'est pas fournie dans l'URL
    if ($currentPage <= 0) {
        $currentPage = 1;
    }
    // S'assurer que la page actuelle ne dépasse pas le nombre total de pages
    if ($currentPage > $nbPages) {
        $currentPage = $nbPages;
    }

    // Calculer l'offset pour la pagination
    $offset = NB_ELEMENT_PER_PAGE * ($currentPage - 1);


    // Obtenir les véhicules en fonction de la pagination et des filtres de catégorie
    $vehicles = Vehicle::getAll($offset, true, false, $id_category);


} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}



include __DIR__ . '/../views/templates/front/header.php';
include __DIR__ . '/../views/templates/front/navbar.php';
include __DIR__ . '/../views/front/list.php';
include __DIR__ . '/../views/templates/front/footer.php';