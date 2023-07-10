<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<title>Moj trening</title>
	<?php
	setlocale(LC_TIME, 'hr_HR.utf8'); // Postavite hrvatski jezik kao lokalne postavke
	?>
</head>
<body>
	<div class="header">
		<h1>Moj trening</h1>
		
	</div>

	<nav id="main-menu">
		<ul>
	
			<li><a <?php if($activePage =='treningSportas') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=treningSportas">Popis neodrađenih treninga</a></li>
			<li><a <?php if($activePage =='OdradeniSportas') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=OdradeniSportas">Popis odrađenih treninga</a></li>
			<li><a <?php if($activePage =='natjecanjaSportas') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=natjecanjaSportas">Buduća natjecanja</a></li>

			<li><a <?php if($activePage =='kalendarSportas') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=kalendarSportas">Kalendar</a></li>
			<li><a <?php if($activePage =='obavijestiSportas') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=obavijestiSportas">Obavijesti</a></li>
			<li><a <?php if($activePage =='logout') {echo 'class="active"';} ?> href="<?php echo __SITE_URL; ?>/index.php?rt=logout">Odjavi se</a></li>
			

			<!--<li><a href="<//?php echo __SITE_URL; ?>/index.php?rt=registersportas">Registracija sportaša</a></li>-->
		</ul>
	</nav>
