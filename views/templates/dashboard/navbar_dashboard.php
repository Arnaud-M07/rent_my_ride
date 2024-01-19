<div class="row g-0">
    <!-- row contenant les cols princicipales : navbar laterale + main -->
    <header class="row col-3 header-dashboard">
        <div class="col-3 header w-100 d-flex flex-column flex-shrink-0 p-4 bg-dark text-white" >
            <a href="" class="navbar-brand d-flex align-items-center justify-content-center w-100 mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="/public/assets/img/Rent_My_Ride-logo-dashboard-w.png" alt="Rent My Ride logo">
            </a>
            <!-- <span class="fs-4">Dashboard</span> -->
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="../../../controllers/dashboard/categories/list-ctrl.php" class="nav-link <?php echo ($page == 'categories') ? 'active' : 'text-white'; ?>">
                        <i class="bi bi-tags-fill"></i>
                        Catégories
                    </a>
                </li>
                <li>
                    <a href="../../../controllers/dashboard/vehicles/list-ctrl.php" class="nav-link <?php echo ($page == 'vehicles') ? 'active' : 'text-white'; ?>">
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
            <a class="btn btn-back-home" href="/controllers/vehicles-list-ctrl.php"><i class="bi bi-box-arrow-left"></i> Quitter</a>
        </div>
    </header>

    <main class="col-9 d-flex flex-column h-100 main-dashboard">