<?php
include '../Etudiant/config.php';

if (isset($_GET['CodClasse'])) {
    $CodClasse = $_GET['CodClasse'];

    // Check if there are dependent records in the "dossieretud" table
    $checkDependentQueryDossieretud = "SELECT * FROM dossieretud WHERE MatEtud IN (SELECT NCIN FROM etudiant WHERE CodClasse = ?)";
    $checkDependentResultDossieretud = mysqli_prepare($connection, $checkDependentQueryDossieretud);
    mysqli_stmt_bind_param($checkDependentResultDossieretud, 'i', $CodClasse);
    mysqli_stmt_execute($checkDependentResultDossieretud);
    $checkDependentResultDossieretud->store_result();

    if ($checkDependentResultDossieretud->num_rows > 0) {
        // Delete dependent records in the "dossieretud" table first
        $deleteDependentQueryDossieretud = "DELETE FROM dossieretud WHERE MatEtud IN (SELECT NCIN FROM etudiant WHERE CodClasse = ?)";
        $deleteDependentResultDossieretud = mysqli_prepare($connection, $deleteDependentQueryDossieretud);
        mysqli_stmt_bind_param($deleteDependentResultDossieretud, 'i', $CodClasse);
        mysqli_stmt_execute($deleteDependentResultDossieretud);

        if ($deleteDependentResultDossieretud) {
            $deleteStudentsQuery = "DELETE FROM etudiant WHERE CodClasse = ?";
            $deleteClassQuery = "DELETE FROM classe WHERE CodClasse = ?";

            try {
                mysqli_begin_transaction($connection);

                $stmt = mysqli_prepare($connection, $deleteStudentsQuery);
                mysqli_stmt_bind_param($stmt, 'i', $CodClasse);
                mysqli_stmt_execute($stmt);

                $stmt = mysqli_prepare($connection, $deleteClassQuery);
                mysqli_stmt_bind_param($stmt, 'i', $CodClasse);
                mysqli_stmt_execute($stmt);

                mysqli_commit($connection);
                echo '<script>alert("Classe supprimée avec succès")</script>';

                header("Location: IndexC.php");
                exit();
            } catch (Exception $e) {
                mysqli_rollback($connection);
                echo "Erreur lors de la suppression de la classe : " . $e->getMessage();
                exit();
            }
        } else {
            echo "Erreur lors de la suppression des enregistrements dépendants dans dossieretud : " . mysqli_error($connection);
            exit();
        }
    } else {
        $deleteStudentsQuery = "DELETE FROM etudiant WHERE CodClasse = ?";
        $deleteClassQuery = "DELETE FROM classe WHERE CodClasse = ?";

        try {
            mysqli_begin_transaction($connection);

            $stmt = mysqli_prepare($connection, $deleteStudentsQuery);
            mysqli_stmt_bind_param($stmt, 'i', $CodClasse);
            mysqli_stmt_execute($stmt);

            $stmt = mysqli_prepare($connection, $deleteClassQuery);
            mysqli_stmt_bind_param($stmt, 'i', $CodClasse);
            mysqli_stmt_execute($stmt);

            mysqli_commit($connection);
            echo '<script>alert("Classe supprimée avec succès")</script>';

            header("Location: IndexC.php");
            exit();
        } catch (Exception $e) {
            mysqli_rollback($connection);
            echo "Erreur lors de la suppression de la classe : " . $e->getMessage();
            exit();
        }
    }
} else {
    echo "Aucun identifiant de classe fourni.";
    exit();
}
?>
