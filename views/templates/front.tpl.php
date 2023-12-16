<?php include './../views/component/meta.php'; ?>
<body>
<header>
	<nav>
		<ul>
			<li><a href="/">accueil</a></li>
			<li><a href="/gallery">portfolio</a></li>
		</ul>
	</nav>
	<h1>Henri Cartier-Bresson</h1>
	<nav>
		<ul>
			<li><a href="/contact">contact</a></li>
			<li><a href="/a-propos">a-propos</a></li>
		</ul>
	</nav>
</header>
<main class="main-front">
    <?php include $this->viewName; ?>
</main>
<footer>
	<div class="content">
		<div class="category">
			<section>
				<h2>Catégorie</h2>
				<ul>
					<li><a href="#">Portrait</a></li>
					<li><a href="#">Paysage</a></li>
					<li><a href="#">Nature</a></li>
					<li><a href="#">Ville</a></li>
				</ul>
			</section>
			<section>
				<h2>Matériel</h2>
				<ul>
					<li><a href="#">Appareil photo</a></li>
					<li><a href="#">Objectif</a></li>
					<li><a href="#">Trépied</a></li>
				</ul>
			</section>
			<section>
				<h2>Nous contacter</h2>
			</section>
			<section>
				<h2>A propos</h2>
			</section>
		</div>
	</div>
	<div class="mention-legale">
		<p>&copy; - Tous droits réservés - 2023</p>
		<ul>
			<li><a href="#">Mentions légales</a></li>
			<li><a href="#">CGU</a></li>
			<li><a href="#">Confidentialité</a></li>
		</ul>
	</div>
</footer>
</body>
</html>