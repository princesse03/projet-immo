<?php
session_start();

require_once("../database.php");
if (isset($_POST["envoi"])){
    if(!empty($_POST["name"])&&
         !empty($_POST["lastname"])&&
         !empty($_POST["cell"])&&
        !empty($_POST["sex"])&&
         !empty($_POST["mail"])&&
         !empty($_POST["pass"])&&
        !empty($_POST["confirm"])
    ){ 
       $nom = htmlspecialchars(trim($_POST["name"]));
       $prenom = htmlspecialchars(trim($_POST["lastname"]));
       $contact = htmlspecialchars(trim($_POST["cell"]));
       $sexe = htmlspecialchars(trim($_POST["sex"]));
       $pwd = htmlspecialchars($_POST["pass"]);
       $email= htmlspecialchars(trim($_POST["mail"])); 

        $pwd =sha1($_POST["pass"]);
        $requete = "INSERT INTO visiteur(nom, prenom, sexe, contact, email, passwor) values(?,?,?,?,?,?);";
        $insertion = $connexion->prepare($requete);
        $insertion->execute([$nom, $prenom, $sexe, $contact, $email, $pwd]);
        $select="SELECT * FROM visiteur WHERE email=? AND passwor=?";
        $prepar=$connexion->prepare($select);
        $prepar->execute([$email, $pwd]);
        $client=$prepar->fetch();
        $_SESSION["visiteur"]=$client; 
        header('Location:../home.php');

    }
    else {
       $erreur="veuillez remplir tous les champs";
    }
}
?>
        <?php 
            // if(!empty($_POST["name"])&&
            //     !empty($_POST["lastname"])&&
            //     !empty($_POST["cell"])&&
            //     !empty($_POST["sex"])&&
            //     !empty($_POST["mail"])&&
            //     !empty($_POST["pass"])&&
            //     !empty($_POST["confirm"])
            // ){
                
            //     $pwd = htmlspecialchars($_POST["pass"]);
            //     $email= htmlspecialchars(trim($_POST["mail"])); 
            //     $nom = htmlspecialchars(trim($_POST["name"]));
            //     $recupere="SELECT * FROM client WHERE email=? AND passwor=?;";
            //     //smile nom de variable pour la preparation de la requete
            //     $smile=$connexion->prepare($recupere);
            //     $smile->execute([$email, $pass]);
            //     if($smile->rowCount()>0){
            //         $_SESSION["mail"]=$email;
            //         $_SESSION["name"]=$nom;
            //         echo($email);
            //     }
            // }
           
        ?>
            