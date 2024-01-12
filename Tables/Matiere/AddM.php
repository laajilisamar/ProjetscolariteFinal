<?php
include '../Etudiant/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codeMatiere = $_POST['codeMatiere'];
    $nomMatiere = $_POST['Nom Matière'];
    $coefMatiere = $_POST['Coef Matière'];
    $departement = $_POST['Département'];
    $semestre = $_POST['semestre'];
    $option = $_POST['Option'];
    $nbHeureCI = $_POST["Nb Heure CI"];
    $nbHeureTP = $_POST["nbHeureTP"];
    $typeLabo = $_POST["TypeLabo"];
    $bonus = $_POST["Bonus"];
    $categories = $_POST["Catègories"];
    $sousCategories = $_POST["SousCatégories"];
    $dateDeb = $_POST["DateDeb"];
    $dateFin = $_POST["DateFin"];
    $Code_Option  = $_POST["Code_Option "];

    if ($dateFin <= $dateDeb) {
        echo '<script>alert("Erreur : La date de fin doit être supérieure à la date de début")</script>';
        header('location: indexM.php');
   
        exit; // Arrêter l'exécution du script si la vérification échoue
    }

    $query = "INSERT INTO matieres (`Code Matière`, `Nom Matière`, `Coef Matière`, `Département`, `Semestre`, `Option`, `Nb Heure CI`, `Nb Heure TP`,`TypeLabo`, `Bonus`, `Catègories`, `SousCatégories`, `DateDeb`, `DateFin`, `CodeDep`, `Code_Option`) 
              VALUES ('$codeMatiere', '$nomMatiere', '$coefMatiere', '$departement', '$semestre', '$option', '$nbHeureCI', '$nbHeureTP', '$typeLabo', '$bonus', '$categories', '$sousCategories', '$dateDeb', '$dateFin', '$departement', '$option')";

    if ($connection->query($query) === TRUE) {
        echo '<script>alert("Matière ajoutée avec succès")</script>';
        header('location: indexM.php');
  
    } else {
        echo "Erreur lors de l'ajout de la matière : " . $connection->error;
    }
}

// Récupérer la liste des départements pour le champ de sélection
$departementsQuery = "SELECT CodeDep, Departement FROM departements";
$departementsResult = $connection->query($departementsQuery);

// Récupérer la liste des options pour le champ de sélection
$optionsQuery = "SELECT Code_Option, Option_Name FROM options";
$optionsResult = $connection->query($optionsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une matière</title>
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
    <form method="post" action=""> 
        <fieldset><legend> 
    <h2>Ajouter une matière</h2></legend>

        <label for="codeMatiere"><span>Code Matière:</span><span class="required">*</span>
        <input type="text" name="codeMatiere" class="input-field" required>
        </label>
        <label for="nomMatiere"><span>Nom Matière:</span>
        <input type="text" name="nomMatiere" class="input-field" required>
        </label>
        <label for="coefMatiere"><span>Coef Matière:</span><span class="required">*</span>
        <input type="text" name="coefMatiere" class="input-field" required>
        </label>
        <label for="codeDep"><span>Département:</span>
        <select name="codeDep" class="select-field">
            <?php
            // Afficher la liste des départements
            while ($row = $departementsResult->fetch_assoc()) {
                echo "<option value='" . $row['CodeDep'] . "'>" . $row['Departement'] . "</option>";
            }
            ?>
        </select></label>

        <label for="semestre"><span>Semestre:</span><span class="required">*</span>
        <input type="text" name="semestre" required><br>
        </label>
        <label for="codeOption"><span>Option:</span>
        <select name="codeOption" class="select-field">
            <?php
            // Afficher la liste des options
            while ($row = $optionsResult->fetch_assoc()) {
                echo "<option value='" . $row['Code_Option'] . "'>" . $row['Option_Name'] . "</option>";
            }
            ?>
        </select></label>

        <label for="nbHeureCI"><span>Nb Heure CI :</span><span class="required">*</span>
        <input type="text" name="nbHeureCI" class="input-field" required>
        </label>

        <label for="nbHeureTP"><span>Nb Heure TP :</span><span class="required">*</span>
        <input type="text" name="nbHeureTP" class="input-field" required>
        </label>

        <label for="typeLabo"><span>TypeLabo :</span><span class="required">*</span>
        <input type="text" name="typeLabo" class="input-field"required>
        </label>
        <label for="bonus"><span>Bonus :</span><span class="required">*</span>
        <input type="text" name="bonus" class="input-field" required>
        </label>
        <label for="categories"><span>Catégories :</span><span class="required">*</span>
        <input type="text" name="categories" class="input-field" required>
        </label>
        <label for="sousCategories"><span>SousCatégories :</span><span class="required">*</span>
        <input type="text" name="sousCategories"  class="input-field"required>
        </label>
        <label for="dateDeb"><span>Date de début :</span><span class="required">*</span>
        <input type="date" name="dateDeb"  class="input-field"required>
        </label>
        <label for="dateFin"><span>Date de fin :</sapn>
        <input type="date" name="dateFin"  class="input-field" required>
        </label>
        
        
        <input type="submit" value="Ajouter">
        <button type="rest">Annuler</button>
        <button><a href="IndexM.php">Retour</a></button>
    </fieldset>

    </form>
    </div>
    </div>
    </div>
</body>
</html>
