<?php
session_start(); // Passage de la donnée $msg via la session

require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../config/const.php';

try {
    $id_category = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    // $category = Category::get($id_category);

    $isDeleted = Category::delete($id_category);

    if ($isDeleted) {
        $msg = 'La donnée a été supprimée';
    } else {
        $msg = 'Erreur, La donnée n\'a pas été supprimée';
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
