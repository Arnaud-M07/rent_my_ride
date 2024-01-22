<div class="section-list-category">
    <div class="container">
        <div class="row pb-4">
            <div class="col-6">
                <h1>Liste des véhicules <?= ($archived) ? 'archivés' : ' '; ?></h1>
            </div>
            <div class="col-6 col-add-cat">
            <?php if($archived == false){ ?>
                <a class="btn btn-dark me-3" href="/controllers/dashboard/vehicles/add-ctrl.php">
                    <i class="bi bi-plus-circle"></i> Ajouter un véhicule
                </a>
                <a class="btn btn-dark" href="/controllers/dashboard/vehicles/list-archive-ctrl.php">
                <i class="bi bi-archive"></i> Archives
                </a>
            <?php } else { ?>
                <a class="btn btn-dark" href="/controllers/dashboard/vehicles/list-ctrl.php">
                <i class="bi bi-arrow-left-circle"></i> Retour
                </a>
            <?php } ?>
            </div>
        </div>
        <div class="div-table">
            <table class="table table-categories caption-top table-responsive">
                <small class="addToBdd-message"><?= $msg ?></small>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Modèle</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Image</th>
                        <th scope="col"><?= ($archived) ? 'Désarchiver' : 'Modifier' ?></th>
                        <th scope="col"><?= ($archived) ? 'Supprimer' : 'Archiver' ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($vehicles as $vehicle) { ?>
                        <tr>
                            <th scope='row'><?= $vehicle->id_vehicle ?></th>
                            <td><?= $vehicle->brand ?></td>
                            <td><?= $vehicle->model ?></td>
                            <td><?= $vehicle->name ?></td> <!-- LEFT JOIN $category->name -->
                            <td><img src='/public/uploads/vehicles/<?= $vehicle->picture ?>' class="vehicle-img rounded" alt='Image du véhicule'></td>
                            <td><a class='btn btn-dark btn-modify' href='/controllers/dashboard/vehicles/<?= ($archived) ? 'archive-ctrl.php' : 'update-ctrl.php'; ?>?id_vehicle=<?= $vehicle->id_vehicle ?>'><?= ($archived) ? '<i class="bi bi-arrow-repeat"></i>' : '<i class="bi bi-pencil-square"></i>'; ?></a></td>
                            <td><a class='btn btn-dark btn-delete' onclick="return confirm('Voulez-vous vraiment <?= ($archived) ? 'supprimer' : 'archiver'; ?> cet enregistrement ?')" href='/controllers/dashboard/vehicles/<?= ($archived) ? 'delete-ctrl.php' : 'archive-ctrl.php'; ?>?id_vehicle=<?= $vehicle->id_vehicle ?>'><?= ($archived) ? '<i class="bi bi-trash"></i>' : '<i class="bi bi-archive"></i>'; ?></a></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>