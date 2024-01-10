<div class="section-list-category">
    <div class="container">
        <div class="row pb-4">
            <div class="col-6">
                <h1>Liste des catégories</h1>
            </div>
            <div class="col-6 col-add-cat">
                <a class="btn btn-dark" href="/controllers/dashboard/categories/add-ctrl.php">
                    <i class="bi bi-plus-circle"></i> Ajouter une catégorie
                </a>
            </div>
        </div>
        <div class="div-table">
            <table class="table table-categories caption-top table-responsive">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom de la catégorie</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($categories as $category) { ?>
                        <tr>
                            <th scope='row'><?= $category->id_category ?></th>
                            <td><?= $category->name ?></td>
                            <td>
                                <a class='btn btn-dark btn-modify' href='/controllers/dashboard/categories/update-ctrl.php?id=<?= $category->id_category ?>'>
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