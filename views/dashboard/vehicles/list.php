<div class="section-list-category">
    <div class="container">
        <div class="row pb-4">
            <div class="col-6">
                <h1>Liste des véhicules</h1>
            </div>
            <div class="col-6 col-add-cat">
                <a class="btn btn-dark" href="/controllers/dashboard/vehicles/add-ctrl.php">
                    <i class="bi bi-plus-circle"></i> Ajouter un véhicule
                </a>
            </div>
        </div>
        <div class="div-table">
            <table class="table table-categories caption-top table-responsive">
                <!-- <small class="addToBdd-message">  //$msg  </small> -->
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Modèle</th>
                        <th scope="col">Catégorie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($vehicles as $vehicle) { ?>
                        <tr>
                            <th scope='row'><?= $vehicle->id_vehicle ?></th>
                            <td><?= $vehicle->brand ?></td>
                            <td><?= $vehicle->model ?></td>
                            <?php
                            foreach ($categories as $category) {
                                if ($category->id_category == $vehicle->id_category) { ?>
                                    <td><?= $category->name?></td><?php
                                }
                            }
                            ?>
                            <td>
                                <a class='btn btn-dark btn-modify' href='/controllers/dashboard/vehicles/update-ctrl.php?id=<?= $vehicle->id_vehicle ?>'>
                                    <i class='bi bi-pencil-square'></i>
                                </a>
                            </td>
                            <td>
                                <a class='btn btn-dark btn-delete' onclick="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?')" href='/controllers/dashboard/categories/delete-ctrl.php?id=<?= $category->id_category ?>'>
                                    <i class='bi bi-trash'></i>
                                </a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>