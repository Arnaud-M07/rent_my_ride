<?php
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../config/const.php';

try {
    $id_category = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    // $category = Category::get($id_category);

    $category = Category::delete($id_category);

    if($category){
        header('Location: /controllers/dashboard/categories/list-ctrl.php');
        exit;
    }

}catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
