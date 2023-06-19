<?php 
use Picqer\Barcode\Barcode;
use Picqer\Barcode\BarcodeBar;
    require("config/database.php");
    if(isset($_POST["envoi"])){
        if(!empty($_POST["nom"]) &&
        !empty($_POST["prenom"])&&
        !empty($_POST["mail"])&&
        !empty($_POST["matricule"])&&
        !empty($_POST["tel"])&&
        !empty($_POST["sexe"])&&
        !empty($_POST["paie"])&&
        !empty($_POST["ville"])
        ){

            $prenom = htmlspecialchars($_POST["prenom"]);
            $nom = htmlspecialchars($_POST["nom"]);
            $mail = htmlspecialchars($_POST["mail"]);
            $contact = htmlspecialchars($_POST["tel"]);
            $sexe = htmlspecialchars($_POST["sexe"]);
            $id =htmlspecialchars($_POST["matricule"]);
            $code = htmlspecialchars($_POST["paie"]);
            $naissance = $_POST['naiss'];
            $ville=htmlspecialchars($_POST['ville']);
            $adresse=htmlspecialchars($_POST['adresse']);
            $password=substr($id,0,3).substr($sexe,0,1).substr($mail,0,4);
            $title="Fiche d'inscription";
            $line="------------------------------------------------------------------------------";
           
           if(isset($_POST["pays"])){
                $pays = $_POST["pays"];
           }
           else{
            $pays="NULL";
           }
           if(isset($_POST["pere"])){
                $pere = $_POST["pere"];
           }else{
            $pere="Non defini";
           }
           if(isset($_POST["mere"])){
                $mere = $_POST["mere"];
           }else{
            $mere ="Non defini";
           }
        
            if(isset($_FILES["fichier"] ) and $_FILES['fichier']["error"]==0){
                $dossier = "../../image/etudiant";
                $temp_name = $_FILES["fichier"]['tmp_name'];
                if(!is_uploaded_file($temp_name)){
                    exit('Le fichier est introuvable');
                }
                if($_FILES['fichier']["size"]>=1200000){
                    exit("Le fichier est trop volumineux");
                }
                $infofichier = pathinfo($_FILES['fichier']['name']);
                $extension = $infofichier['extension'];
                $extension = strtolower($extension);
                $autorise = ["png", "jpeg", "jpg", "wbep"];
                if(!in_array($extension,$autorise)){
                    exit('L\'extension n\est pas autorisée');
                }
                $nom_photo = $nom.".".$extension;
                $ph_name = $nom_photo;
            }else{
                $photo_err=$_FILES['fichier']['error'];
                $ph_name = "inconnu.png";
            }

            $sql = "SELECT * FROM etudiant WHERE Matricule=? or Mail=?";
            $voirexist = $bd->prepare($sql);
            $voirexist->execute([$mail,$id]);

            // verification du code d'inscription
            $query = "SELECT * FROM paiement WHERE NumPaie = ?";
            $selection = $bd->prepare($query);
            $selection->execute([$code]);

            if($voirexist->rowCount()==0){
                if($selection->rowCount()==0){
                    $errorMessage="Veuillez saisir un code de paiement valide";
                }else{

                    require_once("fpdf/fpdf.php");
                    // require_once("fpdf/pdf_barcode.php");
                    $pdf = new FPDF();
                    $pdf->AddPage();
                    
                    
                    // Titre
                    $pdf->SetFont('Arial', 'B', 18);
                    $pdf->SetDrawColor(178,221,221);
                    $pdf->SetFillColor(0,0,0);
                    $pdf->SetTitle($title);
                    $w = $pdf->GetStringWidth($title)+6;
                    $pdf->SetTextColor(0, 145,  225);
                    $pdf->Cell(0, 10, $title, 1, 1, 'C');

                    $pdf->Ln(10);
                   
                    $pdf->SetFont('Arial','B',15);
                    $pdf->Cell(71,5,'Annee Academique',0,0);
                    $pdf->cell(59,5,'',0,0);
                    $pdf->cell(59,5,'UniSen',0,1,'l');
                    $pdf->SetTextColor(0, 0,  0);
                    $pdf->SetFont("Arial","",10);
                
                    $pdf->cell(130,5,'2022-2023',0,0);
                    $pdf->cell(130,5,"BP 3241 Abidjan 001",0,1);
                    $pdf->cell(130,5,'',0,0);
                    $pdf->cell(130,5,'Les leaders de demain',0,1);

                    
                    // Informations personnelles
                    $pdf->Ln(5);
                    $pdf->SetFont('Arial', 'B', 15);
                    $pdf->SetDrawColor(115,134,79);
                    $pdf->SetX((150-$w)/2);
                    $pdf->Cell(70, 10, 'Informations personnelles', 1, 1, 'L');
                    $pdf->Ln(3);
                    $pdf->SetFont('Times', '', 12);
                    // $pdf->SetLineWidth(1);
                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Matricule:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $id, 0, 1, 'C');
                    
                    // $pdf->SetX((170-$w)/2);
                    // $pdf->Cell(20, 10, 'Name:',0 , 0, 'r');
                    // $pdf->Cell($w, 10, $nom, 0, 1, 'r');

                   
                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Nom:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $nom, 0, 1, 'C');

                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Prenom:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $prenom, 0, 1, 'C');

                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Code de paiement:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $code, 0, 5, 'C');
                
                    // Coordonnées
                    $pdf->Ln(10);
                    $pdf->SetFont('Courier', '', 5);
                    // $pdf->Cell(0, 10, '', 0, 4, 'L');
                    $pdf->SetX((150-$w)/2);
                    $pdf->Cell(0, 10, '-------------------'.$line.$line.$line, 0, 1, 'L');
                    $pdf->Ln(5);
                    $pdf->SetFont('Arial', 'B', 15);
                    $pdf->SetX((150-$w)/2);
                    $pdf->Cell(70, 10, 'Coordonnees de l\'etudiant', 1, 1, 'L');
                    $pdf->Ln(5);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->SetX((170-$w)/2);
                    $pdf->Cell(40, 10, 'Email:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $mail, 0, 1, 'C');
                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Contact:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $contact, 0, 1, 'C');

                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Ne(e) le :', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $naissance, 0, 1, 'C');

                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Sexe:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $sexe, 0, 1, 'C');

                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Adresse:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $adresse, 0, 1, 'C');

                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Pays:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $pays, 0, 1, 'C');

                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Ville:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $ville, 0, 1, 'C');

                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Nom du pere:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $pere, 0, 1, 'C');

                    $pdf->SetX((170-$w)/2);
                    $pdf->SetFont('Times', 'B', 13);
                    $pdf->Cell(40, 10, 'Nom de la mere:', 0, 0, 'L');
                    $pdf->SetFont('Times', '', 12);
                    $pdf->Cell(0, 10, $mere, 0, 1, 'C');
                    //Filigrane
                    // $pdf->SetAlpha(0.5);  // Transparence à 50%
                    // $pdf->SetFont('Arial', 'B', 50);
                    // $pdf->SetTextColor(192, 192, 192);  // Gris clair
                    // $pdf->RotatedText(50, 150, 'Filigrane', 45);
                
                    // Générer le fichier PDF
                    // $barcode = new PDF_Barcode();
                    // $barcode->EAN13(10,10,'123456789012',5,0.5,9);
                    // $barcode->EAN13(10,20,'123456789012',5,0.35,9);
                    // $barcode->EAN13(10,30,'123456789012',10,0.35,9);

                    
                    $pdf->Output();

                    $insertion = "INSERT INTO etudiant(Matricule,NomEtu, PrenomEtu, Mail, Photo, Contact,dateNaissance, Sexe,Password,Pays, Pere, Mere) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                    $insert = $bd->prepare($insertion);
                    $insert->execute([$id,$nom,$prenom,$mail,$ph_name,$contact,$naissance,$sexe,$password,$pays,$pere,$mere]);
                    $successMessage = "Enregistrement Effectué avec succsès";
                    // Definition du fichier pdf 
                    

                }
               
            }
            else{
                $errorMessage="Ce mail ou matricule  existe deja";
            }

        }
        else{
            $errorMessage = "Veuillez renseigner tous les champs";
        }
    }
?>