
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<link rel="icon" type="image/x-icon" href="CSS/icon.ico">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<title>Moj trening</title>
</head>
<body>
	<div class="header">
		<h1>Moj trening</h1>
		
	</div>

	<nav id="main-menu">
		<ul>
	
			<li><a <?php if($activePage =='svisportasiTrener') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=svisportasiTrener">Popis sportaša</a></li>
			<li><a <?php if($activePage =='treningTrener') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=treningTrener">Dodaj novi trening!</a></li>
			<li><a <?php if($activePage =='natjecanjeTrener') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=natjecanjeTrener">Dodaj novo natjecanje!</a></li>
			<li><a <?php if($activePage =='obavijestiTrener') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=obavijestiTrener">Obavijesti</a></li>
			<li><a href="<?php echo __SITE_URL; ?>/index.php?rt=logout">Odjavi se</a></li>
		</ul>
	</nav>


