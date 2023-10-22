<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <script type="module" src="http://localhost:5173/@vite/client"></script>
    <script type="module" src="http://localhost:5173/assets/main.js"></script>
</head>
<body>
<header>
    <h1>Header</h1>
    <nav>
        <ul>
			<li><a href="/">Accueil</a></li>
			<li><a href="/gallery">Galerie</a></li>
			<li><a href="/contact">Contact</a></li>
			<li><a href="/a-propos">À propos</a></li>
			<li><a href="/login">Connexion</a></li>
			<li><a href="/register">Inscription</a></li>
			<li><a href="/logout">Déconnexion</a></li>
        </ul>
    </nav>
</header>
<main>
    <h1><?= $pageTitle ?></h1>
	<p><?= $pageDescription ?> </p>
    <?php include $this->viewName; ?>
</main>
<footer>
    <p>Tous droits réservés</p>
</footer>
</body>
</html>