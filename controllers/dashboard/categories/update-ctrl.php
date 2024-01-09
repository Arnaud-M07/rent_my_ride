<?php

require_once __DIR__ . '/../../../models/Category.php';
$title = 'Modifier une catégorie';

try{

    $id_category = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)); // intval : transform l donnée en entier (sécurité)

    $category = Category::get($id_category);
    
    if(!$category){
        header('Location: /controllers/dashboard/categories/list-ctrl.php');
        die;
    }
    // var_dump($category->name);
    // var_dump($id_category);

    // Mettre la valeur dans l'input


}catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}













include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';