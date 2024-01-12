<?php
include '../Etudiant/config.php';

if (isset($_GET['Code_Option'])) {
    $Code_Option = $_GET['Code_Option'];

    $query = "SELECT * FROM options WHERE Code_Option = '$Code_Option'";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        $option = $result->fetch_assoc();
    } else {
		echo '<script>alert("Option non trouvée")</script>';
 
   
        exit;
    }
} else {
    echo "Identifiant de l'option non spécifié.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une option</title>
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
    <form method="post" action="UpdateO.php">
    <fieldset><legend><h2>Modifier une option</h2></legend>

        <input type="hidden" name="Code_Option" value="<?php echo $option['Code_Option']; ?>">

        <label for="optionName">Option_Name:</label>
        <input type="text" name="optionName" value="<?php echo $option['Option_Name']; ?>" required><br>

        <label for="departement">Departement:</label>
        <select name="codeDep">
            <?php
            // Récupérer la liste des départements
            $departementsQuery = "SELECT CodeDep, Departement FROM departements";
            $departementsResult = $connection->query($departementsQuery);

            while ($row = $departementsResult->fetch_assoc()) {
                $selected = ($row['CodeDep'] == $option['Departement']) ? 'selected' : '';
                echo "<option value='" . $row['CodeDep'] . "' $selected>" . $row['Departement'] . "</option>";
            }
            ?>
        </select><br>

        <label for="optionAraB">Option_AraB:</label>
        <input type="text" name="optionAraB" value="<?php echo $option['Option_AraB']; ?>"><br>
<br>
        <input type="submit" value="Modifier">
        <button type="rest">Annuler</button>
        <button><a href="indexO.html"></a>Retour</button>
        </fieldset>
		
    </form>
    </div>
    </div>
    </div>
</body>
</html>
