<?php
include 'config.php';

if (isset($_GET['NCIN'])) {
    $NCIN = $_GET['NCIN'];

    $query = "SELECT * FROM etudiant WHERE NCIN = '$NCIN'";

    $result = $connection->query($query);

    if ($result) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
?>
            <html>

            <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
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
            <div class="form">
      
            <p class="erreur_message">
                <?php
                if (!empty($message)) {
                    echo $message;
                }
                ?>
            </p>
<form method="post" action="update.php" enctype="multipart/form-data">
<fieldset><legend><h2>Modifier Étudiant</h2></legend>

                    <label for="Nom">Nom:</label>
                    <input type="text" name="Nom" value="<?php echo $row['Nom']; ?>" required><br>

                    <label for="DateNais">Date de Naissance:</label>
                    <input type='date' name='DateNais' value='<?php echo date('Y-m-d', strtotime($row["DateNais"])); ?>' required><br>
                    <label for="NCIN">NCIN:</label>
    <input type="text" name="NCIN" value="<?php echo $row['NCIN']; ?>" required><br>

    <label for="NCE">NCE:</label>
    <input type="text" name="NCE" value="<?php echo $row['NCE']; ?>" required><br>

                    <label for="TypBac">Type du Bac:</label>
                    <input type="text" name="TypBac" value="<?php echo $row['TypBac']; ?>" required><br>

                    <label for="Prénom">Prénom:</label>
                    <input type="text" name="Prénom" value="<?php echo $row['Prénom']; ?>" required><br>


                    <label for="Sexe">Sexe:</label>
                    <input type="text" name="Sexe" value="<?php echo $row['Sexe']; ?>" required><br>

                    <label for="LieuNais">Lieu de Naissance:</label>
                    <input type="text" name="LieuNais" value="<?php echo $row['LieuNais']; ?>" required><br>

                    <label for="Adresse">Adresse:</label>
                    <input type="text" name="Adresse" value="<?php echo $row['Adresse']; ?>" required><br>

                    <label for="Ville">Ville:</label>
                    <input type="text" name="Ville" value="<?php echo $row['Ville']; ?>" required><br>
<label for="CodPostal">Code Postal:</label>
<select name="CodPostal" required>
    <?php 
        $sql_codpostals = "SELECT DISTINCT codpostal FROM gouvernorats";
        $result_codpostals = $connection->query($sql_codpostals);

        if ($result_codpostals) {
            while ($codpostal = mysqli_fetch_array($result_codpostals, MYSQLI_ASSOC)) {
                $selected = ($codpostal["codpostal"] == $row["codpostal"]) ? 'selected' : '';
                echo "<option value='{$codpostal["codpostal"]}' $selected>{$codpostal["codpostal"]}</option>";
            }
        }
    ?>
</select><br>



                    <label for="N_Tel">N°Tél:</label>
                    <input type="text" name="N_Tel" value="<?php echo $row['N_Tel']; ?>" required><br>

                <label for="CodClasse">Code de Classe:</label>
                    <select name="CodClasse" required>
                        <?php 
                            $sql_classes = "SELECT CodClasse, CodClasse FROM Classe";
                            $result_classes = $connection->query($sql_classes);

                            if ($result_classes) {
                                while ($class = mysqli_fetch_array($result_classes, MYSQLI_ASSOC)) {
                                    $selected = ($class["CodClasse"] == $row["CodClasse"]) ? 'selected' : '';
                                    echo "<option value='{$class["CodClasse"]}' $selected>{$class["CodClasse"]}</option>";
                                }
                            }
                        ?>
                    </select><br>

                    <label for="DecisionConseil">Décision du Conseil:</label>
                    <input type="text" name="DecisionConseil" value="<?php echo $row['DecisionConseil']; ?>" required><br>

                    <label for="AnneeUniversitaire">Année Universitaire:</label>
                    <input type="text" name="AnneeUniversitaire" value="<?php echo $row['AnneeUniversitaire']; ?>" required><br>

                    <label for="Semestre">Semestre:</label>
                    <input type="text" name="Semestre" value="<?php echo $row['Semestre']; ?>" required><br>

                    <label for="Dispenser">Dispenser:</label>
                    <input type="text" name="Dispenser" value="<?php echo $row['Dispenser']; ?>" required><br>

                    <label for="AnneesOpt">Années Opt:</label>
                    <input type="text" name="AnneesOpt" value="<?php echo $row['AnneesOpt']; ?>" required><br>

                    <label for="DatePremiereInscp">Première Inscription:</label>
                    <input type="text" name="DatePremiereInscp" value="<?php echo $row['DatePremiereInscp']; ?>" required><br>

                <label for="Gouvernorat">Gouvernorat:</label>
                        <select name="Gouvernorat" required>
                            <?php 
                                $sql_gouvernorats = "SELECT Gouvernorat, codpostal FROM gouvernorats";
                                $result_gouvernorats = $connection->query($sql_gouvernorats);

                                if ($result_gouvernorats) {
                                    while ($gouvernorat = mysqli_fetch_array($result_gouvernorats, MYSQLI_ASSOC)) {
                                        $selected = ($gouvernorat["Gouvernorat"] == $row["Gouvernorat"]) ? 'selected' : '';
                                        echo "<option value='{$gouvernorat["Gouvernorat"]}' $selected> {$gouvernorat["Gouvernorat"]}</option>";
                                    }
                                }
                            ?>
                        </select><br>
                    <label for="MentionBac">Mention du Bac:</label>
                    <input type="text" name="MentionBac" value="<?php echo $row['MentionBac']; ?>" required><br>

                    <label for="Nationalite">Nationalité:</label>
                    <input type="text" name="Nationalite" value="<?php echo $row['Nationalite']; ?>" required><br>

                    <label for="CodeCNSS">Code CNSS:</label>
                    <input type="text" name="CodeCNSS" value="<?php echo $row['CodeCNSS']; ?>" required><br>

                    <label for="NomArabe">Nom Arabe:</label>
                    <input type="text" name="NomArabe" value="<?php echo $row['NomArabe']; ?>" required><br>

                    <label for="PrenomArabe">Prénom Arabe:</label>
                    <input type="text" name="PrenomArabe" value="<?php echo $row['PrenomArabe']; ?>" required><br>

                    <label for="LieuNaisArabe">Lieu de Naissance Arabe:</label>
                    <input type="text" name="LieuNaisArabe" value="<?php echo $row['LieuNaisArabe']; ?>" required><br>

                    <label for="AdresseArabe">Adresse Arabe:</label>
                    <input type="text" name="AdresseArabe" value="<?php echo $row['AdresseArabe']; ?>" required><br>

                    <label for="VilleArabe">Ville Arabe:</label>
                    <input type="text" name="VilleArabe" value="<?php echo $row['VilleArabe']; ?>" required><br>

                    <?php
                        $gouvMappingArabe = array(
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
                        ?>

                        <label for="GouvernoratArabe">Gouvernorat Arabe:</label>
                        <select name="GouvernoratArabe" required>
                            <?php 
                                $sql_gouvernorats = "SELECT Gouvernorat, codpostal FROM gouvernorats";
                                $result_gouvernorats = $connection->query($sql_gouvernorats);

                                if ($result_gouvernorats) {
                                    while ($gouvernorat = mysqli_fetch_array($result_gouvernorats, MYSQLI_ASSOC)) {
                                        $gouvArabe = isset($gouvMappingArabe[$gouvernorat["Gouvernorat"]]) ? $gouvMappingArabe[$gouvernorat["Gouvernorat"]] : 'N/A';
                                        $selected = ($gouvArabe == $row["GouvernoratArabe"]) ? 'selected' : '';
                                        echo "<option value='{$gouvArabe}' $selected>{$gouvArabe}</option>";
                                    }
                                }
                            ?>
                        </select><br>

                    <label for="TypeBacAB">Type de Bac (Arabe):</label><label for="TypeBacAB">Type de Bac (Arabe):</label>
                    <input type="text" name="TypeBacAB" value="<?php echo $row['TypeBacAB']; ?>" required><br>

                    <label for="Origine">Origine:</label>
                    <input type="text" name="Origine" value="<?php echo $row['Origine']; ?>" required><br>

                    <label for="SituationDpart">Situation de Départ:</label>
                    <input type="text" name="SituationDpart" value="<?php echo $row['SituationDpart']; ?>" required><br>
                            <label for="SituationDpart">photo:</label>
                    <img src='./photos/<?php echo $row["Photo"]; ?>' alt='Current Photo' width='100' height='100'>
                    <input type="file" name="Photo"><br>

                    <label for="NBAC">NBAC:</label>
                    <input type="text" name="NBAC" value="<?php echo $row['NBAC']; ?>" required><br>

                    <label for="Redaut">Redoublement Autre:</label>
                    <input type="text" name="Redaut" value="<?php echo $row['Redaut']; ?>" required><br>


                    <input type="submit" name="update_etudiant" value="Mettre à jour">
                    <button type="rest">Annuler</button>
        <button><a href="IndexE.php">Retour</a></button>
        </fieldset>
        </form>
        </div>
    </div>
    </div>
</body>

</html>
<?php
    } else {
        echo "Aucun étudiant trouvé avec ce NCIN.";
    }
} else {
    echo "Erreur dans la requête : " . $connection->error;;
}
}
?>