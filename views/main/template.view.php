<section>
    <h2>Menu</h2>
    <nav>

    </nav>
</section>
<section>
    <h2>Footer</h2>

</section>
<section>
    <h2>Button</h2>

</section>
<section>
    <h2>Form</h2>
	<form>
		<input type="text" name="name" id="name" placeholder="name">
		<input type="email" name="email" id="email" placeholder="email">
		<input type="date" name="date" id="date" placeholder="date">
		<input type="password" name="password" id="password" placeholder="password">
		<input type="submit" value="submit">
		<input type="reset" value="reset">
	</form>
</section>
<section>
    <h2>title</h2>
    <h1>H1</h1>
    <h2>H2</h2>
    <h3>H3</h3>
    <h4>H4</h4>
    <h5>H5</h5>
</section>
<section>
    <h2>Gallery</h2>
    <hr>
    <div class="gallery">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <img src="https://images.unsplash.com/photo-1702700630321-4e3a9deb8750?q=80&w=987&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        <?php endfor; ?>
    </div>
</section>

<section>
    <h2>Modale</h2>
    <hr>
<div class="modal" id="modal" style="display:block; position:relative" >
    <div class="modal-content">
        <span class="close" id="close-modal">&times;</span>
        <img id="modal-image" alt="Enlarged Image" src="https://images.unsplash.com/photo-1702700630321-4e3a9deb8750?q=80&w=987&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
        <div id="modal-info">
            <p id="user-name">Username</p>
            <p id="photo-title">Photo title</p>
            <textarea id="comment" placeholder="Add a comment"></textarea>
            <button class="btn_comment" id="add-comment">Add Comment</button>
        </div>
    </div>
</div>

</section>

<section>
    <h2>Card profile</h2>
    <hr>
    <div class="container">
      <div class="cover-photo">
        <img src="https://images.unsplash.com/photo-1565464027194-7957a2295fb7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" class="profile">
      </div>
      <div class="profile-name">Prenom Nom</div>
      <p class="about">Bonsoir je suis la description</p>
      <button class="msg-btn">Message</button>
      <button class="follow-btn">Suivre</button>
      <div>
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-youtube"></i>
        <i class="fab fa-twitter"></i>
      </div>
    </div>
</section>
<section>
    <h2>Navbar</h2>
    <hr>

</section>


<script src="https://kit.fontawesome.com/c62d0ae7da.js" crossorigin="anonymous"></script>


