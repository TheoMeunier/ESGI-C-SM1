document.addEventListener('DOMContentLoaded', function () {
    var navList = document.getElementById('navList');
    var links = navList.querySelectorAll('a');

    links.forEach(function (link) {
        // Comparaison avec la partie de l'URL après le dernier '/'
        if (window.location.href.endsWith(link.getAttribute('href'))) {
            link.classList.add('active');
        }

        link.addEventListener('click', function () {
            // Remove the 'active' class from all links
            links.forEach(function (item) {
                item.classList.remove('active');
            });

            // Add the 'active' class to the clicked link
            this.classList.add('active');
        });
    });
});
