<?php require_once __SITE_PATH . '/view/_headerTrener.php'; ?>

<div class="athlete-list">
	<h2 style="font-weight: bold;">Popis Vaših sportaša:</h2>
	<div class="row">
		<?php 
			foreach( $sportasList as $sportas )
			{
				echo '<div class="col-lg-4 col-md-6 mb-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">' . $sportas->ime . ' ' . $sportas->prezime . '</h5>
									<p class="card-text">
										<strong>Username:</strong> ' . $sportas->username . '<br>
										<strong>Datum rođenja:</strong> ' . $sportas->datum_rodenja . '<br>
										<strong>Kategorija:</strong> ' . $sportas->kategorija . '<br>
										<strong>Klub:</strong> ' . $sportas->id_kluba . '
									</p>
									<a href="' . __SITE_URL .'/index.php?rt=sportasTrener&username=' . $sportas->username . '" class="btn my-btn">Pogledaj profil</a>
								</div>
							</div>
						</div>';
			}
		?>
	</div>
</div>

<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
