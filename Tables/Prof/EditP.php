<?php
include '../Etudiant/config.php';

// Vérifie si le paramètre MatProf est présent dans l'URL
if (isset($_GET['MatProf'])) {
    $matProfToEdit = $_GET['MatProf'];

    // Récupère les données de l'enregistrement à modifier
    $editQuery = "SELECT * FROM prof WHERE MatProf = '$matProfToEdit'";
    $result = $connection->query($editQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Affiche le formulaire de modification avec les données existantes
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier Professeur</title>
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
            <form action="UpdateP.php" method="post">
            <fieldset><legend><h1>Modifier un Professeur</h1></legend>

                <!-- Ajoutez les champs du formulaire avec les valeurs existantes -->
                <!-- Utilisez $row['Nom'], $row['Prenom'], etc. pour remplir les champs -->
                <label for="MatProf">Matricule Prof :</label>
                <input type="text" name="MatProf" value="<?php echo $row['MatProf']; ?>" readonly><br>

                <label for="Nom">Nom :</label>
<input type="text" name="Nom" value="<?php echo $row['Nom']; ?>"><br>

<label for="Prenom">Prénom :</label>
<input type="text" name="Prenom" value="<?php echo $row['Prénom']; ?>"><br>

<label for="CIN_ou_Passeport">CIN ou Passeport :</label>
<input type="text" name="CIN_ou_Passeport" value="<?php echo $row['CIN_ou_Passeport']; ?>"><br>

<label for="identifiantCNRPS">Identifiant CNRPS :</label>
<input type="text" name="identifiantCNRPS" value="<?php echo $row['Identifiant_CNRPS']; ?>"><br>

<label for="dateNaissance">Date de naissance :</label>
<input type="date" name="dateNaissance" value="<?php echo $row['Date_de_naissance']; ?>"><br>

<label for="debutContrat">Début du Contrat :</label>
<input type="date" name="debutContrat" value="<?php echo $row['Début_du_Contrat']; ?>"><br>

                <label for="finContrat">Fin du Contrat :</label>
                <input type="date" name="finContrat" value="<?php echo $row['Fin_du_Contrat']; ?>"><br>

                <label for="typeContrat">Type de Contrat :</label>
                <input type="text" name="typeContrat" value="<?php echo $row['Type_de_Contrat']; ?>"><br>

                <label for="nbContratISETSOUSSE">Nombre de Contrats à l'ISET SOUSSE :</label>
                <input type="number" name="nbContratISETSOUSSE" value="<?php echo $row['NB_contrat_ISETSOUSSE']; ?>"><br>

                <label for="nbContratAutreEtb">Nombre de Contrats dans un autre établissement :</label>
                <input type="text" name="nbContratAutreEtb" value="<?php echo $row['NB_contrat_Autre_Etb']; ?>"><br>

                <label for="bureau">Bureau :</label>
                <input type="text" name="bureau" value="<?php echo $row['Bureau']; ?>"><br>

                <label for="email">Email :</label>
                <input type="email" name="email" value="<?php echo $row['Email']; ?>"><br>

                <label for="emailInterne">Email Interne :</label>
                <input type="email" name="emailInterne" value="<?php echo $row['Email_Interne']; ?>"><br>

                <label for="nomArabe">Nom en Arabe :</label>
                <input type="text" name="nomArabe" value="<?php echo $row['NomArabe']; ?>"><br>

                <label for="prenomArabe">Prénom en Arabe :</label>
                <input type="text" name="prenomArabe" value="<?php echo $row['PrenomArabe']; ?>"><br>


<label for="typeEnsg">Type d'enseignement :</label>
<input type="text" name="typeEnsg" value="<?php echo $row['TypeEnsg']; ?>"><br>


<label for="grade">Grade :</label>
<select name="grade">
    <?php
    // Récupérer la liste des grades depuis la base de données
    $gradesQuery = "SELECT * FROM grades";
    $gradesResult = $connection->query($gradesQuery);

    // Afficher chaque grade dans le champ de sélection
    while ($grade = $gradesResult->fetch_assoc()) {
        $selected = ($grade['Grade'] == $row['Grade']) ? 'selected' : '';
        echo "<option value='{$grade['Grade']}' $selected>{$grade['Grade']}</option>";
    }
    ?>
</select><br>
<label for="departement">Département :</label>
<select name="departement">
    <?php
    // Récupérer la liste des départements depuis la base de données
    $departementsQuery = "SELECT * FROM departements";
    $departementsResult = $connection->query($departementsQuery);

    // Afficher chaque département dans le champ de sélection
    while ($dept = $departementsResult->fetch_assoc()) {
        $selected = ($dept['CodeDep'] == $row['Département']) ? 'selected' : '';
        echo "<option value='{$dept['CodeDep']}' $selected>{$dept['Departement']}</option>";
    }
    ?>
</select><br>


                <input type="submit" value="Enregistrer les modifications">
            	<button type="rest">Annuler</button>
        <button><a href="IndexP.php">Retour</a></button>
	</fieldset>
	</form>
    </div>
    </div>
</div>
      
        </body>
        </html>
        <?php
    } else {
        echo "Aucun enregistrement trouvé avec le Matricule Prof : $matProfToEdit";
    }
} else {
    echo "Paramètre MatProf non spécifié.";
}

// Ferme la connexion à la base de données
$connection->close();
?>
