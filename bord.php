<?php
    require_once('database.php');
    $bien=$connexion->prepare('SELECT * FROM biens');
    $bien->execute();
    $nbien = $bien->rowCount();

    $client=$connexion->prepare('SELECT * FROM client');
    $client->execute();
    $nclient = $client->rowCount();

    $visite=$connexion->prepare('SELECT * FROM visiteur');
    $visite->execute();
    $nvisite = $visite->rowCount();
    $visiteur = $visite->fetchAll();



    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bord.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>tableau de bord</title>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-clinic-medical"></i>
                        <div class="user">
                            <img src="image/doctor1.png" alt="">
                        </div>
                        <div class="title">Admin</div>
                    </a>
                </li>
                <li>
                    <a href="#"> 
                        <img src="icones/conctr" alt="">
                        <div class="title">Accueil</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <img src="icones/home" alt="">
                        <div class="title">Biens</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="icones/home" alt="">
                        <div class="title">Ventes</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="icones/home" alt="paymnt">
                        <div class="title">Paiement</div>
                    </a>
                </li>
                <li>
                    <a href="icones/enveloppe">
                        <img src="icones/envelope" alt="">
                        <div class="title">Notification</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="icones/file" alt="">
                        <div class="title">Mes fichiers</div>
                    </a>
                </li>
                
                <li>
                    <a href="#">
                    <img src="icones/dconction" alt="">
                        <div class="title">Se Déconnecter</div>
                    </a>
                </li>
            </ul>
           
        </div>
        <div class="main">
            <div class="top-bar">
                <div class="search">
                    <input type="text" name="search" placeholder="search here">
                    <label for="search"><i class="fas fa-search"></i></label>
                </div>
                <ul>
                
               
            </div>
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number">
                             <?php 
                                echo($nbien);
                            ?>
                        </div>
                        <div class="card-name">BIENS</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-briefcase-medical"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number"><?php 
                                echo($nclient);
                            ?></div>
                        <div class="card-name">Paiement</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-wheelchair"></i>
                    </div>
                </div>
                <div class="card"> 
                    <div class="card-content">
                        <div class="number"><?php 
                                echo($nvisite);
                            ?></div>
                        <div class="card-name">Visiteurs</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-bed"></i>
                    </div>
                </div> 
                <div class="card">
                    <div class="card-content">
                        <div class="number">4500000FCFA</div>
                        <div class="card-name">Dernière vente du mois</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <div class="tables">
                <div class="last-appointments">
                    <div class="heading">
                        <h2>Nouveaux Clients</h2>
                        <a href="#" class="btn">Voir tout</a>
                    </div>
                    <table class="appointments">
                        <thead>
                            <td>Id visiteur</td>
                            <td>Nom</td>
                            <td>Prenom</td>
                            <td>Sexe</td>
                            <td>Contact</td>
                            <td>Email</td>
                            <td>Actions</td>
                        </thead>
                        <tbody>
                            <?php
                                foreach($visiteur as $search){ ?>
                          
                            <tr>
                                <td><?php echo($search['id_visiteur']) ?></td>
                                <td><?php echo( $search['nom'])?></td>
                                <td><?php echo($search['prenom'])?></td>
                                <td><?php echo($search['sexe'])?></td>
                                <td><?php echo($search['contact'])?></td>
                                <td><?php echo($search['email'])?></td>
                            
                                <td>
                                    <a href="#">Supprimer</a>
                                    <a href="#">Modifier</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>