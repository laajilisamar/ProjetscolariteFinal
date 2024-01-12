<?php
include('config.php');
$sql = "SELECT CodClasse, CodClasse FROM Classe";
$result = $connection->query($sql);
if ($result) {
   $all_classes = $result;
}
// // Récupérer les données des gouvernorats pour la liste déroulante
// $gouvernoratsQuery = "SELECT Gouvernorat, codpostal FROM gouvernorats";
// $resultGouvernorats = $connection->query($gouvernoratsQuery);

// if (!$resultGouvernorats) {
//     die("Erreur lors de la récupération des gouvernorats: " . $connection->error);
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prénom'];
    $dateNais = $_POST['DateNais'];
    $ncin = $_POST['NCIN'];
    $nce = $_POST['NCE'];
    $typBac = $_POST['TypBac'];
    $sexe = $_POST['Sexe'];
    $lieuNais = $_POST['LieuNais'];
    $adresse = $_POST['Adresse'];
    $ville = $_POST['Ville'];
    $codePostal =$_POST['CodePostal'];
    $nTel = $_POST['N_Tel'];
    $decisionConseil = $_POST['DecisionConseil'];
    $anneeUniversitaire = $_POST['AnneeUniversitaire'];
    $semestre = $_POST['Semestre'];
    $dispenser = isset($_POST['Dispenser']) ? 1 : 0;
    $anneesOpt = $_POST['AnneesOpt'];
    $datePremiereInscp = $_POST['DatePremiereInscp'];
    $gouvernorat = $_POST['Gouvernorat'];
    $mentionBac = $_POST['MentionBac'];
    $nationalite = $_POST['Nationalite'];
    $codeCNSS = $_POST['CodeCNSS'];
    $nomArabe = $_POST['NomArabe'];
    $prenomArabe = $_POST['PrenomArabe'];
    $lieuNaisArabe = $_POST['LieuNaisArabe'];
    $adresseArabe = $_POST['AdresseArabe'];
    $villeArabe = $_POST['VilleArabe'];
    $gouvernoratArabe = $_POST['GouvernoratArabe'];
    $typeBacAB = $_POST['TypeBacAB'];
    $photo = $_POST['Photo'];
    $origine = $_POST['Origine'];
    $situationDpart = $_POST['SituationDpart'];
    $nBAC = $_POST['NBAC'];
    $redaut = $_POST['Redaut'];
    $codClasse = $_POST['CodClasse'];

    // Insérer les données dans la base de données
    $query = "INSERT INTO  etudiant (Nom, Prénom, DateNais, NCIN, NCE, TypBac, Sexe, LieuNais, Adresse, 
    Ville, CodePostal, N_Tel, DecisionConseil, AnneeUniversitaire, Semestre, Dispenser, AnneesOpt,
     DatePremiereInscp, Gouvernorat, MentionBac, Nationalite, CodeCNSS, NomArabe, PrenomArabe, 
     LieuNaisArabe, AdresseArabe, VilleArabe, GouvernoratArabe, TypeBacAB, Photo, Origine, SituationDpart, NBAC, Redaut, CodClasse) 
              VALUES ('$nom', '$prenom', '$dateNais', '$ncin', '$nce', '$typBac', '$sexe', '$lieuNais',
               '$adresse', '$ville', '$codePostal', '$nTel', '$decisionConseil', '$anneeUniversitaire', 
               '$semestre', '$dispenser', '$anneesOpt', '$datePremiereInscp', '$gouvernorat', 
               '$mentionBac', '$nationalite', '$codeCNSS', '$nomArabe', '$prenomArabe', 
               '$lieuNaisArabe', '$adresseArabe', '$villeArabe', '$gouvernoratArabe', 
              '$typeBacAB', '$photo', '$origine', '$situationDpart', '$nBAC', '$redaut', '$codClasse')";

    if (mysqli_query($connection, $query)) {
        header("Location: IndexE.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout de l'étudiant : " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
</head>
<style>
    .form-container {
    display: flex;
    justify-content: center;
    align-items: center;

}

*{
    background:#e5e5e5
;
}


.form-center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width:300%;
}

/* Rest of your existing styles... */

.form-style-3{
	max-width: 600px;
    height:100%;
    width:100%;
    margin: 0 auto; /* Center the form horizontally */
    font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
    margin-top: 20px
}
.form-style-3 label{
	display:block;
	margin-bottom: 10px;
}
.form-style-3 label > span{
	float: left;
	width: 100%;
    height:100%;

	color: #7f7f7f;
	font-weight: bold;
	font-size: 13px;
	text-shadow: 1px 1px 1px #fff;
}
.form-style-3 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #cccccc;
	padding: 20px;
	background: #e5e5e5;
	box-shadow: inset 0px 0px 15px #999999;
	-moz-box-shadow: inset 0px 0px 15px #999999;
	-webkit-box-shadow: inset 0px 0px 15px #999999;
}
.form-style-3 fieldset legend{
	color: #999999;
	border-top: 1px solid #b2b2b2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #cccccc;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #999999;
	-moz-box-shadow:-0px -1px 2px #999999;
	-webkit-box-shadow:-0px -1px 2px #999999;
	font-weight: normal;
	font-size: 12px;
}
.form-style-3 textarea{
	width:250px;
	height:100%;
}
.form-style-3 input[type=text],
.form-style-3 input[type=date],
.form-style-3 input[type=datetime],
.form-style-3 input[type=number],
.form-style-3 input[type=search],
.form-style-3 input[type=time],
.form-style-3 input[type=url],
.form-style-3 input[type=email],
.form-style-3 select, 
.form-style-3 textarea{
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border: 1px solid #b2b2b2;
	outline: none;
	color: #000000;
	padding: 5px 8px 5px 8px;
	box-shadow: inset 1px 1px 4px #b2b2b2 ;
	-moz-box-shadow: inset 1px 1px 4px #b2b2b2;
	-webkit-box-shadow: inset 1px 1px 4px #b2b2b2;
	background: #ffffff;
	width:50%;
}
.form-style-3  input[type=submit],
.form-style-3  input[type=button]{
	background: #ffffff;
	border: 1px solid #999999;
	padding: 5px 15px 5px 15px;
	color: #000000;
	box-shadow: inset -1px -1px 3px #999999;
	-moz-box-shadow: inset -1px -1px 3px #999999;
	-webkit-box-shadow: inset -1px -1px 3px #999999;
	border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;	
	font-weight: bold;
}
.required{
	color:red;
	font-weight:normal;
}

    </style>
