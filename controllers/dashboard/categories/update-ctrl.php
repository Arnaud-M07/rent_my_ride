<?php
require_once __DIR__ . '/../../../config/const.php';
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Tableau d'erreurs
        $error = [];
        $addToDB = [];
        // CATEGORY INPUT
        // categoryName
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($categoryName)) {
            $error['categoryName'] = 'Veuillez renseigner le nouveau nom de la catégorie.';
        } else {
            $isOk = filter_var($categoryName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CATEGORY . '/')));
            if (!$isOk) {
                $error['categoryName'] = 'La catégorie renseigné n\'est pas valide.';
            }
            // Envoi en BDD
            if (empty($error)) {
                $category = new Category($categoryName);
                $result = $category->update($id_category);
                // Messages
                if($result){
                    $addedToDB['categoryName'] = "Entrée modifiée dans la table 'categories'";
                } else {
                    $error['categoryName'] = 'Erreur de serveur : la donnée n\'a pas été insérée';
                }
            }
        }
    }
}catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}






include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';