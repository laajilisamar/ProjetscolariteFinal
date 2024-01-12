<?php
include "config.php";

ini_set("display_errors", "1");
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NumIns = $_POST['NumIns'];
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

    $sqlupdate = "UPDATE Inscriptions SET CodClasse = '$CodClasse', MatEtud = '$MatEtud', Session = $Session, DateInscription = '$DateInscription', DecisionConseil = '$DecisionConseil', Rachat = $Rachat, MoyGen = $MoyGen, Dispense = $Dispense, TauxAbsences = $TauxAbsences, Redouble = $Redouble, StOuv = '$StOuv', StTech = '$StTech', TypeInscrip = '$TypeInscrip', MontantIns = '$MontantIns', Remarque = '$Remarque', Sitfin = '$Sitfin', Montant = $Montant, NoteSO = $NoteSO, NoteST = $NoteST WHERE NumIns = $NumIns";

    if ($conn->query($sqlupdate) === TRUE) {
        echo "Record updated successfully";
        echo '<script>window.setTimeout(function(){ window.location.href = "view.php"; }, 2000);</script>';
    } else {
        echo "Error updating record: " . $conn->error;
    }
    header("Location: view.php");
}



?>

<!DOCTYPE html>
<html>

    <head>
        <title>Update Record in Inscriptions Table</title>
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
        <form action="update.php" method="post">
        <fieldset><legend> <h1>Update Inscriptions </h1> </legend>

            <?php
        if (isset($_GET['NumIns'])) {
            $id = mysqli_real_escape_string($conn, $_GET['NumIns']);
            $NumIns = $id;
        }
        $sql = "SELECT * FROM Inscriptions WHERE NumIns = $NumIns";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            $CodClasse = $row['CodClasse'];
            $MatEtud = $row['MatEtud'];
            $Session = $row['Session'];
            $DateInscription = $row['DateInscription'];
            $DecisionConseil = $row['DecisionConseil'];
            $Rachat = $row['Rachat'];
            $MoyGen = $row['MoyGen'];
            $Dispense = $row['Dispense'];
            $TauxAbsences = $row['TauxAbsences'];
            $Redouble = $row['Redouble'];
            $StOuv = $row['StOuv'];
            $StTech = $row['StTech'];
            $TypeInscrip = $row['TypeInscrip'];
            $MontantIns = $row['MontantIns'];
            $Remarque = $row['Remarque'];
            $Sitfin = $row['Sitfin'];
            $Montant = $row['Montant'];
            $NoteSO = $row['NoteSO'];
            $NoteST = $row['NoteST'];
        }
        ?>
            <input type="hidden" name="NumIns" value="<?php echo $NumIns; ?>">

            <label for="CodClasse">Code de Classe:</label>
            <input type="text" name="CodClasse" value="<?php echo $CodClasse; ?>" required>

            <label for="MatEtud">Matricule Etudiant:</label>
            <input type="text" name="MatEtud" value="<?php echo $MatEtud; ?>" required>

            <label for="Session">Session:</label>
            <input type="text" name="Session" value="<?php echo $Session; ?>" required>

            <label for="DateInscription">Date d'Inscription:</label>
            <input type="text" name="DateInscription" value="<?php echo $DateInscription; ?>">

            <label for="DecisionConseil">Décision du Conseil:</label>
            <input type="text" name="DecisionConseil" value="<?php echo $DecisionConseil; ?>">

            <label for="Rachat">Rachat:</label>
            <input type="checkbox" name="Rachat" value="1" <?php if ($Rachat) echo 'checked'; ?>>

            <label for="MoyGen">Moyenne Générale:</label>
            <input type="number" name="MoyGen" value="<?php echo $MoyGen; ?>" required
                title="Please enter a flaot">

            <label for="Dispense">Dispense:</label>
            <input type="checkbox" name="Dispense" value="1" <?php if ($Dispense) echo 'checked'; ?>>

            <label for="TauxAbsences">Taux d'Absences:</label>
            <input type="number" name="TauxAbsences" value="<?php echo $TauxAbsences; ?>" required
                title="Please enter a flaot">

            <label for="Redouble">Redoublement:</label>
            <input type="checkbox" name="Redouble" value="1" <?php if ($Redouble) echo 'checked'; ?>>

            <label for="StOuv">Statut Ouverture:</label>
            <input type="text" name="StOuv" value="<?php echo $StOuv; ?>">

            <label for="StTech">Statut Technique:</label>
            <input type="text" name="StTech" value="<?php echo $StTech; ?>" required pattern=".{3,20}"
                title="Please enter at most 20 characters">

            <label for="TypeInscrip">Type d'Inscription:</label>
            <input type="text" name="TypeInscrip" value="<?php echo $TypeInscrip; ?>">

            <label for="MontantIns">Montant d'Inscription:</label>
            <input type="text" name="MontantIns" value="<?php echo $MontantIns; ?>" required pattern=".{0,13}"
                title="Please enter at most 20 characters">

            <label for="Remarque">Remarque:</label>
            <input type="text" name="Remarque" value="<?php echo $Remarque; ?>" required pattern=".{0,20}"
                title="Please enter at most 20 characters">

            <label for="Sitfin">Situation Financière:</label>
            <input type="text" name="Sitfin" value="<?php echo $Sitfin; ?>" required pattern=".{0,20}"
                title="Please enter at most 20 characters">

            <label for="Montant">Montant:</label>
            <input type="number" name="Montant" value="<?php echo $Montant; ?>" required pattern="\d{18,0}"
                title="Please enter valid number">

            <label for="NoteSO">Note Service Orientation:</label>
            <input type="number" name="NoteSO" value="<?php echo $NoteSO; ?>">

            <label for="NoteST">Note Service Technique:</label>
            <input type="number" name="NoteST" value="<?php echo $NoteST; ?>">
<br><br>
            <input type="submit" value="Update Record">

            <button type="rest">Annuler</button>
        <button><a href="IndexP.php">Retour</a></button>
	</fieldset>
	</form>
    </div>
    </div>
    </div>
        
    </body>

</html>