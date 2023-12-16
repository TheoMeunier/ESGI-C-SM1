<?php include '../views/component/meta.php'; ?>
<body>
<header>
	<nav>
		<ul>
			<li><a href="/">accueil</a></li>
			<li><a href="/gallery">portfolio</a></li>
		</ul>
	</nav>
	<h1>Template Back</h1>
	<nav>
		<ul>
			<li><a href="/contact">contact</a></li>
			<li><a href="/a-propos">a-propos</a></li>
		</ul>
	</nav>
</header>
<main class="main-back">
    <?php include $this->viewName; ?>
</main>
<footer>
	<p>&copy; - Tous droits réservés - 2023</p>
</footer>
</body>
</html>