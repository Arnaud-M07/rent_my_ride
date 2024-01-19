<section class="section5 section-destinations">
    <!-- <div class="container-fluid hero-banner"></div> -->
    <div class="container py-5">
        <div class="row my-5">
            <h1>Liste des véhicules</h1>
        </div>
        <!-- 1st Row -->
        <div class="row g-4">
            <!-- Card 1-->
            <?php foreach ($vehicles as $vehicle) { ?>
                <div class="col col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="card-img-top" alt="Photo de véhicule : <?=$vehicle->brand .' '. $vehicle->model?>">
                        <span class="badge badge-card"><?= $vehicle->name ?></span>
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?=$vehicle->brand .' '. $vehicle->model?></h5>
                            <ul>
                                <li><span class="fw-bold">Immatriculation :</span> <br><span class="fst-italic"><?= $vehicle->registration ?></span></li>
                                <li><span class="fw-bold">Kilométrage :</span> <br><span class="fst-italic"><?= $vehicle->mileage ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    </div>