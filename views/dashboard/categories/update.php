<div class="section-form dashboard">
    <div class="container">
        <div class="row pb-4">
            <h1>Modifier une catégorie</h1>
        </div>
        <div class="row pb-2">
            <div class="col">
                <a href="/controllers/dashboard/categories/list-ctrl.php">
                    <i class="bi bi-arrow-left-circle"></i> Retour à la liste des catégories
                </a>
            </div>
        </div>
        <form action="" method="POST" class="form" novalidate>
            <div class="row">
                <div class="col">
                    <label for="categoryName" class="form-label">Nouveau nom de la catégorie :</label>
                    <input pattern="<?=REGEX_CATEGORY?>"
                    value="<?= $category->name ?>"
                    name="categoryName"
                    type="text"
                    class="form-control"
                    placeholder="<?= $category->name ?? $categoryName ?>"
                    id="categoryName"
                    required >
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
    </div>
</div>
