<?php
session_start();

require_once __DIR__ . '/../../../models/Category.php';




try{
    $title = 'Liste des catégories';
    $page = 'categories';
    $categories = Category::getAll(); // Appel de la méthode statique getAll du modèle

    // Passage du message de delete par l'URL
    // $msg = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_SPECIAL_CHARS);

    // Passage du message de delete par $_SESSION
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    }
    

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