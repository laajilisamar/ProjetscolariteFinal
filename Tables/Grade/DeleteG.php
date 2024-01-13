<?php
include '../Etudiant/config.php'; // Include your database connection file

if (isset($_GET['grade'])) {
    $gradeToDelete = $_GET['grade'];

    // Check if there are dependent records in the "profsituation" table
    $checkDependentQuery = "SELECT * FROM profsituation WHERE Grade = '$gradeToDelete'";
    $checkDependentResult = mysqli_query($connection, $checkDependentQuery);

    if (mysqli_num_rows($checkDependentResult) > 0) {
        // Delete dependent records in the "profsituation" table first
        $deleteDependentQuery = "DELETE FROM profsituation WHERE Grade = '$gradeToDelete'";
        $deleteDependentResult = mysqli_query($connection, $deleteDependentQuery);

        if ($deleteDependentResult) {
            // Proceed with deleting the record from the "Grades" table
            $deleteQuery = "DELETE FROM Grades WHERE Grade = '$gradeToDelete'";
            $deleteResult = mysqli_query($connection, $deleteQuery);

            if ($deleteResult) {
                echo '<script>alert("Grade deleted successfully!")</script>';
                header('location: indexG.php');
            } else {
                echo '<p class="text-danger">Error deleting grade: ' . mysqli_error($connection) . '</p>';
            }
        } else {
            echo '<p class="text-danger">Error deleting dependent records in profsituation: ' . mysqli_error($connection) . '</p>';
        }
    } else {
        // No dependent records in the "profsituation" table, proceed with deleting the grade
        $deleteQuery = "DELETE FROM Grades WHERE Grade = '$gradeToDelete'";
        $deleteResult = mysqli_query($connection, $deleteQuery);

        if ($deleteResult) {
            echo '<script>alert("Grade deleted successfully!")</script>';
            header('location: indexG.php');
        } else {
            echo '<p class="text-danger">Error deleting grade: ' . mysqli_error($connection) . '</p>';
        }
    }
} else {
    // Grade parameter not specified
    echo '<p class="text-danger">Error: Grade not specified!</p>';
}

// Close the database connection
mysqli_close($connection);
?>
