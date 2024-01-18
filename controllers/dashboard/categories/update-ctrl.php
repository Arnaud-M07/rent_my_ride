<?php
require_once __DIR__ . '/../../../models/Category.php';

try {
    $title = 'Modifier une catégorie';
    $page = 'categories';

    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliqué(list.php) (intval : transform la donnée en entier (sécurité))
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));

    // Si les données du formulaire ont été transmises
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Tableaux d'erreurs
        $error = [];
        $addToDB = [];

        // Récupération, nettoyage et validation des données
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($categoryName)) {
            $error['categoryName'] = 'Veuillez renseigner le nouveau nom de la catégorie.';
        } else {
            $isOk = filter_var($categoryName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CATEGORY . '/')));
            if (!$isOk) {
                $error['categoryName'] = 'La catégorie renseigné n\'est pas valide.';
            }
        }

        // Vérifie si la donnée existe déjà en BDD
        if (Category::isExist($categoryName)) {
            $error['categoryName'] = 'La catégorie existe déjà.';
        }


        // Enregistrement en BDD
        if (empty($error)) {
            // Création d'un nouvel objet issu de la classe Category
            $category = new Category();

            // Hydratation de l'obejt
            $category->setIdCategory($id_category);
            $category->setName($categoryName);

            // Appel de la méthode update
            $result = $category->update();

            // Messages
            if ($result) {
                $addedToDB['categoryName'] = "Catégorie modifiée avec succès";
            } else {
                $error['categoryName'] = 'Erreur de serveur : la donnée n\'a pas été insérée';
            }
        }
    }

    $category = Category::get($id_category);
    if (!$category) {
        header('Location: /controllers/dashboard/categories/list-ctrl.php');
        die;
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';