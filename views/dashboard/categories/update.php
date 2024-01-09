
<div class="section-add-category">
    <div class="container">
        <div class="row pb-3">
            <h1>Modifier une catégorie</h1>
        </div>
        <form action="" method="POST" class="form" novalidate>
            <div class="row">
                <div class="col">
                    <label for="categoryName" class="form-label">Nom de la catégorie :</label>
                    <input pattern="<?=REGEX_CATEGORY?>" 
                    value="<?= $categoryName ?? '' ?>" 
                    name="categoryName" 
                    type="text" 
                    class="form-control" 
                    placeholder=<?= $categoryName ?>
                    id="categoryName" 
                    required>
                    <small class="alert-message"><?= $error['categoryName'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDB['categoryName'] ?? '' ?></small>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-6 col-form-button">
                    <button type="submit" class="btn btn-dark mt-3">Modifier</button>
                </div>
            </div>
        </form>
        <div class="row pt-2">
            <a href="/controllers/dashboard/categories/list-ctrl.php">
                <i class="bi bi-arrow-left-circle"></i> Retour à la liste des catégories
            </a>
        </div>
    </div>
</div>