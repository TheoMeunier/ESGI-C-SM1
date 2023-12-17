document.addEventListener('DOMContentLoaded', () => {
    const accessKey = 'DSKCITSO2pfygjgKwqp8SZiiwYepEtgHvCbOExTiRnw';
    const gallery = document.querySelector('.gallery');
    const modal = document.getElementById('modal');
    const modalImage = document.getElementById('modal-image');
    const userName = document.getElementById('user-name');
    const photoTitle = document.getElementById('photo-title');
    const commentInput = document.getElementById('comment');
    const closeModalButton = document.getElementById('close-modal');
    const addCommentButton = document.getElementById('add-comment');

    const fetchPhotos = async () => {
        const response = await fetch(`https://api.unsplash.com/photos/?client_id=${accessKey}`);
        const data = await response.json();
        displayPhotos(data);
    };

    const displayPhotos = (data) => {
        data.forEach(photo => {
            const img = createImage(photo);
            gallery.appendChild(img);
        });
    };

    const createImage = (photo) => {
        const img = document.createElement('img');
        img.src = photo.urls.small;
        img.alt = photo.alt_description;
        img.addEventListener('click', () => openModal(photo));
        return img;
    };

    const openModal = (photo) => {
        modalImage.src = photo.urls.regular;
        userName.textContent = `By: ${photo.user.username}`;
        const encodedArtistName = encodeURIComponent(photo.user.username);
        userName.setAttribute('data-artist-name', encodedArtistName);
        userName.setAttribute('data-artist-id', photo.user.id);
        photoTitle.textContent = `Title: ${photo.alt_description}`;
        modal.style.display = 'block';
    };

    const closeModal = () => {
        modal.style.display = 'none';
    };

    const addComment = () => {
        const comment = commentInput.value;
        console.log(`Added comment: ${comment}`);
    };

    const redirectToArtistPage = () => {
        const artistName = userName.getAttribute('data-artist-name');
        window.location.href = `/artist?name=${artistName}`;
    };

    fetchPhotos();

    closeModalButton.addEventListener('click', closeModal);
    addCommentButton.addEventListener('click', addComment);
    userName.addEventListener('click', redirectToArtistPage);
});
