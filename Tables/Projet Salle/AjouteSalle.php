<?php
include_once "connect_ddb.php";  // Include the database connection file

// Fetch Departement records
$sql_departement = "SELECT Departement FROM departements";
$result_departement = $conn->query($sql_departement);

// Check if the query was successful
if ($result_departement) {
    $all_Departements = $result_departement;
} else {
    echo "Error fetching Departement records: " . $conn->error;
}

// Fetch Responsable records
$sql_responsable = "SELECT Responsable FROM departements";
$result_responsable = $conn->query($sql_responsable);

// Check if the query was successful
if ($result_responsable) {
    $all_Responsables = $result_responsable;
} else {
    echo "Error fetching Responsable records: " . $conn->error;
}

if (isset($_POST['send'])) {
    if(isset($_POST['Salle'])
    && isset($_POST['Departement'])
    && isset($_POST['Catégorie'])
    && isset($_POST['Responsable'])
    && isset($_POST['Charge'])
    && isset($_POST['NbPlaceExamen'])
    && isset($_POST['NbLignes'])
    && isset($_POST['NBCol'])
    && isset($_POST['NBSurv'])
    && isset($_POST['Type'])
    && isset($_POST['Disponible'])
    && $_POST['Salle'] != ""
    && $_POST['Departement'] != ""
    && $_POST['Catégorie'] != ""
    && $_POST['Responsable'] != ""
    && $_POST['Charge'] != ""
    && $_POST['NbPlaceExamen'] != ""
    && $_POST['NbLignes'] != ""
    && $_POST['NBCol'] != ""
    && $_POST['NBSurv'] != ""
    && $_POST['Type'] != ""
    && $_POST['Disponible'] != ""
    ) 
    {
        include_once "connect_ddb.php";
        extract($_POST) ;
        $sql = "INSERT INTO Salle (Salle,Departement,Catégorie,Responsable,Charge,NbPlaceExamen,NbLignes,NBCol,NBSurv,Type,Disponible) VALUES ('$Salle','$Departement','$Catégorie','$Responsable','$Charge','$NbPlaceExamen','$NbLignes','$NBCol','$NBSurv','$Type','$Disponible')";

    if (mysqli_query($conn, $sql)) {
        header("location:AffichierSalle.php");
    } else {
        header("location:AjouteSalle.php?message=AddFail");
    }
} else {
    header("location:AjouteSalle.php?message=EmptyFields");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
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
<form action="AjouteSalle.php" method="post">
<fieldset><legend>  <h1> Ajouter Un Salle </h1> </legend>
    <input type="text" name="Salle" placeholder="Identifient De Salle">

    <div class="form-group">
        <label for='Departement'>Departement</label>
        <select name="Departement" required>
            <?php while ($departement = mysqli_fetch_array($all_Departements, MYSQLI_ASSOC)) : ?>
                <option value="<?php echo $departement["Departement"]; ?>">
                    <?php echo $departement["Departement"]; ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <label for='Responsable'>Responsable</label>
        <select name="Responsable" required>
            <?php while ($responsable = mysqli_fetch_array($all_Responsables, MYSQLI_ASSOC)) : ?>
                <option value="<?php echo $responsable["Responsable"]; ?>">
                    <?php echo $responsable["Responsable"]; ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    <label>Catégorie</label>
    <input type="text" name="Catégorie" placeholder="Catégorie">
    <label>Charge</label>
    <input type="text" name="Charge" placeholder="Charge">
    <label>NbPlaceExamen</label>
    <input type="text" name="NbPlaceExamen" placeholder="Nombre Place Examen" >
    <label>Nb Lignes</label>
    <input type="text"  name="NbLignes"  placeholder="Nombre De Lignes" >
    <label>NBCol</label>
    <input type="text"  name="NBCol"  placeholder="Nombre De Colonne" >
    <label>NBSurv</label>
    <input type="text" name="NBSurv"   placeholder="Nombre De Survient" >
    <label>Type</label>
    <input type="text" name="Type" placeholder="Type" >
   

    <label>
        <input type="checkbox" value="Disponible" name="Disponible" <?php if (isset($Disponible) && is_array($Disponible) && in_array("Disponible", $Disponible)) echo "checked"?>/> Disponible
    </label>
    <label>
        <input type="checkbox" value="Non Disponible" name="Disponible" <?php if (isset($Disponible) && is_array($Disponible) && in_array("Non Disponible", $Disponible)) echo "checked"?>/> Non Disponible
    </label>

    <input type="submit" value="Ajouter" name="send">
    <button type="rest">Annuler</button>
        <button><a href="AffichierSalle.php">Retour</a></button>
        </fieldset>
    </form>
    </div>
    </div>
    </div>
    
</body>
</html>
















