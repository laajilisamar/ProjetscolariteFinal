<?php
include '../Etudiant/config.php';

if (isset($_GET['CodClasse'])) {
    $CodClasse = $_GET['CodClasse'];

    $query = "SELECT * FROM classe WHERE CodClasse = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('s', $CodClasse);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Modifier la Classe</title>
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
                <form action="UpdateC.php" method="post">
                <fieldset><legend><h2>Modifier la classe</h2></legend>  

                    <input type="hidden" name="CodClasse" value="<?php echo $row['CodClasse']; ?>">
                    <label for="IntClasse">Intitulé de la classe:</label>
                    <input type="text" name="IntClasse" value="<?php echo $row['IntClasse']; ?>" required><br>

                    <!-- Add other input fields for other columns -->
                    <label for="Departement">Département:</label>
                    <input type="text" name="Departement" value="<?php echo $row['Departement']; ?>" required><br>

                    <label for="Optionn">Option:</label>
                    <input type="text" name="Optionn" value="<?php echo $row['Optionn']; ?>" required><br>

                    <label for="Niveau">Niveau:</label>
                    <input type="text" name="Niveau" value="<?php echo $row['Niveau']; ?>" required><br>

                    <label for="IntCalsseArabB">IntCalsseArabB:</label>
                    <input type="text" name="IntCalsseArabB" value="<?php echo $row['IntCalsseArabB']; ?>" required><br>

                    <label for="OptionAaraB">OptionAaraB:</label>
                    <input type="text" name="OptionAaraB" value="<?php echo $row['OptionAaraB']; ?>" required><br>

                    <label for="DepartementAaraB">DepartementAaraB:</label>
                    <input type="text" name="DepartementAaraB" value="<?php echo $row['DepartementAaraB']; ?>" required><br>

                    <label for="NiveauAaraB">NiveauAaraB:</label>
                    <input type="text" name="NiveauAaraB" value="<?php echo $row['NiveauAaraB']; ?>" required><br>

                    <label for="CodeEtape">CodeEtape:</label>
                    <input type="text" name="CodeEtape" value="<?php echo $row['CodeEtape']; ?>" required><br>

                    <label for="CodeSalima">NiveauAaraB:</label>
                    <input type="text" name="CodeSalima" value="<?php echo $row['CodeSalima']; ?>" required><br>

                    <button type="submit" name="UpdateC">Mettre à jour la classe</button>
                    <button type="rest">Annuler</button>
                  <button><a href="indexC.php"></a>Retour</button>
        </fieldset>
                </form>
                </div>
    </div>
</div>
            </body>

            </html>
<?php
        } else {
            echo "Aucune classe trouvée avec ce code.";
        }
    } else {
        echo "Erreur dans la requête : " . $connection->error;
    }
} else {
    // Handle error or redirect to a page where the class to update is selected
    header("Location: IndexC.php");
    exit();
}
?>
