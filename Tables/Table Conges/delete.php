<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Conge</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Delete Conge</h2>
        <?php
        // Include config file
        require_once "db.php";
        
        // Check if the "id" parameter is in the URL
        if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
            // Prepare a SELECT statement to retrieve the existing data
            $sql = "SELECT * FROM conges WHERE NumConge = ?";
            
            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind the "id" parameter as a parameter to the prepared statement
                mysqli_stmt_bind_param($stmt, "i", $param_id);
                
                // Set the "id" parameter from the URL
                $param_id = trim($_GET["id"]);
                
                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result);
                        $MatriculeProf = $row["MatProf"];
                        $DateDeb = $row["DateDeb"];
                        $DateFin = $row["DateFin"];
                    } else {
                        echo "No records found.";
                        exit();
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close the statement
            mysqli_stmt_close($stmt);
            
            // Close connection
            mysqli_close($link);
        } else {
            echo "Invalid request.";
            exit();
        }
        ?>
        <div class="alert alert-danger">
            <p>Are you sure you want to delete this record?</p>
        </div>
        <form action="delete-process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $param_id; ?>">
            <div class="form-group">
                <label for="MatriculeProf">MatriculeProf:</label>
                <input type="text" class="form-control" id="MatProf" name="MatProf" value="<?php echo $MatriculeProf; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="DateDeb">DateDeb:</label>
                <input type="text" class="form-control" id="DateDeb" name="DateDeb" value="<?php echo $DateDeb; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="DateFin">DateFin:</label>
                <input type="text" class="form-control" id="DateFin" name="DateFin" value="<?php echo $DateFin; ?>" disabled>
            </div>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="index.php" class="btn btn-secondary">No, Cancel</a>
        </form>
    </div>
</body>
</html>
