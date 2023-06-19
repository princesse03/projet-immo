<?php
session_start();
require_once('../database.php');
// require_once("session.php");
if(!isset($_SESSION['visiteur'])){
    // header('location:connexion.php');

}
?>
<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>LOCATION</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../biens/description.css" />
		<link rel="stylesheet" href="../header.css" />
		<link rel="stylesheet" href="../footer.css">

		<!-- <link rel="stylesheet" href="assets/css/noscript.css" /> -->
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					
					<?php
					include('../header.php');
					 ?>
			

				<!-- Main -->
					<div id="main">
						<div class="inner">
						
							<section class="tiles">
								<div class='article'>
									<table>
										<tbody>
										<tr>
								<?php

									$requete='SELECT * FROM biens';
									$image = $connexion->prepare($requete);
									$image->execute();
									$images=$image->fetchAll();
									$count = 0; // Variable pour compter les images affichées
									foreach($images as $nom){
										if ($count % 3 == 0) {
											// Nouvelle ligne pour chaque quatrième image
											echo '<tr>';
										  }?>

										<td>
										<article class="style1">
											<span class="image">
											<img src="images/<?php echo ($nom['libelle']) ?>" alt="" />
											</span>
									
									<!-- <a href="generic.php?id=<?php echo($nom['id'])?>">
									</a> -->
									
									</article>
									<div class="txt">
									<h5>Villa à acheter située<br> à <?php echo ($nom['situation_geo']) ?></h5>
									</div>
										<div class="voir">
										<button><a href="generic.php?id=<?php echo($nom['id'])?>">Description</a></button>
										<button><a href="../achat/visualisation.php?id=<?php echo($nom['id'])?>">Acheter</a></button>
										</div>
									
										</td>
										<?php
    									    $count++;

    									    if ($count % 3 == 0) {
    									      // Fermer la ligne après chaque quatrième image
    									      echo '</tr>';
    									    }
    									  }
									  
    									  // Vérifier si une ligne doit être fermée après la dernière image
    									  if ($count % 3 != 0) {
    									    echo '</tr>';
    									  }
    									?>
									
									</tr>
									</tbody>
									</table>
								</div>
								
							</section>
						</div>
					</div>

				
			</div>
								  	
	</body>
</html>