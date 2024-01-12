<?php
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matriculeProf = $_POST['MatProf'];
    $session = $_POST['Session'];
    $dateAbs = $_POST['dateAbs'];
    $seance = $_POST['Seance'];
    $motif = $_POST['Motif'];
    $typeSeance = $_POST['TypeSeance'];
    $codeClasse = $_POST['CodeClasse'];
    $codeMatiere = $_POST['CodeMatiere'];
    $justifier = isset($_POST['justifier']) ? 1 : 0;

    // Check if the provided matriculeProf exists in the 'prof' table
    $checkProfStmt = $pdo->prepare("SELECT * FROM prof WHERE MatProf = ?");
    $checkProfStmt->execute([$matriculeProf]);
    $profExists = $checkProfStmt->rowCount() > 0;

    if (!$profExists) {
        die("Error: The provided MatriculeProf does not exist in the 'prof' table.");
    }

    // Check if the provided CodeClasse exists in the 'classe' table
    $checkClasseStmt = $pdo->prepare("SELECT * FROM classe WHERE CodClasse = ?");
    $checkClasseStmt->execute([$codeClasse]);
    $classeExists = $checkClasseStmt->rowCount() > 0;

    if (!$classeExists) {
        die("Error: The provided CodeClasse does not exist in the 'classe' table.");
    }

    // Check if the provided CodeMatiere exists in the 'Matieres' table
    $checkMatiereStmt = $pdo->prepare("SELECT * FROM matieres WHERE Code Matière = ?");
    $checkMatiereStmt->execute([$codeMatiere]);
    $matiereExists = $checkMatiereStmt->rowCount() > 0;

    if (!$matiereExists) {
        die("Error: The provided CodeMatiere does not exist in the 'matieres' table.");
    }

    $stmt = $pdo->prepare("INSERT INTO absensg (MatProf, Session, DateAbs, Seance, Motif, TypeSeance, CodeClasse, Code Matière, Justifier) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$matriculeProf, $session, $dateAbs, $seance, $motif, $typeSeance, $codeClasse, $codeMatiere, $justifier]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Absence</title>
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

    <form action="create.php" method="POST">
    <fieldset><legend><h3>Create Absence</h3> </legend>

        <label for="MatProf">Matricule Prof:</label>
        <select name="MatProf">
        <?php
            $seanceStmt = $pdo->prepare("SELECT * FROM prof");
            $seanceStmt->execute();
            $seances = $seanceStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($seances as $seanceItem) {
                echo "<option value='{$seanceItem['MatProf']}'>{$seanceItem['MatProf']}</option>";
            }
            ?>
        </select>

        <label for="Session">Session:</label>
        <select name="Session">
            <?php
            $seanceStmt = $pdo->prepare("SELECT * FROM session");
            $seanceStmt->execute();
            $seances = $seanceStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($seances as $seanceItem) {
                echo "<option value='{$seanceItem['Numero']}'>{$seanceItem['Numero']}</option>";
            }
            ?>
        </select>

        <label for="DateAbs">DateAbs:</label>
        <input type="datetime-local" name="DateAbs" required>

        <label for="Seance">Seance:</label>
        <select name="Seance">
            <?php
            $seanceStmt = $pdo->prepare("SELECT * FROM seances");
            $seanceStmt->execute();
            $seances = $seanceStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($seances as $seanceItem) {
                echo "<option value='{$seanceItem['Seance']}'>{$seanceItem['Seance']}</option>";
            }
            ?>
        </select>

        <label for="Motif">Motif:</label>
        <input type="text" name="Motif">

        <label for="TypeSeance">TypeSeance:</label>
        <input type="text" name="TypeSeance">

        <label for="CodeClasse">CodeClasse:</label>
        <select name="CodeClasse">
            <?php
            $classeStmt = $pdo->prepare("SELECT * FROM classe");
            $classeStmt->execute();
            $classes = $classeStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($classes as $classe) {
                echo "<option value='{$classe['CodClasse']}'>{$classe['CodClasse']}</option>";
            }
            ?>
        </select>

        <label for="codeMatiere">CodeMatiere:</label>
        <select name="codeMatiere">
            <?php
            $matiereStmt = $pdo->prepare("SELECT * FROM matieres");
            $matiereStmt->execute();
            $matieres = $matiereStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($matieres as $matiere) {
                echo "<option value='{$matiere['Code Matière']}'>{$matiere['Code Matière']}</option>";
            }
            ?>
        </select>

        <label for="justifier">Justifier:</label>
        <input type="checkbox" name="justifier">

        <button type="submit">Create</button>
        <button type="rest">Annuler</button>
        <button><a href="Index.php">Retour</a></button>
        </fieldset>
    </form>
    </div>
    </div>
    </div>
</body>
</html>
