<?php echo $this->includeComponent('meta', $config = []); ?>
<body>
<header>
	<?php echo $this->includeComponent('navbar', $config = []); ?>
</header>
<main>
    <?php include $this->viewName; ?>
</main>
	<?php echo $this->includeComponent('footer', $config = []); ?>
</body>
</html>