<?php
session_start();
require_once __DIR__ . '/../../../models/Category.php';

try{
    $title = 'Liste des catégories';
    $page = 'categories';
    $categories = Category::getAll();

    // Passage du message de delete par $_SESSION
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    }

}catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';