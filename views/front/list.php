<section class="">
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <div class="hero-banner hero-banner-listing">
                    <div class="filter">
                        <h1 class="">Nos<br>véhicules</h1>
                    </div>
                </div>
            </div>
        </div>
        <form action="" method="GET" enctype="multipart/form-data" novalidate>
            <div class="row mb-5 gx-5 form row-search">
                <!-- vehicleCategory -->
                <div class="col col-md-6 ">
                    <select class="form-select listNames" name="id_category" id="id_category" aria-label="Floating label">
                        <option value="" <?= ($id_category === '') ? 'selected' : '' ?>>Toutes les catégories</option>
                        <?php foreach ($categories as $category) {
                            $isSelected = ($category->id_category === $id_category) ? 'selected' : '';
                            echo "<option value=\"$category->id_category\" $isSelected>" . ucfirst(strtolower($category->name)) . "</option>";
                        }
                        ?>
                    </select>
                    <small class="alert-message"><?= $error['id_category'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['id_category'] ?? '' ?></small>
                </div>
                <div class="col col-md-6">
                    <div class="col form form-search d-flex">
                        <input value="<?= $search ? $search : '' ?>" name="search" id="search" type="search" class="form-control form-input me-2" placeholder="Rechercher...">
                        <button type="submit" class="btn btn-search"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </form>


        <div class="row">
            <div class="col px-4 pb-4">
                <h4><?php if ($nbVehicles === 0) {
                        echo 'Pas de véhicule trouvé...';
                    } elseif ($nbVehicles === 1) {
                        echo $nbVehicles . ' véhicule trouvé';
                    } else {
                        echo $nbVehicles . ' véhicules trouvés';
                    } ?></h4>
            </div>
        </div>


        <div class="row g-4 mb-5">
            <!-- CARDS -->
            <?php foreach ($vehicles as $vehicle) { ?>
                <div class="col col-12 col-md-6 col-lg-4 row-cards">
                    <div class="card">
                        <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="card-img-top" alt="Photo de véhicule : <?= $vehicle->brand . ' ' . $vehicle->model ?>">
                        <span class="badge badge-card"><?= $vehicle->name ?></span>
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-black"><?= $vehicle->brand . ' ' . $vehicle->model ?></h5>
                            <ul>
                                <li><span class="fw-bold">Immatriculation :</span> <br><span class="fst-italic"><?= $vehicle->registration ?></span></li>
                                <li><span class="fw-bold">Kilométrage :</span> <br><span class="fst-italic"><?= $vehicle->mileage ?></span></li>
                            </ul>
                            <div class="card-buttons">
                                <a class="btn btn-info" href="/controllers/vehicles-detail-ctrl.php?id_vehicle=<?= $vehicle->id_vehicle ?>">En savoir plus</a>
                                <a class="btn btn-booking btn-dark" href="/controllers/vehicles-booking-ctrl.php?id_vehicle=<?= $vehicle->id_vehicle ?>">Réserver</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- NAVIGATION -->
        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href='?currentPage=<?= $currentPage - 1 ?>&id_category=<?= $id_category ?>&search=<?= $search ?>'>Précédent</a>
                    </li>
                    <?php for ($page = 1; $page <= $nbPages; $page++) {
                        $isActive = ($page == $currentPage) ? 'active' : "" ?>
                        <li class="page-item <?= $isActive ?>"><a class="page-link" href='?currentPage=<?= $page ?>&id_category=<?= $id_category ?>&search=<?= $search ?>'><?= $page ?></a></li>
                    <?php } ?>
                    <li class="page-item <?= ($currentPage == $nbPages) ? 'disabled' : '' ?>">
                        <a class="page-link" href='?currentPage=<?= $currentPage + 1 ?>&id_category=<?= $id_category ?>&search=<?= $search ?>'>Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>