document.addEventListener('DOMContentLoaded', () => {
    const artistNameElement = document.getElementById('artist-name');
    const artistWorksElement = document.getElementById('artist-works');
    const modal = document.getElementById('modal');
    const modalImage = document.getElementById('modal-image');
    const photoTitle = document.getElementById('photo-title');
    const commentInput = document.getElementById('comment');
    const backToGalleryLink = document.getElementById('back-to-gallery');
    const closeModalButton = document.getElementById('close-modal');
    const addCommentButton = document.getElementById('add-comment');

    const artistName = extractArtistNameFromUrl();

    document.title = `Artist Profile - ${artistName}`;
    artistNameElement.textContent = `Artist: ${artistName}`;

    fetchArtistWorks(artistName);

    closeModalButton.addEventListener('click', closeModal);
    addCommentButton.addEventListener('click', addComment);
    backToGalleryLink.addEventListener('click', () => {
        window.location.href = '/gallery';
    });

    function extractArtistNameFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('name');
    }

    function openModal(photo) {
        modalImage.src = photo.urls.regular;
        const encodedArtistName = encodeURIComponent(photo.user.username);
        photoTitle.textContent = `Title: ${photo.alt_description}`;
        modal.style.display = 'block';
    }

    function closeModal() {
        modal.style.display = 'none';
    }

    function addComment() {
        const comment = commentInput.value;
        console.log(`Added comment: ${comment}`);
    }

    function fetchArtistWorks(artistName) {
        const accessKey = 'DSKCITSO2pfygjgKwqp8SZiiwYepEtgHvCbOExTiRnw';
        fetch(`https://api.unsplash.com/users/${artistName}/photos/?client_id=${accessKey}&per_page=20`)
            .then(response => response.json())
            .then(displayWorks)
            .catch(error => console.error('Error fetching artist works:', error));
    }

    function displayWorks(data) {
        data.forEach(photo => {
            const img = createImage(photo);
            artistWorksElement.appendChild(img);
        });
    }

    function createImage(photo) {
        const img = document.createElement('img');
        img.src = photo.urls.small;
        img.alt = photo.alt_description;
        img.addEventListener('click', () => openModal(photo));
        return img;
    }
});
