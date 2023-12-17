<form>
	<fieldset class="filter">
		<label for="filter">Filter by category</label>
		<select id="filter">
			<option value="all">All</option>
			<option value="nature">Nature</option>
			<option value="animals">Animals</option>
			<option value="people">People</option>
			<option value="buildings">Buildings</option>
			<option value="objects">Objects</option>
		</select>
		<input type="submit" value="Filter">
	</fieldset>
</form>
<div class="gallery gallery-container"></div>

<div class="modal" id="modal">
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
</div>
