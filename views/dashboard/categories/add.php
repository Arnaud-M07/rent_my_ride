
<div class="col section-add-category">
    <div class="container">
        <h1>Ajout catégorie</h1>
        <form action="" method="POST" class="form" novalidate>
            <div class="row">
                <div class="col">
                    <label for="categoryName" class="form-label">Nom de la catégorie :</label>
                    <input pattern="<?=REGEX_CATEGORY?>" 
                    value="<?= $categoryName ?? '' ?>" 
                    name="categoryName" 
                    type="text" 
                    class="form-control" 
                    placeholder=""
                    id="categoryName" 
                    required>
                    <small class="alert-message"><?= $error['categoryName'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDB['categoryName'] ?? '' ?></small>
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




