<?php
include '../Etudiant/config.php';

// Vérifier si le code de la matière est passé dans l'URL
if (isset($_GET['Code_Matiere'])) {
    $codeMatiere = $_GET['Code_Matiere'];

    // Récupérer les données de la matière à éditer
    $query = "SELECT * FROM matieres WHERE `Code Matière` = '$codeMatiere'";
    $result = $connection->query($query);

    if ($result) {
        $matiere = $result->fetch_assoc();
    } else {
        echo "Erreur lors de la récupération des données de la matière : " . $connection->error;
        exit;
    }
} else {
    echo "Code de la matière non spécifié.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une matière</title>
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
    <form method="post" action="updateM.php">
    <fieldset><legend>  <h2>Modifier une matière</h2>     </legend> 

        <input type="hidden" name="codeMatiere" value="<?php echo $matiere['Code Matière']; ?>">

        <label for="nomMatiere">Nom Matière:</label>
        <input type="text" name="nomMatiere" value="<?php echo $matiere['Nom Matière']; ?>" required><br>

        <label for="coefMatiere">Coef Matière:</label>
        <input type="text" name="coefMatiere" value="<?php echo $matiere['Coef Matière']; ?>" required><br>

        <label for="codeDep">Département:</label>
        <select name="codeDep">
            <?php
            // Récupérer la liste des départements
            $departementsQuery = "SELECT CodeDep, Departement FROM departements";
            $departementsResult = $connection->query($departementsQuery);

            while ($row = $departementsResult->fetch_assoc()) {
                $selected = ($row['CodeDep'] == $matiere['CodeDep']) ? 'selected' : '';
                echo "<option value='" . $row['CodeDep'] . "' $selected>" . $row['Departement'] . "</option>";
            }
            ?>
        </select><br>

        <label for="semestre">Semestre:</label>
        <input type="text" name="semestre" value="<?php echo $matiere['Semestre']; ?>" required><br>

        <label for="codeOption">Option:</label>
        <select name="codeOption">
            <?php
            // Récupérer la liste des options
            $optionsQuery = "SELECT Code_Option, Option_Name FROM options";
            $optionsResult = $connection->query($optionsQuery);

            while ($row = $optionsResult->fetch_assoc()) {
                $selected = ($row['Code_Option'] == $matiere['Code_Option']) ? 'selected' : '';
                echo "<option value='" . $row['Code_Option'] . "' $selected>" . $row['Option_Name'] . "</option>";
            }
            ?>
         
        </select>
        <label for="nbHeureCI">Nom Nb Heure CI:</label>
        <input type="text" name="nbHeureCI" value="<?php echo $matiere['Nb Heure CI']; ?>" required><br>
       
        <label for="nbHeureTP">Nb Heure TP :</label>
        <input type="text" name="nbHeureTP" value="<?php echo $matiere['Nb Heure TP']; ?>" required><br>

        <label for="typeLabo">TypeLabo :</label>
        <input type="text" name="typeLabo" value="<?php echo $matiere['TypeLabo']; ?>" required><br>

        <label for="bonus">Bonus :</label>
        <input type="text" name="bonus" value="<?php echo $matiere['Bonus']; ?>" required><br>

        <label for="categories">Catégories :</label>
        <input type="text" name="categories" value="<?php echo $matiere['Catègories']; ?>" required><br>

        <label for="sousCategories">SousCatégories :</label>
        <input type="text" name="sousCategories" value="<?php echo $matiere['SousCatégories']; ?>" required><br>

        <label for="dateDeb">Date de début :</label>
        <input type="date" name="dateDeb"  value="<?php echo $matiere['DateDeb']; ?>"required><br>

        <label for="dateFin">Date de fin :</label>
        <input type="date" name="dateFin" value="<?php echo $matiere['DateFin']; ?>"required><br>
<br/>
        <input type="submit" value=" modifications">
        <button type="rest">Annuler</button>
        <button><a href="IndexC.php">Retour</a></button>   
    </fieldset>
        </form>

    </div>
    </div>
    </div>
</body>
</html>
