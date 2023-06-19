<!DOCTYPE html>
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
		        <form class="form-register" id="form-register" action="#" method="post">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<span class="step-text">AJOUT DE BIENS</span>
			            </h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="choix" name="choice" required>
											<span class="label">Destiné à la vente?</span>
										</label>
									</div>
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="numlot" name="numlot" required>
											<span class="label">N° du lot</span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="ilot" name="ilot" required>
											<span class="label">Lot</span>
										</label>
									</div>
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="superf" name="superficie" required>
											<span class="label">Superficie(m2)</span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="nombien" name="bien" required>
											<span class="label">Nom du bien</span>
										</label>
									</div>
                                    <div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="typbien" name="tbien" required>
											<span class="label">Type de bien</span>
										</label>
									</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="addr" name="adress" required>
											<span class="label">Adresse</span>
										</label>
									</div>
                                    <div class="form-holder form-holder-2">
										<label for="date" class="special-label">Quartier</label>
										<select name="street" id="street" class="form-control">
											<option value="" selected>---</option>
											<option value="16">COCODY</option>
											<option value="17">ABATTA</option>
											<option value="18">Macory RESIDENTIEL</option>
											<option value="19">KOUMASSI</option>
										</select>
									</div>
								</div>
                                <div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="valbien" name="valbien" required>
											<span class="label">valeur du bien</span>
										</label>
									</div>
                                    <div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="proprio" name="propri" required>
											<span class="label">Type de bien</span>
										</label>
									</div>
								</div>
                                <button type="submit">ANNULER</button>
                                <button type="submit">ENREGISTRER</button>
							</div>
			            </section> 
</body>
</html>