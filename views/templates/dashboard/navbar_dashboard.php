<div class="row vh-100">
    <!-- row contenant les cols princicipales : navbar laterale + main -->
    <header class="row header col-3 h-100">
        <div class="col col-3 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="../../../controllers/dashboard/categories/list-ctrl.php" class="nav-link active">
                        <i class="bi bi-tags-fill"></i>
                        Catégories
                    </a>
                </li>
                <li>
                    <a href="../../../controllers/dashboard/categories/list-ctrl.php" class="nav-link text-white">
                        <i class="bi bi-car-front-fill"></i>
                        Véhicules
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-calendar3"></i> 
                        Réservations
                    </a>
                </li>
            </ul>
            <hr>
        </div>
    </header>

    <main class="col-9">