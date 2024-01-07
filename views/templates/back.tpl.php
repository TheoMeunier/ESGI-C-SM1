<?php echo $this->includeComponent('meta', $config = []); ?>
<body>
<header>
    <?php echo $this->includeComponent('navbarAdmin', $config = []); ?>
</header>
<main class="main-admin">
    <?php include $this->viewName; ?>
</main>
<?php echo $this->includeComponent('footer', $config = []); ?>
</body>
</html>