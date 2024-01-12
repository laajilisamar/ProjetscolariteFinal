<?php
include "config.php";

ini_set("display_errors", "1");
error_reporting(E_ALL);

$sqlSession = "SELECT Numero FROM Session";
$resultS = $conn->query($sqlSession);

$sqlClasse = "SELECT CodClasse FROM Classe";
$resultC = $conn->query($sqlClasse);

$sqlEtudiant = "SELECT NCIN FROM Etudiant";
$resultE = $conn->query($sqlEtudiant);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CodClasse = $_POST['CodClasse'];
    $MatEtud = $_POST['MatEtud'];
    $Session = $_POST['Session'];
    $DateInscription = $_POST['DateInscription'];
    $DecisionConseil = $_POST['DecisionConseil'];
    $Rachat = isset($_POST['Rachat']) ? 1 : 0;
    $MoyGen = $_POST['MoyGen'];
    $Dispense = isset($_POST['Dispense']) ? 1 : 0;
    $TauxAbsences = $_POST['TauxAbsences'];
    $Redouble = isset($_POST['Redouble']) ? 1 : 0;
    $StOuv = $_POST['StOuv'];
    $StTech = $_POST['StTech'];
    $TypeInscrip = $_POST['TypeInscrip'];
    $MontantIns = $_POST['MontantIns'];
    $Remarque = $_POST['Remarque'];
    $Sitfin = $_POST['Sitfin'];
    $Montant = $_POST['Montant'];
    $NoteSO = $_POST['NoteSO'];
    $NoteST = $_POST['NoteST'];

    // SQL query to insert data into the "Inscriptions" table
    $sql = "INSERT INTO inscriptions (CodClasse, MatEtud, Session, DateInscription, DecisionConseil, Rachat, MoyGen, Dispense, TauxAbsences, Redouble, StOuv, StTech, TypeInscrip, MontantIns, Remarque, Sitfin, Montant, NoteSO, NoteST) 
        VALUES ('$CodClasse', '$MatEtud', $Session, '$DateInscription', '$DecisionConseil', $Rachat, $MoyGen, $Dispense, $TauxAbsences, $Redouble, '$StOuv', '$StTech', '$TypeInscrip', '$MontantIns', '$Remarque', '$Sitfin', $Montant, $NoteSO, $NoteST)";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>

    <head>
        <title>Insert Inscriptions </title>
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
        <form action="create.php" method="post">
        <fieldset><legend> <h1>Insert Data into Inscriptions Table</h1></legend>

            <label for="CodClasse"> Code Classe:</label>
            <select name="CodClasse">
                <?php

            if ($resultC->num_rows > 0) {
                while ($row = $resultC->fetch_assoc()) {
                    $CodClasse = $row['CodClasse'];
                    echo "<option value='$CodClasse'>$CodClasse</option>";
                }
            }
            ?>
            </select><br><br>

            <label for="NCIN">Matricule Etudiant:</label>
            <select name="MatEtud">
                <?php

            if ($resultE->num_rows > 0) {
                while ($row = $resultE->fetch_assoc()) {
                    $NCIN = $row['NCIN'];
                    echo "<option value='$NCIN'>$NCIN</option>";
                }
            }
            ?>
            </select><br><br>

            <label for="Numero">Session:</label>
            <select name="Session">
                <?php

            if ($resultS->num_rows > 0) {
                while ($row = $resultS->fetch_assoc()) {
                    $Numero = $row['Numero'];
                    echo "<option value='$Numero'>$Numero</option>";
                }
            }
            ?>
            </select><br><br>

            <label for="DateInscription">Date d'Inscription:</label>
            <input type="date" name="DateInscription"><br><br>

            <label for="DecisionConseil">Décision du Conseil:</label>
            <input type="text" name="DecisionConseil" value="*****"><br><br>

            <label for="Rachat">Rachat:</label>
            <input type="checkbox" name="Rachat" value="1"><br><br>

            <label for="MoyGen">Moyenne Générale:</label>
            <input type="decimal" name="MoyGen" required title="Please enter a flaot">
            <br><br>

            <label for="Dispense">Dispense:</label>
            <input type="checkbox" name="Dispense" value="1"><br><br>

            <label for="TauxAbsences">Taux d'Absences:</label>
            <input type="decimal" name="TauxAbsences" required title="Please enter flaot"><br><br>

            <label for="Redouble">Redoublement:</label>
            <input type="checkbox" name="Redouble" value="1"><br><br>

            <label for="StOuv">Statut Ouverture:</label>
            <input type="text" name="StOuv"><br><br>

            <label for="StTech">Statut Technique:</label>
            <input type="text" name="StTech" required pattern=".{3,20}"
                title="Please enter at most 20 characters"><br><br>

            <label for="TypeInscrip">Type d'Inscription:</label>
            <input type="text" name="TypeInscrip" value="NR"><br><br>

            <label for="MontantIns">Montant d'Inscription:</label>
            <input type="text" name="MontantIns" required pattern=".{0,13}"
                title="Please enter at most 20 characters"><br><br>

            <label for="Remarque">Remarque:</label>
            <input type="text" name="Remarque" required pattern=".{0,20}"
                title="Please enter at most 20 characters"><br><br>

            <label for="Sitfin">Situation Financière:</label>
            <input type="text" name="Sitfin" required pattern=".{0,20}"
                title="Please enter at most 20 characters"><br><br>

            <label for="Montant">Montant:</label>
            <input type="decimal" name="Montant" required pattern="\d{18,0}" title="Please enter valid number"><br><br>

            <label for="NoteSO">Note Service Orientation:</label>
            <input type="decimal" name="NoteSO"><br><br>

            <label for="NoteST">Note Service Technique:</label>
            <input type="decimal" name="NoteST"><br><br>

            <input type="submit" value="Insert Data">
        <button type="rest">Annuler</button>
        <button><a href="view.php">Retour</a></button>
        </fieldset>
        </form>
        </div>
    </div>
    </div>
    </body>

</html>