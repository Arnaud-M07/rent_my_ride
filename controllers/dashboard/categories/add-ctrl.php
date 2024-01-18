<?php
require_once __DIR__ . '/../../../models/Category.php';

try {
    $title = 'Ajout de catégories';
    $page = 'categories';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $error = [];
        $addedToDb = [];


        // Récupération, nettoyage et validation des données
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($categoryName)) {
            $error['categoryName'] = 'Veuillez renseigner une catégorie à ajouter.';
        } else {
            $isOk = filter_var($categoryName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CATEGORY . '/')));
            if (!$isOk) {
                $error['categoryName'] = 'La catégorie renseignée n\'est pas valide.';
            }
        }


        // Vérifie si la donnée existe déjà en BDD
        $isExist = Category::isExist($categoryName);
        if($isExist){
            $error['name'] = 'Cette catégorie existe déjà!';
        }


        // Enregistrement en BDD
        if (empty($error)) {
            // Création d'un nouvel objet issu de la classe 'category'
            $category = new Category();
            // Hydratation de notre objet
            $category->setName($categoryName);
            // Appel de la méthode insert
            $result = $category->insert();

            // Messages
            if ($result) {
                $addedToDb['categoryName'] = "Catégorie ajoutée avec succès";
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