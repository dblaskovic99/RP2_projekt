<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<link rel="icon" type="image/x-icon" href="CSS/icon.ico">
	<title>Moj trening</title>
</head>
<body>
	<div class="header">
		<h1>Moj trening</h1>
	</div>

	<nav id="main-menu">
		<ul>
			<li><a <?php if($activePage =='loginSportas') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=loginSportas">Login sportaš</a></li>
			<li><a <?php if($activePage =='loginTrener') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=loginTrener">Login trener</a></li>
			<li><a <?php if($activePage =='registracijaSportas') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=registracijaSportas">Registracija sportaš</a></li>
			<li><a <?php if($activePage =='registracijaTrener') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=registracijaTrener">Registracija trener</a></li>

			<!--<li><a href="<//?php echo __SITE_URL; ?>/index.php?rt=registersportas">Registracija sportaša</a></li>-->
		</ul>
	</nav>
