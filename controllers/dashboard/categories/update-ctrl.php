<?php

require_once __DIR__ . '/../../../models/Category.php';


try{
    $title = 'Modifier une catégorie';
    // Instanciation de la classe du modèle (remplacez 'NomDeVotreModele' par le nom de votre classe modèle)
    $category = new Category();
    // À remplacer par les valeu

    // Appel de la méthode update du modèle avec les paramètres nécessaires
    $category->update($id_category, $new_name);


}catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}











include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';