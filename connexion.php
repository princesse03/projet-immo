<?php
	require_once("login.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <title>Connexion</title>
</head>
<body>
<div class="signupSection">
<div class="info">
    <h3>CHEZ SOI IMMOBILIER</h3>
<h4>"Concretiser vos reves!"<br><br></h4> 
<h5>Chez Soi Immobilier est une agence immobiliere agréé qui vous accompagne dans vos projets immobilers.<br><br>
Nous vous accompagnon du debut jusqu'à la realisation de votre reve selon votre projet.<br><br>
Ne prenez donc pas de risque, n'hesitez pas à confier vos projets immobilier à Chez Soi immobilier.<br><br></h5>
  </div>
  <form action="" method="POST" class="signupForm" name="signupform">
    <h2>Login</h2>  
    <?php
					if(isset($erreur)){
						echo("<p class='modif'>$erreur</p>");
					}
					?>
    <ul class="noBullet">
    <li>
        <label for="email"></label>
        <input type="email" class="inputFields" id="email" name="email" placeholder="Email" />
      </li>
      <li>
        <label for="password"></label>
        <input type="password" class="inputFields" id="password" name="password" placeholder="Password" />
      </li>
      
      <li id="center-btn">
        <input type="submit" id="join-btn" name="join" alt="Join" value="Valider">
      </li>
    </ul>
  </form>
</div>
</body>
</html>
