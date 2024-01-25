<div class="container mt-5">
    <h2>Réserver un véhicule</h2>
    <form action="process_reservation.php" method="post">

        <!-- Champs pour les informations du client -->
        <div class="form-group">
            <label for="lastname">Nom :</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>

        <div class="form-group">
            <label for="firstname">Prénom :</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Téléphone :</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="birthday">Date de naissance :</label>
            <input type="date" class="form-control" id="birthday" name="birthday" required>
        </div>

        <div class="form-group">
            <label for="city">Ville :</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>

        <div class="form-group">
            <label for="zipcode">Code postal :</label>
            <input type="text" class="form-control" id="zipcode" name="zipcode" required>
        </div>

        <!-- Champs pour les informations de réservation -->
        <div class="form-group">
            <label for="startdate">Date de début de réservation :</label>
            <input type="date" class="form-control" id="startdate" name="startdate" required>
        </div>

        <div class="form-group">
            <label for="enddate">Date de fin de réservation :</label>
            <input type="date" class="form-control" id="enddate" name="enddate" required>
        </div>

        <div class="form-group">
            <label for="selectedVehicle">Véhicule choisi :</label>
            <!-- Remplacez les options ci-dessous par la liste réelle de vos véhicules disponibles -->
            <select class="form-control" id="selectedVehicle" name="selectedVehicle" required>
                <option value="1">Véhicule 1</option>
                <option value="2">Véhicule 2</option>
                <!-- Ajoutez les options nécessaires ici -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
</div>