<?php
require_once __DIR__ . "/../../../config/const.php";
require_once __DIR__ . "/../../../models/Category.php";
require_once __DIR__ . "/../../../models/Vehicle.php";

try {
    $title = 'Modifier un véhicule';
    $page = 'vehicles';
    
    $id_vehicle = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)); // intval : transform la donnée en entier (sécurité)
    $categories = Category::getAll(); // Appel de la méthode statique getAll du modèle

    $vehicle = Vehicle::get($id_vehicle);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Tableau d'erreurs
        $error = [];
        $addedToDb = [];

        // vehicleBRAND INPUT
        $vehicleBrand = filter_input(INPUT_POST, 'vehicleBrand', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($vehicleBrand)) {
            $error['vehicleBrand'] = 'Veuillez renseigner la marque du véhicule';
        } else {
            $isOk = filter_var($vehicleBrand, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CATEGORY . '/')));
            if (!$isOk) {
                $error['vehicleBrand'] = 'La marque renseignée n\'est pas valide.';
            }
        }

        // vehicleModel INPUT
        $vehicleModel = filter_input(INPUT_POST, 'vehicleModel', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($vehicleModel)) {
            $error['vehicleModel'] = 'Veuillez renseigner le modèle du véhicule.';
        } else {
            $isOk = filter_var($vehicleModel, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CATEGORY . '/')));
            if (!$isOk) {
                $error['vehicleModel'] = 'Le modèle renseigné n\'est pas valide.';
            }
        }

        // vehicleREGISTRATION INPUT
        $vehicleRegistration = filter_input(INPUT_POST, 'vehicleRegistration', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($vehicleRegistration)) {
            $error['vehicleRegistration'] = 'Veuillez renseigner l\'immatriculation du véhicule.';
        } else {
            $isOk = filter_var($vehicleRegistration, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_REGISTRATION . '/')));
            if (!$isOk) {
                $error['vehicleRegistration'] = 'L\'immatriculation renseignée n\'est pas valide.';
            }
        }

        // vehicleMILEAGE INPUT
        $vehicleMileage = filter_input(INPUT_POST, 'vehicleMileage', FILTER_SANITIZE_NUMBER_INT);
        if (empty($vehicleMileage)) {
            $error['vehicleMileage'] = 'Veuillez renseigner le kilométrage du véhicule.';
        } else {
            $isOk = filter_var($vehicleMileage, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_MILEAGE . '/')));
            if (!$isOk) {
                $error['vehicleMileage'] = 'Le kilométrage renseigné n\'est pas valide.';
            }
        }

        // vehicleCATEGORY
        $vehicleCategory = filter_input(INPUT_POST, 'id_category', FILTER_SANITIZE_NUMBER_INT);
        if (empty($vehicleCategory)) {
            $error['id_category'] = 'Veuillez renseigner une catégorie';
        } else {
            $arrayCategoryIds = array_column($categories, 'id_category'); // Comparer l'id entré avec un tableau contenant tous les Id (tableau d'objet -> tableau de valeurs)
            $isOk = filter_var($vehicleCategory, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CATEGORY . '/')));
            if (!$isOk || !in_array($vehicleCategory, $arrayCategoryIds)) {
                $error['id_category'] = 'La catégorie renseignée n\'est pas valide.';
            }
        }

        // vehiclePICTURE
        $vehiclePicture = null;
        if (empty($_FILES['vehiclePicture']['name'])){
            // Ajouter le nom présent en BDD
            $vehiclePicture = $vehicle->picture;
        } elseif (!empty($_FILES['vehiclePicture']['name'])) { // Photo non obligatoire
            try {
                if ($_FILES['vehiclePicture']['error'] != 0) {
                    throw new Exception("Une erreur s'est produite.");
                }
                if (!in_array($_FILES['vehiclePicture']['type'], ARRAY_TYPES)) {
                    throw new Exception("Le format de l'image n'est pas correct.");
                }
                if ($_FILES['vehiclePicture']['size'] > UPLOAD_MAX_SIZE) {
                    throw new Exception("Le fichier est trop lourd.");
                }
                $filename = uniqid("img_");
                $extension = pathinfo($_FILES['vehiclePicture']['name'], PATHINFO_EXTENSION);

                $from = $_FILES['vehiclePicture']['tmp_name'];
                $to = __DIR__ . '/../../../public/uploads/vehicles/' . $filename . '.' . $extension;
                $vehiclePicture = $filename . '.' . $extension;
                move_uploaded_file($from, $to);
            } catch (\Throwable $th) {
                $error['vehiclePicture'] = $th->getMessage();
            }
        }

        // Envoi en BDD
        if (empty($error)) {
            $vehicle = new Vehicle(
                $vehicleBrand,
                $vehicleModel,
                $vehicleRegistration,
                $vehicleMileage,
                $vehiclePicture,
                null,
                null,
                null,
                $id_vehicle,
                $vehicleCategory
            );

            $result = $vehicle->update();
            // Messages
            if ($result) {
                $addedToDb['addVehicle'] = "Entrée modifiée dans la table 'vehicles'";
            } else {
                $error['addVehicle'] = 'Erreur de serveur : la donnée n\'a pas été insérée';
            }
        }
    }

    // Création de l'obj $vehicle à partir de l'id dans l'url
    // Déplacement de la récupération de l'objet $vehicle après la validation du formulaire. 
    // Cela résout le problème de l'hydratation de l'objet $vehicle avec l'ID du véhicule 
    // depuis l'URL avant d'essayer de l'utiliser dans le formulaire de mise à jour.
    $vehicle = Vehicle::get($id_vehicle);
    if (!$vehicle) {
        header('Location: /controllers/dashboard/vehicles/list-ctrl.php');
        die;
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';
