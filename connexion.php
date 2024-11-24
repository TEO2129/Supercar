<?php session_start(); 
$bdd = new PDO('mysql:host=localhost;dbname=hulk;charset=utf8', 'root', ''); 
if (isset($_POST['submit'])) 
	{ if (!empty($_POST['identifiant']) &&!empty($_POST['password'])) 
		{ $identifiant = ($_POST['identifiant']); 
			$password = ($_POST['password']);
			$recupUser = $bdd->prepare('SELECT * FROM client WHERE identifiant = :identifiant AND password = :password'); 
			$recupUser->execute(['identifiant' => $identifiant, 'password' => $password]); 
			if ($recupUser->rowCount() > 0) {
				$_SESSION['identifiant'] = $identifiant; 
				$_SESSION['password'] = $password; 
				echo "Vos identifiants sont correct."; 
				header('Location: index.php'); 
			} 
				
			else { 
				echo "Vos identifiants sont incorrect."; 
			}
			
		} 
			else { 
			echo "Veuillez compléter tous les champs..."; 
			} 
	} 
			
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Connexion</title>
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
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Connectez-vous</h2>
                </div>
                <form method="POST">
                    <div class="mb-3"><label class="form-label" for="identifiant">Identifiant</label><input class="form-control item" type="text" id="identifiant" name="identifiant"></div>
                    <div class="mb-3"><label class="form-label" for="password">Mot de passe</label><input class="form-control" type="password" id="password" name="password"></div>
                    <div class="mb-3"></div><button class="btn btn-primary" type="submit" name="submit">Connexion</button>
                    </br>
                    <a href="inscription.php">Vous n'avez pas de compte? Inscrivez-vous</a>
                </form>
            </div>
        </section>
    </main>
</body>

</html>