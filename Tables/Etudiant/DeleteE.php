<?php
include '../Etudiant/config.php';

if (isset($_GET['CodClasse'])) {
    $CodClasse = $_GET['CodClasse'];

    // Check if there are dependent records in the "dossieretud" table
    $checkDependentQueryDossieretud = "SELECT * FROM dossieretud WHERE MatEtud IN (SELECT NCIN FROM etudiant WHERE CodClasse = ?)";
    $checkDependentResultDossieretud = mysqli_query($connection, $checkDependentQueryDossieretud);

    if ($checkDependentResultDossieretud) {
        // Delete dependent records in the "dossieretud" table first
        $deleteDependentQueryDossieretud = "DELETE FROM dossieretud WHERE MatEtud IN (SELECT NCIN FROM etudiant WHERE CodClasse = ?)";
        $deleteDependentResultDossieretud = mysqli_query($connection, $deleteDependentQueryDossieretud);

        if ($deleteDependentResultDossieretud) {
            // Proceed with deleting the students and the class
            $deleteStudentsQuery = "DELETE FROM etudiant WHERE CodClasse = ?";
            $deleteClassQuery = "DELETE FROM classe WHERE CodClasse = ?";

            mysqli_begin_transaction($connection);

            $stmt = mysqli_prepare($connection, $deleteStudentsQuery);
            mysqli_stmt_bind_param($stmt, "s", $CodClasse);
            mysqli_stmt_execute($stmt);

            $stmt = mysqli_prepare($connection, $deleteClassQuery);
            mysqli_stmt_bind_param($stmt, "s", $CodClasse);
            mysqli_stmt_execute($stmt);

            mysqli_commit($connection);
            echo '<script>alert("Classe supprimée avec succès")</script>';

            header("Location: IndexC.php");
            exit();
        } else {
            echo "Erreur lors de la suppression des enregistrements dépendants dans dossieretud : " . mysqli_error($connection);
            exit();
        }
    } else {
        // No dependent records in the "dossieretud" table, proceed with deleting the students and the class
        $deleteStudentsQuery = "DELETE FROM etudiant WHERE CodClasse = ?";
        $deleteClassQuery = "DELETE FROM classe WHERE CodClasse = ?";

        mysqli_begin_transaction($connection);

        $stmt = mysqli_prepare($connection, $deleteStudentsQuery);
        mysqli_stmt_bind_param($stmt, "s", $CodClasse);
        mysqli_stmt_execute($stmt);

        $stmt = mysqli_prepare($connection, $deleteClassQuery);
        mysqli_stmt_bind_param($stmt, "s", $CodClasse);
        mysqli_stmt_execute($stmt);

        mysqli_commit($connection);
        echo '<script>alert("Classe supprimée avec succès")</script>';

        header("Location: IndexC.php");
        exit();
    }
} else {
    echo "Aucun identifiant de classe fourni.";
    exit();
}
?>
