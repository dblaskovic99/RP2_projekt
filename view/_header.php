<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>Moj sport</title>
</head>
<body>
	<div class = naslovnatraka>
		<h1><?php echo $title; ?></h1>
	</div>
<?php  if(isset($_SESSION['username'])){?>

	<nav>
		<ul>
			<li><a href="index.php?rt=mycrew">Moj profil</a></li>
      		<li><a href="index.php?rt=follow/following"> Sportovi </a></li>
      		<li><a href="index.php?rt=follow/followers"> Klubovi </a></li>
			<li><a href="index.php?rt=book"> Treninzi </a></li>
			<li><a href="index.php?rt=login/out"> Log out </a></li>
		</ul>
	</nav>

<?php } else "samo nekaj ispis"?>
