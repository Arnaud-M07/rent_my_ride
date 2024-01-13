<?php
require_once __DIR__ . '/../../../config/const.php';
require_once __DIR__ . '/../../../models/Category.php';

try {
    $title = 'Ajout de catégories';
    $page = 'categories';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $error = [];
        $addedToDb = [];

        // Nettoyage de la donnée
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($categoryName)) {
            $error['categoryName'] = 'Veuillez renseigner une catégorie à ajouter.';
        } else {
            $isOk = filter_var($categoryName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CATEGORY . '/')));
            if (!$isOk) {
                $error['categoryName'] = 'La catégorie renseignée n\'est pas valide.';
            }
        }

        // Vérifie si la catégorie existe
        if (Category::isExist($categoryName)) {
            $error['categoryName'] = 'La catégorie existe déjà.';
        }

        // Envoi en BDD
        if (empty($error)) {
            $category = new Category($categoryName);
            $result = $category->insert();

            // Messages
            if ($result) {
                $addedToDb['categoryName'] = "Entrée insérée dans la table 'categories'";
            } else {
                $error['categoryName'] = 'Erreur de serveur : la donnée n\'a pas été insérée';
            }
        }
        
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';