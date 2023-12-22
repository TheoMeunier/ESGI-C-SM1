<?php include '../views/component/meta.view.php'; ?>
<body>
<header>
    <div class="logo">PHILPHOTO</div>
    <input type="checkbox" id="nav_check" hidden>
    <nav>
      <ul id="navList">
        <li>
          <a href="/" >Home</a>
        </li>
        <li>
          <a href="/gallery">Portfolio</a>
        </li>
        <li>
          <a href="/aboutus">A propos</a>
        </li>
        <li>
          <a href="/contact">Contact</a>
        </li>
      </ul>
    </nav>
    <label for="nav_check" class="hamburger">
      <div></div>
      <div></div>
      <div></div>
    </label>
  </header>
<main>
    <?php include $this->viewName; ?>
</main>
<footer>
	<div class="content">
		<img src="https://png.pngtree.com/png-vector/20220907/ourmid/pngtree-camera-icon-design-png-image_6141281.png"
		     alt="" style="filter: invert(1)">
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