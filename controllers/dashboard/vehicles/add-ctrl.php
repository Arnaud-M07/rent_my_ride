<?php
require_once __DIR__ . '/../../../config/const.php';
require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Category.php';


try {
    $title = 'Ajout de véhicules';
    $page = 'vehicles';
    $categories = Category::getAll(); // Appel de la méthode statique getAll du modèle


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
        $id_category = filter_input(INPUT_POST, 'id_category', FILTER_SANITIZE_NUMBER_INT);
        if (empty($id_category)) {
            $error['id_category'] = 'Veuillez renseigner une catégorie';
        } else {
            $arrayCategoryIds = array_column($categories, 'id_category'); // Comparer l'id entré avec un tableau contenant tous les Id (tableu d'objet -> tableau de valeurs)
            $isOk = filter_var($id_category, FILTER_VALIDATE_INT);
            if (!$isOk || !in_array($id_category, $arrayCategoryIds)) {
                $error['id_category'] = 'La catégorie renseignée n\'est pas valide.';
            }
        }

        // vehiclePICTURE
        $vehiclePicture = null;
        if (!empty($_FILES['vehiclePicture']['name'])) { // Photo non obligatoire
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

            $vehicle = new Vehicle();
            // Methode __construct
                // $vehicle = new Vehicle(
                //     $vehicleBrand,
                //     $vehicleModel,
                //     $vehicleRegistration,
                //     $vehicleMileage,
                //     $vehiclePicture,
                //     null,
                //     null,
                //     null,
                //     null,
                //     $id_category
                // );

            // Methode SET / GET
            $vehicle->setBrand($vehicleBrand);
            $vehicle->setModel($vehicleModel);
            $vehicle->setRegistration($vehicleRegistration);
            $vehicle->setMileage($vehicleMileage);
            $vehicle->setPicture($vehiclePicture);
            $vehicle->setIdCategory(intval($id_category));

            $result = $vehicle->insert();
            // Messages
            if ($result) {
                $addedToDb['addVehicle'] = "Entrée insérée dans la table 'vehicles'";
            } else {
                $error['addVehicle'] = 'Erreur de serveur : la donnée n\'a pas été insérée';
            }
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

include __DIR__ . '/../../../views/templates/dashboard/header_dashboard.php';
include __DIR__ . '/../../../views/templates/dashboard/navbar_dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer_dashboard.php';
