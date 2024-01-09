<?php

require_once __DIR__ . '/../../../models/Category.php';




try{
    $title = 'Liste des catégories';
    $categories = Category::getAll(); // Appel de la méthode statique getAll du modèle

}catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}




// foreach($results as $result){
//     echo `$result`;
// }

include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';