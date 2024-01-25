<?php
require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Category.php';


try {
    $title = 'Liste de véhicules';
    $categories = Category::getAll();
    $isArchived=false;

    // Récupérer le numéro de page actuel depuis l'URL
    $currentPage = intval(filter_input(INPUT_GET, 'currentPage', FILTER_SANITIZE_NUMBER_INT));
    // Récupérer l'ID de la catégorie depuis l'URL
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));
    // Récupérer la valeur de la recherche
    $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);

    // Compter le nombre de véhicules en fonction de la catégorie sélectionnée et/ou si une recherche est effectuée
    $nbVehicles = Vehicle::countVehicles($id_category, $isArchived, $search);

    // Pagination
    $nbPages = ceil($nbVehicles / NB_ELEMENT_PER_PAGE);
    if (($currentPage <= 0) || ($currentPage > $nbPages)) {
        $currentPage = 1;
    }
    // Calculer l'offset pour la pagination
    $offset = NB_ELEMENT_PER_PAGE * ($currentPage - 1);

    // Obtenir les véhicules en fonction de la pagination et des filtres de catégorie
    $vehicles = Vehicle::getAll($offset, true, false, $id_category, search: $search);


} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}



include __DIR__ . '/../views/templates/front/header.php';
include __DIR__ . '/../views/templates/front/navbar.php';
include __DIR__ . '/../views/front/list.php';
include __DIR__ . '/../views/templates/front/footer.php';