<body>
<div class="form-container">
    <div class="form-center">
        <div class="form-style-3">

<p class="erreur_message">
            <?php
            if (!empty($message)) {
                echo $message;
            }
            ?>

        </p>

<form method="post" action="AddE.php">
<fieldset><legend><h2>Ajouter un étudiant</h2></legend>
    <!-- Ajoutez les champs du formulaire ici -->
    <label for="Nom">Nom:</label>
    <input type="text" name="Nom" required>
    
    <label for="Prénom">Prénom:</label>
    <input type="text" name="Prénom" required>
    
    <label for="DateNais">Date de Naissance:</label>
    <input type="datetime-local" name="DateNais" required>
    
    <label for="NCIN">NCIN:</label>
    <input type="text" name="NCIN" required>
    
    <label for="NCE">NCE:</label>
    <input type="text" name="NCE" required>
    
    <label for="TypBac">Type de Bac:</label>
    <input type="text" name="TypBac">
    
    <label for="Sexe">Sexe (0 pour Femme, 1 pour Homme):</label>
    <input type="number" name="Sexe" min="0" max="1">
    
    <label for="LieuNais">Lieu de Naissance:</label>
    <input type="text" name="LieuNais">
    
    <label for="Adresse">Adresse:</label>
    <input type="text" name="Adresse">
    
    <label for="Ville">Ville:</label>
    <input type="text" name="Ville">
    
    <label for="CodePostal">Code Postal:</label>
<select name="CodePostal">
    <?php 
        $sql_gouvernorats = "SELECT codpostal, codpostal FROM gouvernorats";
        $result_gouvernorats = $connection->query($sql_gouvernorats);

        if ($result_gouvernorats) {
            while ($gouvernorat = mysqli_fetch_array($result_gouvernorats, MYSQLI_ASSOC)) {
                echo "<option value='{$gouvernorat["codpostal"]}'>{$gouvernorat["codpostal"]}</option>";
            }
        }
    ?>
</select>
    
    <label for="N_Tel">Numéro de Téléphone:</label>
    <input type="text" name="N_Tel">
    
    <label for="DecisionConseil">Décision du Conseil:</label>
    <input type="text" name="DecisionConseil">
    
    <label for="AnneeUniversitaire">Année Universitaire:</label>
    <input type="text" name="AnneeUniversitaire">
    
    <label for="Semestre">Semestre:</label>
    <input type="number" name="Semestre" min="1" max="2">
    
    <label for="Dispenser">Dispensé (1 pour Oui, 0 pour Non):</label>
    <input type="number" name="Dispenser" min="0" max="1">
    
    <label for="AnneesOpt">Années d'Optimisation:</label>
    <input type="datetime-local" name="AnneesOpt">
    
    <label for="DatePremiereInscp">Date de Première Inscription:</label>
    <input type="datetime-local" name="DatePremiereInscp">
    
    <label for="Gouvernorat">Gouvernorat:</label>
