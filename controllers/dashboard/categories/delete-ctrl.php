<?php
session_start(); // Passage de la donnée $msg via la session

require_once __DIR__ . '/../../../models/Category.php';


try {
    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliquée
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));
    // $category = Category::get($id_category);

    $isDeleted = Category::delete($id_category);

    if ($isDeleted) {
        $msg = 'La catégorie a été supprimée';
    } else {
        $msg = 'Erreur, La catégorie n\'a pas été supprimée';
    }
    $_SESSION['msg'] = $msg;
    // Passage de la donnée par l'URL
    // header('Location: /controllers/dashboard/categories/list-ctrl.php?msg='.$msg);
    // Passage de la donnée via $_SESSION
    header('Location: /controllers/dashboard/categories/list-ctrl.php');

    die;

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
