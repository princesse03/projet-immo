<?php
session_start();
require_once("database.php");
if (isset($_POST["join"])){
    if(!empty($_POST["email"])&&
        !empty($_POST["password"])){ 
        $mail = htmlspecialchars(trim($_POST["email"]));
        $pass = htmlspecialchars($_POST["password"]);
        $requete = "SELECT * FROM visiteur WHERE email=? AND passwor=? ";

        $selection=$connexion->prepare($requete);
        $selection->execute([$mail,$pass]);
        // $visite=$selection->fetch() ;
        $client=$selection->fetch();
        if($selection->rowCount()>0){
           
            $_SESSION["visiteur"]=$client;      
            header('Location:home.php');
        }
        else{
           $admin = "SELECT * FROM administrateur WHERE email=? AND motpass=? ";
            $select=$connexion->prepare($admin);
            $select->execute([$mail,$pass]);
            $user=$select->fetch();
            if($select->rowCount()>0){
           
                $_SESSION["administrateur"]=$user;      
                header('Location:bord.php');
            }

        }

    }
    else{
      $erreur='veuillez renseignez les informations manquantes!!!';
    }
}
        


?>