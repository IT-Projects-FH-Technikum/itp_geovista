<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
?>

<!-- NAV-BAR -->
<nav class="navbar navbar-expand-xl bg-dark navbar-dark px-3">
    <a class="navbar-brand" href="./index.php">GeoVista</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">...</a>
            </li>

            <!-- Only for admin -->
            <li class="nav-item">
                <a class="nav-link" href="">Profilverwaltung</a>
            </li>
        </ul>

        <div class="nav-item text-light">
            <p>Hallo, <span class='fw-bold'>Demouser</span>!</p>
        </div>

        <!-- Profil-Icon -> only for logged in users -->
        <a class="nav-link" href="./editProfile.php"><img src="./res/img/icons/profil.png" class="me-0 me-md-3 mb-3 mb-md-0"
                alt="Profil Icon" style="width: 40px;"></a>

        <!-- Login/Logout -->
        <div class="nav-item">
            <a class="btn btn-light" href="" role="button">Login/Logout</a> <!-- depending on session -->
        </div>

    </div>

</nav>


<!-- NAV-BAR: js to toggle nav -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>