<section class="section5 section-destinations">
    <!-- <div class="container-fluid hero-banner"></div> -->
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <div class="hero-banner">
                    <div class="filter">
                        <h1 class="">Nos<br>véhicules</h1>
                    </div>
                </div>
            </div>
        </div>
        <form id="categoryForm" action="" method="GET" class="form" enctype="multipart/form-data" novalidate>
            <div class="row mb-5 gx-2 row-search">
                <!-- vehicleCategory -->
                <div class="col col-md-4 ">
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
                <div class="col col-md-2">
                    <button type="submit" class="btn btn-search"><i class="bi bi-search"></i></button>
                </div>

        </form>

    </div>
    <!-- 1st Row -->
    <div class="row g-4 mb-5">
        <!-- Card 1-->
        <?php foreach ($vehicles as $vehicle) { ?>
            <div class="col col-12 col-md-6 col-lg-4 row-cards">
                <div class="card">
                    <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="card-img-top" alt="Photo de véhicule : <?= $vehicle->brand . ' ' . $vehicle->model ?>">
                    <span class="badge badge-card"><?= $vehicle->name ?></span>
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $vehicle->brand . ' ' . $vehicle->model ?></h5>
                        <ul>
                            <li><span class="fw-bold">Immatriculation :</span> <br><span class="fst-italic"><?= $vehicle->registration ?></span></li>
                            <li><span class="fw-bold">Kilométrage :</span> <br><span class="fst-italic"><?= $vehicle->mileage ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row pb-5 mb-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                <a class="page-link" href='?currentPage=<?= $currentPage - 1 ?>&id_category=<?= $id_category ?>'>Précédent</a>
                </li>
                <?php for ($page = 1; $page <= $nbPages; $page++) {
                    $isActive = ($page == $currentPage) ? 'active' : ""?>
                    <li class="page-item <?= $isActive ?>"><a class="page-link" href='?currentPage=<?= $page ?>&id_category=<?= $id_category ?>'><?= $page ?></a></li>
                <?php } ?>
                <li class="page-item">
                <a class="page-link" href='?currentPage=<?= $currentPage + 1 ?>&id_category=<?= $id_category ?>'>Suivant</a>
                </li>
            </ul>
        </nav>
    </div>
    </div>
    </div>