<div class="section-list-category">
    <div class="container">
        <div class="row pb-3">
            <div class="col-6">
                <h1>Liste des catégories</h1>
            </div>
            <div class="col-6 col-add-cat">
                <button class="btn btn-dark">
                    <a href="/controllers/dashboard/categories/update-ctrl.php">
                        <i class="bi bi-plus-circle"></i> Ajouter une catégorie
                    </a>
                </button>
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
                                <button class='btn btn-dark btn-modify'>
                                    <a href='update-ctrl.php'><i class='bi bi-pencil-square'></i></a>
                                </button>
                            </td>
                            <td>
                                <button class='btn btn-dark btn-delete'>
                                    <i class='bi bi-trash'></i>
                                </button>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>