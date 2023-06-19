<?php
session_start();
require_once('../database.php');
// require_once("session.php");
if(!isset($_SESSION['visiteur'])){
     header('location:../connexion.php');
     $pass=($_POST["password"]);
     
    //  $requete = "SELECT * FROM visiteur WHERE email=? AND passwor=? ";
    //  $selection=$connexion->prepare($requete);
    //  $selection->execute([$mail,$pass]);
    //  $client=$selection->fetch();
    //  $_SESSION["visiteur"]=$client; 

}
?>
<!DOCTYPE html>
<html> 
	<head>
		<meta charset="utf-8">
		<title>CSI INSCRIPTION</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="achat2.css">
	</head>

	<body> 

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
			
				<div class="image-holder">
					<h1>CHEZ SOI IMMOBILIER</h1><br><br>
                    <h4>Concretiser vos reves! <br><br>
                    Chez Soi Immobilier est une agence immobiliere agréé qui vous accompagne dans vos projets immobilers.<br><br>
                    Ne prenez donc pas de risque, n'hesitez pas à confier vos projets immobilier à Chez Soi immobilier</h4>
    
				</div>
				<form action="" method='post'>
					<h3>C_SI INSCRIPTION</h3>
					
					<div class="form-group">
						<input type="text" placeholder="Nom" class="form-control" name="name" value='<?php echo ($_SESSION['visiteur']['nom']) ?>'>
						<input type="text" placeholder="Prenom" class="form-control" name="lastname" value='<?php echo ($_SESSION['visiteur']['prenom']) ?>'>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Telephone" class="form-control" name="cell" value='<?php echo ($_SESSION['visiteur']['contact']) ?>'>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<select id="" class="form-control" name="sex" value='<?php echo ($_SESSION['visiteur']['sexe']) ?>'>
							<option value="" disabled selected>Sexe</option>
							<option value="male">M</option>
							<option value="femal">F</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email " class="form-control" name="mail" value='<?php echo ($_SESSION['visiteur']['email']) ?>'>
						<i class="zmdi zmdi-email"></i>
					</div>
					<a href="./achat.php"><button name="envoi" type='button'>SUIVANT
					</button></a>
				</form>

			</div>
		</div>
		
	</body>
</html>