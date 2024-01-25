<div class="container">
    <div class="row">
        <div class="col py-5">
            <div class="hero-banner hero-banner-listing">
                <div class="filter">
                    <h1 class="">Réserver un <br>véhicules</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="section-form ">
        <form action="" method="POST" enctype="multipart/form-data" novalidate>
            <!-- Informations du client -->
            <div class="row form">
                <div class="col col-md-6">
                    <label for="lastname" class="form-label">Nom :</label>
                    <input pattern="" value="<?= $lastname ?? '' ?>" name="lastname" type="text" class="form-control" placeholder="" id="lastname" required>
                    <small class="alert-message"><?= $error['lastname'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['lastname'] ?? '' ?></small>
                </div>

                <div class="col col-md-6">
                    <label for="firstname" class="form-label">Prénom :</label>
                    <input pattern="" value="<?= $firstname ?? '' ?>" name="firstname" type="text" class="form-control" placeholder="" id="firstname" required>
                    <small class="alert-message"><?= $error['firstname'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['firstname'] ?? '' ?></small>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-6">
                    <label for="email" class="form-label">Email :</label>
                    <input pattern="" value="<?= $email ?? '' ?>" name="email" type="email" class="form-control" placeholder="" id="email" required>
                    <small class="alert-message"><?= $error['email'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['email'] ?? '' ?></small>
                </div>
                <div class="col col-md-6">
                    <label for="phone" class="form-label">Téléphone :</label>
                    <input pattern="" value="<?= $phone ?? '' ?>" name="phone" type="tel" class="form-control" placeholder="" id="phone" required>
                    <small class="alert-message"><?= $error['phone'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['phone'] ?? '' ?></small>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-6">
                    <label for="city" class="form-label">Ville :</label>
                    <input pattern="" value="<?= $city ?? '' ?>" name="city" type="text" class="form-control" placeholder="" id="city" required>
                    <small class="alert-message"><?= $error['city'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['city'] ?? '' ?></small>
                </div>
                <div class="col col-md-6">
                    <label for="birthday" class="form-label">Date de naissance :</label>
                    <input pattern="" value="<?= $birthday ?? '' ?>" name="birthday" type="date" class="form-control" placeholder="" id="birthday" required>
                    <small class="alert-message"><?= $error['birthday'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['birthday'] ?? '' ?></small>
                </div>
            </div>

            <!-- Informations de réservation -->
            <div class="row form">
                <div class="col col-md-3">
                    <label for="startdate" class="form-label">Début de réservation :</label>
                    <input pattern="" value="<?= $startdate ?? '' ?>" name="startdate" type="date" class="form-control" placeholder="" id="startdate" required>
                    <small class="alert-message"><?= $error['startdate'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['startdate'] ?? '' ?></small>
                </div>

                <div class="col col-md-3">
                    <label for="enddate" class="form-label">Début de réservation :</label>
                    <input pattern="" value="<?= $enddate ?? '' ?>" name="enddate" type="date" class="form-control" placeholder="" id="enddate" required>
                    <small class="alert-message"><?= $error['enddate'] ?? '' ?></small>
                    <small class="addToBdd-message"><?= $addedToDb['enddate'] ?? '' ?></small>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-xl-6 col-form-button mt-4">
                    <button type="submit" class="btn btn-booking mt-3">Réserver</button>
                </div>
            </div>
        </form>
    </section>
</div>