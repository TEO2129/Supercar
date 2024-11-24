<?php
$db = new PDO('mysql:host=localhost;dbname=abaidine_supercar;charset=utf8', 'root', '');

if (isset($_POST['submit'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['identifiant']) && !empty($_POST['password']) && !empty($_POST['adresse']) && !empty($_POST['tel'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $identifiant = $_POST['identifiant'];
        $password = htmlspecialchars($_POST['password']); // Encode the password
        $adresse = $_POST['adresse'];
        $tel = $_POST['tel'];

        $insertUser = $db->prepare('INSERT INTO client(nom, prenom, email, identifiant, password, adresse, tel) VALUES(:nom, :prenom, :email, :identifiant, :password, :adresse, :tel)');
        $insertUser->execute(array(':nom' => $nom, ':prenom' => $prenom, ':email' => $email, ':identifiant' => $identifiant, ':password' => $password, ':adresse' => $adresse, ':tel' => $tel));

        echo "L'utilisateur a été ajouté";
    } else {
        echo "Fail, veuillez réessayer";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inscription</title>
    <link rel="stylesheet" href="bootstrap.min(2).css">
    <link rel="stylesheet" href="assets/css/Supercar1.css">
</head>

<body>
    <nav class="navbar">
        <div class="container"><a class="navbar-brand logo" href="index.php">Page d'accueil</a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto"></ul>
            </div>
        </div>
    </nav>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Inscrivez-vous</h2>
                    <p></p>
                </div>
            </div>
            <form method="post">
                <div class="mb-3"><label class="form-label" for="nom">Nom</label><input class="form-control form-control item" type="text" id="nom" name="nom"></div>
                <div class="mb-3"><label class="form-label" for="prenom">Prénom</label><input class="form-control item" type="text" id="prenom" name="prenom"></div>
                <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+(?:\.com|\.fr)" title="Please enter a valid email address (e.g. example@domain.com or example@domain.fr)" id="email" name="email"></div>
                <div class="mb-3"><label class="form-label" for="identifiant">Choisissez un identifiant</label><input class="form-control form-control item" type="text" id="identifiant" name="identifiant"></div>
                <div class="mb-3"><label class="form-label" for="password">Mot de passe</label><input class="form-control item" type="password" id="password" name="password"></div>
                <div class="mb-3"><label class="form-label" for="adresse">Adresse</label><input class="form-control item" type="text" id="adresse" name="adresse"></div>
                <div class="mb-3"><label class="form-label" for="tel">Téléphone</label><input class="form-control item" type="tel" pattern="[0-9]+" title="Only numbers are allowed" id="tel" name="tel"></div>
                <button class="btn btn-primary ms-md-0" type="submit" name="submit" style="margin-top: 15px;margin-left: 2px;">Inscription</button>
                </br>
                <a href="connexion.php">Vous avez déjà un compte? Connectez-vous !</a>
            </form>
        </section>
    </main>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>