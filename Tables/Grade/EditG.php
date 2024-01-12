<?php
include '../Etudiant/config.php';// Include your database connection file

if(isset($_GET['grade'])) {
    $gradeToUpdate = $_GET['grade'];

    // Fetch the details of the grade to be updated
    $query = "SELECT * FROM Grades WHERE Grade = '$gradeToUpdate'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Update form submission
        if(isset($_POST['modifier'])) {
            $newGrade = $_POST['Grade'];
            $newChargeTP = $_POST['ChargeTP'];
            $newChargeC = $_POST['ChargeC'];
            $newChargeTD = $_POST['ChargeTD'];
            $newGradeArab = $_POST['GradeArab'];
            $newChargeCI = $_POST['ChargeCI'];
            $newChargeTotal = $_POST['ChargeTotal'];

            // SQL query to update the grade
            $updateQuery = "UPDATE Grades 
                            SET Grade = '$newGrade', ChargeTP = '$newChargeTP', ChargeC = '$newChargeC', 
                                ChargeTD = '$newChargeTD', GradeArab = '$newGradeArab', ChargeCI = '$newChargeCI', 
                                ChargeTotal = '$newChargeTotal' 
                            WHERE Grade = '$gradeToUpdate'";
            
            // Execute the query
            $updateResult = mysqli_query($connection, $updateQuery);

            if($updateResult) {
                echo '<script>alert("Grade ajouté avec succès")</script>';
                header('location: indexG.php');
            } else {
                echo '<script>alert("Erruer de modifier")</script>';
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Grade</title>
    <!-- Include Bootstrap CSS here -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
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

            <fieldset><legend> <h2>Modifier Grade - <?php echo $row['Grade']; ?></h2>	</legend>
    <form method="POST" action="EditG.php?grade=<?php echo $gradeToUpdate; ?>">
        <div class="mb-3">
            <label for="Grade" class="form-label">Grade:</label>
            <input type="text" class="form-control" name="Grade" value="<?php echo $row['Grade']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="ChargeTP" class="form-label">ChargeTP:</label>
            <input type="number" min="0" class="form-control" name="ChargeTP" value="<?php echo $row['ChargeTP']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="ChargeC" class="form-label">ChargeC:</label>
            <input type="number" min="0" class="form-control" name="ChargeC" value="<?php echo $row['ChargeC']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="ChargeTD" class="form-label">ChargeTD:</label>
            <input type="number" min="0"class="form-control" name="ChargeTD" value="<?php echo $row['ChargeTD']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="GradeArab" class="form-label">GradeArab:</label>
            <input type="text" class="form-control" name="GradeArab" value="<?php echo $row['GradeArab']; ?>">
        </div>
        <div class="mb-3">
            <label for="ChargeCI" class="form-label">ChargeCI:</label>
            <input type="number" min="0" class="form-control" name="ChargeCI" value="<?php echo $row['ChargeCI']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="ChargeTotal" class="form-label">ChargeTotal:</label>
            <input type="number" min="0" class="form-control" name="ChargeTotal" value="<?php echo $row['ChargeTotal']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary" name="modifier">Submit Changes</button>
		<button type="rest">Annuler</button>
        <button><a href="IndexG.php">Retour</a></button>
    </fieldset>
    </form>
    </div>
    </div>
    </div>
<!-- Include Bootstrap JS and any additional scripts here -->
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
<?php
    } else {
        echo '<p class="text-danger">Error: Grade not found!</p>';
    }
} else {
    echo '<p class="text-danger">Error: Grade not specified!</p>';
}

// Close the database connection
mysqli_close($connection);
?>
