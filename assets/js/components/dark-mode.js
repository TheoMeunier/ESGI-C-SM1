document.addEventListener('DOMContentLoaded', () => {
	const darkMode = document.querySelector('.dark-mode');
	let isDarkMode = false;

	darkMode.addEventListener('click', () => {
		const moonIcon = darkMode.querySelector('.moon-icon');
		const sunIcon = darkMode.querySelector('.sun-icon');

		moonIcon.style.display = isDarkMode ? 'none' : 'block';
		sunIcon.style.display = isDarkMode ? 'block' : 'none';

		toggleDarkMode();
		isDarkMode = !isDarkMode;
	});

	const toggleDarkMode = () => {
		document.documentElement.classList.toggle('data-dark-mode');
	};
});