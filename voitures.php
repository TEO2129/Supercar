<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'abaidine_supercar';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Voitures</title>
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Supercar1.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
       <div class="container"><a class="navbar-brand d-flex align-items-center"><strong>Supercar</strong></a>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link active" href="voitures.php">Voitures</a></li>
                    <li class="nav-item"><a class="nav-link" href="demande_essai.php">Demande d'essai</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
               <!--</ul><a class="btn btn-primary shadow" role="button" href="connexion.php">Connexion</a>-->
            </div>
        </div>
    </nav>
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 12px;padding-top: 44px;">
                    <h2 class="fw-bold" style="margin-top: -46px;">Voitures</h2>
                </div>
                <div class="content">
                    
                </div>
            </div>
        </section>
    </main>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>