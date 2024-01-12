<?php
include '../Etudiant/config.php';

// Fetch department data
$query_departements = "SELECT * FROM departements";
$result_departements = mysqli_query($connection, $query_departements);

// Check if the query was successful
if ($result_departements) {
    // Fetch department data into an array
    $all_departements = mysqli_fetch_all($result_departements, MYSQLI_ASSOC);
} else {
    // Handle the error if the query fails
    echo "Error fetching departements: " . mysqli_error($connection);
}
// Fetch option data
$query_options = "SELECT * FROM options";
$result_options = mysqli_query($connection, $query_options);

// Check if the query was successful
if ($result_options) {
    // Fetch option data into an array
    $all_options = mysqli_fetch_all($result_options, MYSQLI_ASSOC);
} else {
    // Handle the error if the query fails
    echo "Error fetching options: " . mysqli_error($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Classe</title>
    <!--link rel="stylesheet" href="assets/css/styleFormadd.css"-->
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
            
    <form action="AddC.php" method="post">
        <fieldset><legend> Créer une nouvelle classe</legend>

        <label for="CodClasse"><span>Code de la classe: <span class="required">*</span></span>
        <input type="text" name="CodClasse"  class="input-field" required>
    </label>

        <label for="IntClasse"><span>Intitulé de classe:<span class="required">*</span></span>
        <input  type="text"  name="IntClasse"  class="input-field" required>
    </label>
       

      <label for="Departement"><span>Département:</span>
<select name="CodDep"   class="select-field">
    <?php 
        foreach ($all_departements as $Departement) {
            echo "<option value='{$Departement["CodeDep"]}'>{$Departement["CodeDep"]}</option>";
        }
    ?>
</select>
</label>

<label for="Optionn"><span>Option:</span>
<select name="Code_Option"  class="select-field">
    <?php 
        foreach ($all_options as $Option_Name) {
            echo "<option value='{$Option_Name["Code_Option"]}'>{$Option_Name["Code_Option"]}</option>";
        }
    ?>
</select>
</label>


        <label for="Niveau"><span>Niveau:</span>
        <input type="text" name="Niveau"  class="input-field">
        </label>
        
<label for="IntCalsseArabB"><span>Intitulé classe (Arabe):</span>
<input type="text" name="IntCalsseArabB"  class="input-field">
</label>

<label for="OptionAaraB"><span>Option (Arabe):</span>
<input type="text" name="OptionAaraB"  class="input-field">
</label>

<label for="DepartementAaraB"><span>Département (Arabe):</span>
<input type="text" name="DepartementAaraB"  class="input-field">
</label>

<label for="NiveauAaraB"><span>Niveau (Arabe):</span>
<input type="text" name="NiveauAaraB"  class="input-field">
</label>

<label for="CodeEtape"><span>Code Étape:</span>
<input type="text" name="CodeEtape"  class="input-field">
</label>

<label for="CodeSalima"><span>Code Salima:</span>
<input type="text" name="CodeSalima"  class="input-field">
</label>



        <!-- Ajoutez les autres champs du formulaire en fonction de votre structure de base de données -->

        <button type="submit" name="AddC"> Créer la classe</button>
        <button type="rest">Annuler</button>
        <button><a href="IndexC.php">Retour</a></button>
        </fieldset>
    </form>
    </div>
    </div>
</div>
</body>
</html>

<?php
include '../Etudiant/config.php';

if (isset($_POST['AddC'])) {
    $CodClasse = $_POST['CodClasse'];
    $IntClasse = $_POST['IntClasse'];
    $Departement = $_POST['CodDep'];
    $Optionn = $_POST['Code_Option'];
    $Niveau = $_POST['Niveau'];
    $IntCalsseArabB = $_POST['IntCalsseArabB'];
    $OptionAaraB = $_POST['OptionAaraB'];
    $DepartementAaraB = $_POST['DepartementAaraB'];
    $NiveauAaraB = $_POST['NiveauAaraB'];
    $CodeEtape = $_POST['CodeEtape'];
    $CodeSalima = $_POST['CodeSalima'];

    // Check if the CodClasse already exists
    $check_query = "SELECT CodClasse FROM classe WHERE CodClasse = ?";
    $check_stmt = $connection->prepare($check_query);
    $check_stmt->execute([$CodClasse]);

    if ($check_stmt->fetch()) {
        echo '<script>alert("Error: CodClasse already exists.")</script>';
        header('location:IndexC.php');
    } else {
        // Perform the insertion
        $query = "INSERT INTO classe (CodClasse, IntClasse, Departement, Optionn, Niveau, IntCalsseArabB, OptionAaraB, 
                   DepartementAaraB, NiveauAaraB, CodeEtape, CodeSalima)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmt = $connection->prepare($query);
            $stmt->execute([$CodClasse, $IntClasse, $Departement, $Optionn, $Niveau, $IntCalsseArabB, $OptionAaraB,
                            $DepartementAaraB, $NiveauAaraB, $CodeEtape, $CodeSalima]);
                            
            echo '<script>alert("La classe a été créée avec succès.")</script>';
            header('location:IndexC.php');


        } catch (PDOException $e) {
            echo "Erreur lors de la création de la classe : " . $e->getMessage();
        }
    }
}

?>
