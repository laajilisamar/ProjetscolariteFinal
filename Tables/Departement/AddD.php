<?php
include '../Etudiant/config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch data from the form
    $CodeDep = $_POST['CodeDep'];
    $Departement = $_POST['Departement'];
    $Responsable = $_POST['Responsable'];
    $DepartementARAB = $_POST['DepartementARAB'];
    $MatProf = $_POST['MatProf'];

    // Check if CodeDep already exists in the departements table
    $checkQuery = "SELECT CodeDep FROM departements WHERE CodeDep = ?";
    $stmtCheck = $connection->prepare($checkQuery);
    $stmtCheck->bind_param('s', $CodeDep);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows == 0) {
        // CodeDep doesn't exist, proceed with the insertion
        $insertQuery = "INSERT INTO departements (CodeDep, Departement, Responsable, DepartementARAB, MatProf) VALUES (?, ?, ?, ?, ?)";

        try {
            // Use prepared statement to prevent SQL injection
            $stmtInsert = $connection->prepare($insertQuery);
            $stmtInsert->bind_param('sssss', $CodeDep, $Departement, $Responsable, $DepartementARAB, $MatProf);
            $stmtInsert->execute();

            echo '<script>alert("Département ajouté avec succès")</script>';
            header('location: indexD.php');
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout du département : " . $e->getMessage();
        }
    } else {
        // CodeDep already exists in the departements table
        echo '<script>alert("Le Code du département existe déjà dans la table.")</script>';

    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un département</title>
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
    <form action="AddD.php" method="post">
    <fieldset><legend> <h2>Ajouter un département</h2></legend>

        <label for="CodeDep"><span>Code du département:</span>
        <input type="text" name="CodeDep"  class="input-field" required>
        </label>
        <label for="Departement"><span>Nom du département:</span>
        <input type="text" name="Departement"  class="input-field" required>
        </label>
        <label for="Responsable"><span>Responsable:</span>
        <input type="text" name="Responsable" class="input-field" required>
        </label>
        <label for="DepartementARAB"><span>Nom du département en arabe:</span>
        <input type="text" name="DepartementARAB" class="input-field" required>
        </label>
        <label for="MatProf"><span>Matricule du professeur responsable:</span>
   

        <select name="MatProf" class="select-field">
        <?php
         
         $queryProf = "SELECT MatProf FROM prof";
         $resultProf = $connection->query($queryProf);

         if ($resultProf) {
             while ($rowProf = $resultProf->fetch_assoc()) {
                 echo "<option value='" . $rowProf['MatProf'] . "'>" . $rowProf['MatProf'] . "</option>";
             }
         } else {
             echo "Erreur lors de la récupération des professeurs : " . $connection->error;
         }
         ?> 
        </select></label>
        <button type="submit" >Ajouter</button>
        <button type="rest">Annuler</button>
        <button><a href="IndexD.php">Retour</a></button>
        </fieldset>

    </form>
    </div>
    </div>
    </div>
</body>

</html>
