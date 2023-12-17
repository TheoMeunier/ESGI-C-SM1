<section>
	<h2>Menu</h2>
	<hr>
	<header>
		<nav>
			<ul>
				<li><a href="/">Accueil</a></li>
				<li><a href="/gallery">Gallerie</a></li>
			</ul>
		</nav>
		<h1>Henri Cartier-Bresson</h1>
		<nav>
			<ul>
				<li><a href="/contact">Contact</a></li>
				<li><a href="/a-propos">À Propos</a></li>
				<li><a><?= icon('user-round') ?></a></li>
			</ul>
		</nav>
	</header>
</section>
<section>
	<h2>Footer</h2>
	<hr>
	<footer>
		<div class="mention-legale">
			<ul>
				<li><?= icon('twitter') ?> </li>
				<li><?= icon('facebook') ?> </li>
				<li><?= icon('instagram') ?> </li>
			</ul>
			<p>&copy; - Tous droits réservés - 2023</p>
			<ul>
				<li><a href="#">Mentions Légales</a></li>
				<li><a href="#">CGU</a></li>
				<li><a href="#">Confidentialité</a></li>
			</ul>
		</div>
	</footer>
</section>
<section>
	<h2>Icon</h2>
	<hr>
    <?= icon('user-round') ?>
    <?= icon('log-in') ?>
    <?= icon('log-out') ?>
    <?= icon('menu') ?>
    <?= icon('x') ?>
    <?= icon('twitter') ?>
    <?= icon('facebook') ?>
    <?= icon('instagram') ?>
</section>
<section>
	<h2>Bouton</h2>
	<hr>
	<button class="button">Button Simple</button>
	<button class="button button-black">Bouton noir</button>
	<button class="button button-white">Bouton blanc</button>
	<br>
	<h2>Taille des boutons</h2>
	<hr>
	<button class="button button-lg">Bouton Large</button>
	<button class="button button-md">Bouton Moyen</button>
</section>
<section>
	<h2>Alerte</h2>
	<hr>
	<p class="alert">Alerte Standard</p>
	<p class="alert alert-error">Alerte Erreur</p>
	<p class="alert alert-success">Alerte Succès</p>
	<p class="alert alert-warning">Alerte Avertissement</p>
	<p class="alert alert-info">Alerte Info</p>
</section>
<section>
	<h2>Formulaire</h2>
	<hr>
	<form>
		<fieldset>
			<legend>Legend</legend>
			<label for="name">Name</label>
			<input type="text" name="name" id="name" placeholder="Name">
			<input type="email" name="email" id="email" placeholder="Email">
			<input type="date" name="date" id="date" placeholder="Date">
			<input type="password" name="password" id="password" placeholder="Password">
			<input type="submit" value="Submit">
			<input type="reset" value="Reset">
		</fieldset>
	</form>
</section>
<section>
	<h2>Hiérarchie des Titres</h2>
	<hr>
	<h1>H1</h1>
	<h2>H2</h2>
	<h3>H3</h3>
	<h4>H4</h4>
	<h5>H5</h5>
</section>
<section>
	<h2>Tableau</h2>
	<hr>
	<table>
		<thead>
		<tr>
			<th>Colonne 1</th>
			<th>Colonne 2</th>
			<th>Colonne 3</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>Ligne 1</td>
			<td>Ligne 1</td>
			<td>Ligne 1</td>
		</tr>
		<tr>
			<td>Ligne 2</td>
			<td>Ligne 2</td>
			<td>Ligne 2</td>
		</tr>
		<tr>
			<td>Ligne 3</td>
			<td>Ligne 3</td>
			<td>Ligne 3</td>
		</tr>
		</tbody>
	</table>
</section>
<section>
	<h2>Gallery</h2>
	<hr>
	<div class="gallery-container">
        <?php for ($i = 0; $i < 4; $i++): ?>
			<img src="https://images.unsplash.com/photo-1702700630321-4e3a9deb8750?q=80&w=987&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
			     alt="">
        <?php endfor; ?>
	</div>
</section>

<section>
	<h2>Modale</h2>
	<hr>
	<div class="modal-content">
		<span class="close" id="close-modal">&times;</span>
		<img src="https://apprendre-la-photo.fr/wp-content/uploads/2021/01/news_31916_0.jpg" id="modal-image"
		     alt="Enlarged Image">
		<div id="modal-info">
			<p id="user-name">Username</p>
			<p id="photo-title"></p>
			<label for="comment"></label>
			<textarea id="comment" placeholder="Add a comment"></textarea>
			<button class="button button-green" id="add-comment">Add Comment</button>
		</div>
	</div>

</section>

<section>
	<h2>Card profile</h2>
	<hr>
	<div class="profile">
		<img class="profile-image" src="https://apprendre-la-photo.fr/wp-content/uploads/2021/01/news_31916_0.jpg" alt="Profile Image">
		<div class="profile-info">
			<h2 class="profile-name">Alex Shuper</h2>
			<p class="profile-title">Digital Artist & Photographer</p>
			<p class="profile-location">Liepaja, Latvia</p>
			<h3 class="profile-interests-title">Centres d'intérêt</h3>
			<ul class="profile-interests-list">
				<li>Art Numérique</li>
				<li>Rendus 3D</li>
				<li>Fonds D'écran HD</li>
				<li>Photographie</li>
			</ul>
		</div>
	</div>

</section>

<script src="https://kit.fontawesome.com/c62d0ae7da.js" crossorigin="anonymous"></script>


