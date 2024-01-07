<?php echo $this->includeComponent('meta', $config = []); ?>
<body>
<header>
	<?php echo $this->includeComponent('navbar', $config = []); ?>
</header>
<main>
	<div class="dark-mode">
		<span class="moon-icon" style="display: none;"><?php echo icon('moon'); ?></span>
		<span class="sun-icon"><?php echo icon('sun'); ?></span>
	</div>

	<?php include $this->viewName; ?>
</main>
	<?php echo $this->includeComponent('footer', $config = []); ?>
</body>
</html>