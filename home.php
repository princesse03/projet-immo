<?php 
    require_once('database.php');
    // if(isset($_GET['immeuble'])){
    //     $selection=($_GET['immeuble']);
    //     $nom=htmlspecialchars(trim($_GET["search"]));
    //     $clause='';
    //     // foreach($selection as $select){
    //         $clause.= "type_maison LIKE'%".$selection."%' OR";
    //         $clause = rtrim($clause, 'OR');
    //         $search="SELECT *FROM biens WHERE $clause AND surface=$nom";
    //         $prepar=$connexion->prepare($search);
    //         $prepar->execute();
    //         $affichage=$prepar->fetchAll();
    //         if($prepar->rowCount()>0){
    //             $erreur='maison disponible';

                
    //         }
    //     // }
    // }
    if(isset($_GET['valide'])) {
        // Récupérer les valeurs des champs
        $superficie = $_GET['search'];
    
        // Récupérer les valeurs des cases à cocher
        $typesImmeuble = array();
        if(isset($_GET['immeuble'])) {
            $typesImmeuble = $_GET['immeuble'];
            $sql = "SELECT * FROM biens WHERE surface LIKE ?";
            $params = array('%' . $superficie . '%');
    
            if(!empty($typesImmeuble)) {
                $typesImmeuble = explode(',', $typesImmeuble);
                $placeholders = implode(',', array_fill(0, count($typesImmeuble), '?'));
                $sql .= " AND type_maison IN ($placeholders)";
                $params = array_merge($params, $typesImmeuble);
            }
    
            // Exécuter la requête SQL avec les paramètres
            $stmt = $connexion->prepare($sql);
            $stmt->execute($params);
    
            // Traiter les résultats de la requête
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($results as $row) {
                // Faites quelque chose avec chaque ligne de résultat
                // par exemple, affichez les détails de la propriété
                echo "ID : " . $row['id'] . "<br>";
                echo "Superficie : " . $row['superficie'] . "<br>";
                echo "Prix : " . $row['prix'] . "<br>";
                // ...
            }
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chez Soi Immobilier</title>
      <link rel="stylesheet" href="home.css">
      <link rel="stylesheet" href="header.css">
      <link rel="stylesheet" href="footer.css">
</head>
<body>
<?php 
require_once('header.php')
?>
    <section class="section1">
        <form action="" method="GET">
            <div class="row">
                <div class="recherche">
                <?php
                        if(isset($erreur)){
                            echo('<p id="modif">'.$erreur.'</p>');
                            
                        }         
                    ?>
                   <div class="divinput">
                        <div class="corect">
                            <input type="search" placeholder="superficie" id="place" name='search' >
                            Budget maximun<input type="range" width="80%" >
                        </div>
                    </div>
                    <div class="cocher">
                        <div>
                        <input type="checkbox" name="immeuble">
                        <label for="immeuble">studio</label>
                         </div>
                         <div>
                        <input type="checkbox" name="immeuble">
                        <label for="immeuble">appartement</label>
                         </div>
                         <div>
                        <input type="checkbox" name="immeuble">
                        <label for="immeuble">duplexe</label>
                         </div>
                         <div>
                            <input type="checkbox" name="immeuble">
                            <label for="apparts">residence</label>
                        </div>
                        <div>
                        <input type="checkbox" name="immeuble">
                        <label for="maison">maison basse</label>
                        </div>
                        <div>
                        <input type="checkbox" name="immeuble">
                        <label for="maison">deux niveaux</label>
                        </div><br>
                    
                    </div>
                    <div class="case">
                            <input type="submit" value='RECHERCHER' name='valide' >
                         </div>
                </div>
            </div>
        </form>    
        <div class="clic">
            <ul>
                <li><a href="./patrimoine.php">Gestion de Patrimoine</a></li>
                <li><a href="./expertise.php">Expertise Immobiliere</a></li>
                <li><a href="./finance.php">Financement de Grands Projets</a></li>
                <li><a href="./devpt.php">Developpement de Projets Immobiliers</a></li>
            </ul>
        </div>
    </section>
    <?php 
        require_once('footer.php')
    ?>
</body>
</html>