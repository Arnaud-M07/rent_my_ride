
    <div class="col section-add-category">
        <div class="container">
            <h1>Ajout catégorie</h1>
            <form action="" method="POST" class="form" novalidate>
                <div class="row">
                    <div class="col">
                        <label for="categoryInput" class="form-label">Nom de la catégorie :</label>
                        <input pattern="<?=CATEGORY?>" 
                        value="<?= $category ?? '' ?>" 
                        name="category" 
                        type="text" 
                        class="form-control" 
                        placeholder=""
                        id="categoryInput" 
                        required>
                        <small class="alert-message"><?= $error['category'] ?? '' ?></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6 col-form-button">
                        <button type="submit" class="btn btn-dark mt-3">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




