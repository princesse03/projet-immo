<?php 
    function recherche_user_byLoginPwd($email, $pwd){
        global $pdo;
        $requete = "SELECT * FROM client WHERE email=? AND passwor=?;";
        $selection=$connexion->prepare($requete);
        $selection->execute([$mail, $pass]);
        $nbr_user = $requete->rowCount();
        return $nbr_user;
    }
    function calcul_prix(){
        if(isset($_POST['sup'])){
            $prix = 10000;
            $surface=htmlspecialchars($_POST['carre']);
            $calc=$prix*$surface;
            echo (strval($calc));
        }
      
    }
?>

