<div class="section-add-vehicle">
    <div class="container">
        <div class="row pb-4">
            <h1>Ajouter un véhicule</h1>
        </div>
        <div class="row pb-2">
            <div class="col">
                <a href="/controllers/dashboard/vehicles/list-ctrl.php">
                    <i class="bi bi-arrow-left-circle"></i> Retour à la liste des véhicules
                </a>
            </div>
        </div>
        <form action="" method="POST" class="form" enctype="multipart/form-data" novalidate>
            <div class="row">
                <!-- vehicleBrand -->
                <div class="col col-md-6">
                    <label for="vehicleBrand" class="form-label">Marque du véhicule :</label>
                    <input pattern="<?= REGEX_CATEGORY ?>" 
                    value="<?= $vehicleBrand ?? '' ?>" 
                    name="vehicleBrand" 
                    type="text" 
                    class="form-control" 
                    placeholder="" 
                    id="vehicleBrand" 
                    required>
                    <small class="alert-message"><?= $error['vehicleBrand'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['vehicleBrand'] ?? '' ?></small>
                </div>
                <!-- vehicleModel -->
                <div class="col col-md-6">
                    <label for="vehicleModel" class="form-label">Modèle du véhicule :</label>
                    <input pattern="<?= REGEX_CATEGORY ?>" 
                    value="<?= $vehicleModel ?? '' ?>" 
                    name="vehicleModel" 
                    type="text" 
                    class="form-control" 
                    placeholder="" 
                    id="vehicleModel" 
                    required>
                    <small class="alert-message"><?= $error['vehicleModel'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['vehicleModel'] ?? '' ?></small>
                </div>
            </div>
            <div class="row">
                <!-- vehicleRegistration -->
                <div class="col col-md-6">
                    <label for="vehicleRegistration" class="form-label">Immatriculation du véhicule :</label>
                    <input pattern="<?= REGEX_REGISTRATION ?>" 
                    value="<?= $vehicleRegistration ?? '' ?>" 
                    name="vehicleRegistration" 
                    type="text" 
                    class="form-control" 
                    placeholder="AB-123-CD" 
                    id="vehicleRegistration" 
                    required>
                    <small class="alert-message"><?= $error['vehicleRegistration'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['vehicleRegistration'] ?? '' ?></small>
                </div>
                <!-- vehicleMileage -->
                <div class="col col-md-6">
                    <label for="vehicleMileage" class="form-label">Kilométrage du véhicule :</label>
                    <input pattern="<?= REGEX_MILEAGE ?>" 
                    value="<?= $vehicleMileage ?? '' ?>" 
                    name="vehicleMileage" 
                    type="number" 
                    class="form-control" 
                    placeholder="" 
                    id="vehicleMileage" 
                    required>
                    <small class="alert-message"><?= $error['vehicleMileage'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['vehicleMileage'] ?? '' ?></small>
                </div>
            </div>
            <div class="row">
                <!-- vehicleCategory -->
                <div class="col col-md-6">
                    <label for="id_category">Catégorie du véhicule</label>
                    <select class="form-select listNames" 
                    name="id_category" 
                    id="id_category" 
                    aria-label="Floating label">
                        <option value=""
                        class="listNames" 
                        disabled 
                        selected 
                        hidden><?= 'séléctionnez une catégorie' ?></option>
                        <?php foreach ($categories as $category) {
                            $isSelected = ($category->name && $category->name == $categories) ? 'selected' : '';
                            echo "<option value=\"$category->id_category\" $isSelected>" . ucfirst(strtolower($category->name)) . "</option>";
                        }
                        ?>
                    </select>
                    <small class="alert-message"><?= $error['id_category'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['id_category'] ?? '' ?></small>
                </div>
                <!-- vehiclePicture -->
                <div class="col col-md-6">
                    <label for="vehiclePicture" class="form-label mb-0">Photo du véhicule</label>
                    <input class="form-control" 
                    name="vehiclePicture" 
                    id="vehiclePicture" 
                    type="file" 
                    accept=".png, image/jpeg">
                    <small class="alert-message"><?= $error['vehiclePicture'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['vehiclePicture'] ?? '' ?></small>
                </div>
                <small class="alert-message"><?= $error['addVehicle'] ?? '' ?></small>
                <small class="addToBdd-message"><?= $addedToDb['addVehicle'] ?? '' ?></small>
            </div>
            <div class="row">
                <div class="col-12 col-xl-6 col-form-button">
                    <button type="submit" class="btn btn-dark mt-3">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>