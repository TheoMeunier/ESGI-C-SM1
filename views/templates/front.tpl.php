<?= $this->component('meta', $config = []); ?>
<body>
<header>
	<?= $this->component('navbar', $config = []); ?>
</header>
<main>
    <?= $this->component('darkMode', $config = []); ?>
    <?= $this->component('flash', $config = []); ?>
	<?php include $this->viewName; ?>
</main>
	<?= $this->component('footer', $config = []); ?>
</body>
</html>