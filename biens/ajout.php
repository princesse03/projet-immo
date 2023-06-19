<?php
 require_once('../database.php');
 if (isset($_POST["poin"])){
	$nbrpi=htmlspecialchars(trim($_POST["ilot"]));
	$surf=htmlspecialchars(trim($_POST["superficie"]));
	$typsurf=htmlspecialchars(trim($_POST["tbien"]));
	// $import=htmlspecialchars(trim($_POST["fichier"]));
	$typmais=htmlspecialchars(trim($_POST["adress"]));
	$quart=htmlspecialchars(trim($_POST["street"]));
	$valeur=htmlspecialchars(trim($_POST["valbien"]));
	if(isset($_FILES["fichier"] ) && $_FILES['fichier']["error"]==0){
		$dossier="images";
		$temp_name=$_FILES["fichier"]['tmp_name'];
		if(!is_uploaded_file($temp_name)){
			exit('Le fichier est introuvable');
		}
		if($_FILES['fichier']["size"]>=12000000){
			exit("Le fichier est trop volumineux");
		}
		$infofichier = pathinfo($_FILES['fichier']['name']);
		$extension = $infofichier['extension'];
		$extension = strtolower($extension);
		$autorise = ["png", "jpeg", "jpg", "wbep"];
		if(!in_array($extension,$autorise)){
			exit('L\'extension n\est pas autorisée');
		}
		$nom_photo = $_FILES['fichier']['name'];
		$ph_name = $nom_photo;
		move_uploaded_file($temp_name, '../location/images'.$nom_photo);
			// exit('probleme');
		
	}else{
		// $photo_err=$_FILES['fichier']['error'];
		$ph_name = "inconnu.png";
	}
	$insert='INSERT INTO biens values(?,?,?,?,?,?,?,?)';
	$preparer=$connexion->prepare($insert);
	$preparer->execute([NULL,$ph_name,$nbrpi,$surf,$quart,$typsurf,$typmais,$valeur]);
	
 }
	
?>		
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajout.css">
    <title>Document</title>
</head>
<body>
    <div class="page-content">
		<div class="wizard-heading">AJOUT DE BIENS</div>
		<div class="wizard-v6-content">
			<div class="wizard-form">
		        <form class="form-register" id="form-register" action="" method="post" enctype="multipart/form-data">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<span class="step-text">AJOUT DE BIENS</span>
			            </h2>
			            <section>
			                <div class="inner">
								<!-- <div class="form-row">
									
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="numlot" name="numlot" required>
											<span class="label">libelle</span>
										</label>
									</div>
								</div> -->
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="ilot" name="ilot" required>
											<span class="label">nombre de piece</span>
										</label>
									</div>
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="superf" name="superficie" required>
											<span class="label">surface</span>
										</label>
									</div>
								</div>
								<div class="form-row">
                                    <div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="typbien" name="tbien" required>
											<span class="label">type surface</span>
										</label>
									</div>
										<div class="form-holder form-holder-2">
											<label class="form-row-inner">
												<input type="file" name="fichier" id="">
												<span class="label"></span>
											</label>
										</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="addr" name="adress" required>
											<span class="label">type maison</span>
										</label>
									</div>
                                    <div class="form-holder form-holder-2">
										<label for="date" class="special-label">Quartier</label>
										<select name="street" id="street" class="form-control">
											<option value="" selected>---</option>
											<option value="cocody">COCODY</option>
											<option value="abatta">ABATTA</option>
											<option value="marcory residentiel">Macory RESIDENTIEL</option>
											<option value="koumassi">KOUMASSI</option>
										</select>
									</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="valbien" name="valbien" required>
											<span class="label">nom du bien</span>
										</label>
									</div>
								</div>
                                
                               <div class="bouton">
                                <button type="submit" name='poin'>AJOUTER</button>
                                <button type="button">ANNULER</button>
                               </div>
                                
							</div>
			            </section>
</body>
</html>