<select name="Gouvernorat">
    <?php 
        $sql_gouvernorats = "SELECT Gouvernorat FROM gouvernorats";
        $result_gouvernorats = $connection->query($sql_gouvernorats);

        if ($result_gouvernorats) {
            while ($gouvernorat = mysqli_fetch_array($result_gouvernorats, MYSQLI_ASSOC)) {
                echo "<option value='{$gouvernorat["Gouvernorat"]}'>{$gouvernorat["Gouvernorat"]}</option>";
            }
        }
    ?>
</select>

    
    <label for="MentionBac">Mention au Bac:</label>
    <input type="text" name="MentionBac">
    
    <label for="Nationalite">Nationalité:</label>
    <input type="text" name="Nationalite">
    
    <label for="CodeCNSS">Code CNSS:</label>
    <input type="text" name="CodeCNSS">
    
    <label for="NomArabe">Nom en Arabe:</label>
    <input type="text" name="NomArabe">
    
    <label for="PrenomArabe">Prénom en Arabe:</label>
    <input type="text" name="PrenomArabe">
    
    <label for="LieuNaisArabe">Lieu de Naissance en Arabe:</label>
    <input type="text" name="LieuNaisArabe">
    
    <label for="AdresseArabe">Adresse en Arabe:</label>
    <input type="text" name="AdresseArabe">
    
    <label for="VilleArabe">Ville en Arabe:</label>
    <input type="text" name="VilleArabe">
    
    <?php
   $gouvMapping = array(
    'Ariana' => 'أريانة',
    'Beja' => 'باجة',
    'Ben Arous' => 'بن عروس',
    'Bizerte' => 'بنزرت',
    'Gabes' => 'قابس',
    'Gafsa' => 'قفصة',
    'Jendouba' => 'جندوبة',
    'Kairouan' => 'القيروان',
    'Kasserine' => 'القصرين',
    'Kebili' => 'قبلي',
    'Kef' => 'الكاف',
    'Mahdia' => 'المهدية',
    'Manouba' => 'منوبة',
    'Medenine' => 'مدنين',
    'Monastir' => 'المنستير',
    'Nabeul' => 'نابل',
    'Sfax' => 'صفاقس',
    'Sidi Bouzid' => 'سيدي بوزيد',
    'Siliana' => 'سليانة',
    'Sousse' => 'سوسة',
    'Tataouine' => 'تطاوين',
    'Tozeur' => 'توزر',
    'Tunis' => 'تونس',
    'Zaghouan' => 'زغوان',
);

$sql_gouvernorats = "SELECT Gouvernorat, codpostal FROM gouvernorats";
$result_gouvernorats = $connection->query($sql_gouvernorats);

if ($result_gouvernorats) {
    echo "<label for='GouvernoratArabe'>Gouvernorat en Arabe:</label>";
    echo "<select name='GouvernoratArabe'>";
    
    while ($gouvernorat = mysqli_fetch_array($result_gouvernorats, MYSQLI_ASSOC)) {
        $gouvArabe = isset($gouvMapping[$gouvernorat["Gouvernorat"]]) ? $gouvMapping[$gouvernorat["Gouvernorat"]] : 'N/A';
        echo "<option value='{$gouvArabe}'>{$gouvArabe} - {$gouvernorat["codpostal"]}</option>";
    }

    echo "</select>";
}
?>
    
    <label for="TypeBacAB">Type de Bac AB:</label>
    <input type="text" name="TypeBacAB">
    
    <label for="Photo">Photo:</label>
    <input type="file" name="Photo"  accept="image/*">
    
    <label for="Origine">Origine:</label>
    <input type="text" name="Origine">
    
    <label for="SituationDpart">Situation Départ:</label>
    <input type="text" name="SituationDpart">
    
    <label for="NBAC">Numéro du Bac:</label>
    <input type="text" name="NBAC">
    
    <label for="Redaut">Réduit:</label>
    <input type="number" name="Redaut" min="0" max="1">
    
    <label for="CodClasse">Code de la Classe:</label>
<select name="CodClasse">
    <?php 
        while ($classe = mysqli_fetch_array($all_classes, MYSQLI_ASSOC)) {
            echo "<option value='{$classe["CodClasse"]}'>{$classe["CodClasse"]}</option>";
        }
    ?>
</select>

    
    <input type="submit" value="Ajouter">
    <button type="rest">Annuler</button>
        <button><a href="IndexE.php">Retour</a></button>
        </fieldset>
        </form>
        </div>
    </div>
    </div>




</body>
</html>