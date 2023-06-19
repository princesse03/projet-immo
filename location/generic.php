<?php
 	require_once('../database.php');
	$id=$_GET['id'];
	$re=$connexion->prepare('SELECT * FROM biens WHERE id=?');
	$re->execute([$id]);
	$image=$re->fetch();
	// $sup = $_GET['sup'];
	// $montant=10000*$sup;
	// $recherche='SELECT * FROM biens WHERE  surface=? ';
	// 	 $search = $connexion->prepare($recherche);
	// 	 $search->execute([$sup]);
		 $images=$re->fetchAll();
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Description</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/noscript.css" />
		
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="symbol"><img src="images/logo7.jpg" alt="" /></span><span class="title">Description de la maison</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				


				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>Le local de vos rèves à <?php echo ($image['situation_geo']) ?></h1>
							<span class="image main"><img src="images/<?php echo ($image['libelle']) ?>" alt="" /></span>
							<p>Trouver à <?php echo ($image['situation_geo']) ?>   la duplexe <?php echo ($image['appelation']) ?> un cadre scomptieux accessible à tout pour rendre votre famille ou vos proche à l'abri du besoin</p>
							<h4>Caracteristique de la maison: <br><br>
								situation geographique:<?php echo ($image['situation_geo']) ?>;<br><br>
								nombre de pièce:<?php echo ($image['nbpiece']) ?>;<br><br>
								surface:<?php echo ($image['surface']) ?>m²;<br><br>
								montant à payer:<?php echo ($image['surface']*10000) ?>FCFA
								
							</h4>
							<a href="../achat/pdf.php?id=<?php echo($id)?>
										&&nom=<?php echo($image['nbpiece'])?>
										&&sup=<?php echo($image['surface'])?>
										&&situ=<?php echo($image['situation_geo'])?>
										&&typ=<?php echo($image['type_surface'])?>
										&&surf=<?php echo($image['type_maison'])?>"><button type='button'>Acheter</button></a>
							</div>
					</div>

				<!-- Footer -->
				

			</div>
	</body>
</html>