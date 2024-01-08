<div class="section-list-category">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Liste des catégories</h1>
            </div>
            <div class="col-6 col-add-cat">
                <button class="btn btn-dark">
                    <a href="/controllers/dashboard/categories/add-ctrl.php">
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Catégorie 1</td>
                        <td><button class="btn btn-dark btn-modify"><i class="bi bi-pencil-square"></i></button></td>
                        <td><button class="btn btn-dark btn-delete"><i class="bi bi-trash"></i></i></button></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Catégorie 2</td>
                        <td><button class="btn btn-dark btn-modify"><i class="bi bi-pencil-square"></i></button></td>
                        <td><button class="btn btn-dark btn-delete"><i class="bi bi-trash"></i></i></button></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Catégorie 3</td>
                        <td><button class="btn btn-dark btn-modify"><i class="bi bi-pencil-square"></i></button></td>
                        <td><button class="btn btn-dark btn-delete"><i class="bi bi-trash"></i></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php 
        foreach($results as $result){
            echo $result['name'];
            // var_dump($result['name']);
        }
    ?>
    </div>
</div>