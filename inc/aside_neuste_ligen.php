        <aside>
			<h1>Neuste Ligen:</h1>
			<div class="ligen">
				<?php
					$abfrage = "SELECT ligen.ligaId, ligen.name, ligen.beschreibung, ligen.logo, ligen.erstelltVon, user.username 
					FROM ligen, user
					WHERE ligen.erstelltVon = user.userId";
					$abfragen = mysqli_query($db, $abfrage);
					while ($abfragen && $row = mysqli_fetch_object($abfragen)) {
						$ligaId = $row->ligaId;
						$name = $row->name;
						$beschreibung = $row->beschreibung;
						$logo = $row->logo;
						$erstelltVon = $row->erstelltVon;
						$ersteller = $row->username;

				?>
					<div class="liga_block_klein" title="<?=$name?>">
						<a href="/ligatabelle/liga/index.php?liga=<?=$ligaId?>"><img src="/ligatabelle/img/ligen/<?=$logo?>">
						<div class="liga_info_klein">
							<h2><?=$name?></h2></a>
							<span class="ersteller"><a href="/ligatabelle/liga/index.php?liga=<?=$ligaId?>">Erstellt von </a><a href="profil/index.php?id=<?=$erstelltVon?>" title="Erstellt von <?=$ersteller?>"><?=$ersteller?></a></span>
							<span><a href="/ligatabelle/liga/index.php?liga=<?=$ligaId?>"><?=$beschreibung?></a></span>
						</div>
					</div>
				<?php
					}
				?>
			</div>
		</aside>