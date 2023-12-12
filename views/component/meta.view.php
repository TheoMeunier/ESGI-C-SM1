<?php
$manifest = json_decode(file_get_contents('./../public/build/manifest.json'), true);
$css      = $manifest['assets/js/app.css']['file'];
$js       = $manifest['assets/js/app.js']['file'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Template Front/Back</title>
	<!--<script type="module" src="http://localhost:5173/assets/main.js"></script>
	<script type="module" src="http://localhost:5173/@vite/client"></script>-->
	<link rel="stylesheet" href="./../build/<?php echo $css; ?>">
	<script src="./../build/<?php echo $js; ?>"></script>
</head>