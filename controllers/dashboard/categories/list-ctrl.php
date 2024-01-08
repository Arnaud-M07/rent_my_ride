<?php

require_once __DIR__ . '/../../../models/Category.php';




try{
    $title = 'Liste des catégories';
    // Instanciation de la classe du modèle (remplacez 'NomDeVotreModele' par le nom de votre classe modèle)
    $category = new Category();
    // Appel de la méthode getAll du modèle
    $results = $category->getAll();

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