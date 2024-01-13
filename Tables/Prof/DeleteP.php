<?php
include '../Etudiant/config.php';

// Vérifie si le paramètre MatProf est présent dans l'URL
if (isset($_GET['MatProf'])) {
    $matProfToDelete = $_GET['MatProf'];

    // Supprime d'abord les enregistrements dans la table 'conges'
    $deleteCongesQuery = "DELETE FROM conges WHERE MatProf = '$matProfToDelete'";

    if ($connection->query($deleteCongesQuery) === TRUE) {
        // Ensuite, supprime d'autres enregistrements liés
        $deleteModifgradeQuery = "DELETE FROM modifgrade WHERE MatProf = '$matProfToDelete'";
        $deleteDepartementsQuery = "DELETE FROM departements WHERE MatProf = '$matProfToDelete'";
        $deleteProfQuery = "DELETE FROM prof WHERE MatProf = '$matProfToDelete'";

        if ($connection->query($deleteModifgradeQuery) === TRUE &&
            $connection->query($deleteDepartementsQuery) === TRUE &&
            $connection->query($deleteProfQuery) === TRUE) {
            echo "Enregistrement supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression des enregistrements : " . $connection->error;
        }
    } else {
        echo "Erreur lors de la suppression des enregistrements dans la table 'conges': " . $connection->error;
    }
} else {
    echo "Paramètre MatProf non spécifié.";
}

// Ferme la connexion à la base de données
$connection->close();
?>
