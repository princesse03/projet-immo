<?php
 session_start();
require_once('../database.php');
if(!isset($_SESSION['visiteur'])){
    header('location:../connexion.php');}
// if (isset($_POST["poin"])){
//         if(!empty($_POST["streat"])&&
//              !empty($_POST["stret"])&&
//              !empty($_POST["street"])
//         )
//         {

//                 $id_visiteur=0;
//                 $_prix=10000;
//                 $superficie=htmlspecialchars($_POST["sup"]);
//                 $montant=$_prix*$superficie;
//                 $payable=$_POST['prix'];
//                 $surf=$_POST['streat']; 
//                 $maison=htmlspecialchars(trim($_POST["stret"]));
//                 $quartier=htmlspecialchars(trim($_POST["street"]));
//                 $nombr=htmlspecialchars(trim($_POST["nb"]));
//                 $query='SELECT * FROM biens WHERE surface=?';
//                 $affichag = $connexion->prepare($query);
//                 $affichag->execute([$superficie]);
//                 if($affichag->rowCount()==0){
//                     $erreur='Vos caractéristiques n\'existe pas';
//                 }
//                 else{
//                     require_once('./pdf.php');
//                      $requete="INSERT INTO paiement values(?,?,?,?,?,?);";
//                      $prepare=$connexion->prepare($requete);
//                      $prepare->execute([NULL,$id_visiteur,$montant,$superficie,$maison,$surf]);      
                
//                     //  header('location:../location/location.php');
//                 }

               
//             }
//     else{
//          echo('information vide');
//       }
//     }


             

   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="achat.css">
</head>
<body>
    
    <section>
        <div class='bleu'>
            <?php
                        if(isset($erreur)){
                            echo('<p id="modif">'.$erreur.'</p>');
                            
                        }         
                    ?>
            <div class="blanc">
                <form action="./visualisation.php" method="get">

                    
                    <div class="inner">
                        <a href="#" class="avartar">
                            <img src="image/avartar.png" alt="">
                        </a>
                        <div class="form-row">
                            <div class="select">
                                <div class="form-holder">
                                    <Label>TYPE DE SURFACE</Label>
                                    <select name="streat" id="street" class="form-control">
                                        <option value="" selected></option>
                                        <option value="carre">Surface carrée</option>
                                        <option value="rectangle">Surface rectangle</option>

                                    </select>
                                </div>
                            </div> 
                        </div>

                        <div class="form-row">
                            <div class="select"> 
                                <div class="form-holder">
                                    <Label>TYPE DE MAISON</Label>
                                    <select name="stret" id="street" class="form-control">
                                        <option value="" selected></option>
                                        <option value="STUDIO">STUDIO</option>
                                        <option value="MAISON_BASSE">MAISON BASSE</option>
                                        <option value="RESIDENCE">RESIDENCE</option>
                                        <option value="DUPLESSE">DUPLESSE</option>
                                        <option value="DEUX_NIVEAUX">DEUX NIVEAUX</option>
                                        <option value="APPARTEMMENT">APPARTEMMENT</option>
                                    </select>
                                </div>
                            </div> 
                        </div>

                        <div class="form-row">
                            <div class="select">
                                <div class="form-holder">
                                    <label>QUARTIER</label>
                                    <select name="street" id="street" class="form-control" >
                                        <option value="" selected></option>
                                        <option value="cocody">COCODY</option>
                                        <option value="macory residentiel">MACORY RESIDENTIEL</option>
                                        <option value="abatta">ABATTA</option>
                                        <option value="koumassi">KOUMASSI</option>
                                        <option value="bingeville">BINGRVILLE</option>
                                        <option value="yopougon">YOPOUGON</option> 
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="select">
                                <div class="form-holder">
                                    <label>NOMBRE DE PIECE</label>
                                    <select name="nb" id="street" class="form-control" >
                                        <option value="" selected></option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                        <option value="">8</option>
                                        <option value="">10</option> 
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-holder">
                                <input type="number"  id="dp1" placeholder="Surperficie en metre carré" name="sup">
                            </div>
                        </div>

                        <div class="form-row">
                           <div class="form-holder">
                                <input  id="dp1" placeholder="Prix en FCFA" name="prix" type="hidden" readonly value="<?php
                                    // if(!empty(($_POST['carre']))){
                                    //     echo($calc);
                                    // }
                                ?>">
                            </div>
                        </div>
                                
                        <div class="next">
                            <a href="#"><input type="submit" value="VALIDER" name="poin"></a>  
                            <input type="button" value="ANNULER">  
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </section>
    
   
</body>
</html>