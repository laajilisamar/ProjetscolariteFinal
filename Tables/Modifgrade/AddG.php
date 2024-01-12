<?php
// create.php

include '../Etudiant/config.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=scolarite1", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve values from the form
    $NGmodif = $_POST['NGmodif'];
    $Grade = $_POST['Grade'];
    $DateNomin = $_POST['DateNomin'];
    $MatProf = $_POST['MatProf'];

    // Prepare the SQL query
    $sql = "INSERT INTO modifgrade (NGmodif, Grade, DateNomin, MatProf)
            VALUES (:NGmodif, :Grade, :DateNomin, :MatProf)";

    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':NGmodif', $NGmodif, PDO::PARAM_INT);
    $stmt->bindParam(':Grade', $Grade, PDO::PARAM_STR);
    $stmt->bindParam(':DateNomin', $DateNomin, PDO::PARAM_STR);
    $stmt->bindParam(':MatProf', $MatProf, PDO::PARAM_STR);

    // Execute the query
    try {
        $stmt->execute();
        header('Location: IndexG.php');
        exit();
    } catch (PDOException $e) {
        // Handle query execution errors
        die("Erreur d'insertion dans la base de données: " . $e->getMessage());
    }
}

// Fetch available options for Grade and MatProf
$gradeOptions = fetchOptions($pdo, "grades", "Grade");
$profOptions = fetchOptions($pdo, "prof", "MatProf");

// Function to fetch options from a table
function fetchOptions($pdo, $tableName, $columnName)
{
    $options = [];

    $query = "SELECT $columnName FROM $tableName";
    $stmt = $pdo->query($query);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $options[] = $row[$columnName];
    }

    return $options;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Modification Grade</title>
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

    <form method="post" action="AddG.php">
    <fieldset><legend> <h2>Add Modification Grade</h2> </legend>

        <label for="NGmodif">NGmodif:</label>
        <input type="text" name="NGmodif" required>
        <br>

        <label for="Grade">Grade:</label>
        <select name="Grade" required>
            <?php
            foreach ($gradeOptions as $grade) {
                echo "<option value='$grade'>$grade</option>";
            }
            ?>
        </select>
        <br>

        <label for="DateNomin">DateNomin:</label>
        <input type="datetime-local" name="DateNomin" required>
        <br>

        <label for="MatProf">MatProf:</label>
        <select name="MatProf" required>
            <?php
            foreach ($profOptions as $prof) {
                echo "<option value='$prof'>$prof</option>";
            }
            ?>
        </select>
        <br>

        <input type="submit" name="submit" value="Add Modification Grade">
    
    <button type="rest">Annuler</button>
        <button><a href="IndexG.php">Retour</a></button>
        </fieldset>
    </form>
    </div>
    </div>
    </div>
</body>
</html>
