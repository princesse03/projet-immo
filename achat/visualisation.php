<?php
 	require_once('../database.php');
	// $id=$_GET['id'];
	// $re=$connexion->prepare('SELECT * FROM biens WHERE id=?');
	// $re->execute([$id]);
	// $image=$re->fetch();
	if(isset($_GET['sup'])){
		$sup = $_GET['sup'];
		$surf=$_GET['streat'];
		$maison=htmlspecialchars(trim($_GET["stret"]));
		$quartier=htmlspecialchars(trim($_GET["street"]));
        $nombr=htmlspecialchars(trim($_GET["nb"]));
		$montant=10000*$sup;
		// $payable=$_GET[''];
		 $recherche='SELECT * FROM biens WHERE  surface=? ';
		 $search = $connexion->prepare($recherche);
		 $search->execute([$sup]);
		 $image=$search->fetchAll();
	}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Description</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/noscript.css" />
		<link rel="stylesheet" href="../biens/description.css">
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					

				

						<div class="inner">
						
							<section class="tiles">
								<div class='article'>
									<table>
										<tbody>
										<tr>
								<?php

									// $requete='SELECT * FROM biens';
									// $image = $connexion->prepare($requete);
									// $image->execute();
									// $images=$image->fetchAll();
									$count = 0; // Variable pour compter les images affichées
									foreach($image as $nom){
										if ($count % 3 == 0) {
											// Nouvelle ligne pour chaque quatrième image
											echo '<tr>';
										  }?>

										<td>
										<article class="style1">
											<span class="image">
											<img src="../location/images/<?php echo ($nom['libelle']) ?>" alt="" />
											</span>
									
									<!-- <a href="generic.php?id=<?php echo($nom['id'])?>">
									</a> -->
									
									</article>
									<div class="txt">
									<h5>Villa à acheter située<br> à <?php echo ($nom['situation_geo'])?> à <?php echo ($montant) ?>FCFA</h5>
									</div>
										<div class="voir">
										<button><a href="../location/generic.php?id=<?php echo($nom['id'])?>">Description</a></button>
										<button><a href="./pdf.php?id=<?php echo($nom['id'])?>
										&&nom=<?php echo($nom['nbpiece'])?>
										&&sup=<?php echo($nom['surface'])?>
										&&situ=<?php echo($nom['situation_geo'])?>
										&&typ=<?php echo($nom['type_surface'])?>
										&&surf=<?php echo($nom['type_maison'])?>">Acheter</a></button>
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
	</body>
</html>