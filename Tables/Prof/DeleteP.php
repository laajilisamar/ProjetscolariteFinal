<?php
include '../Etudiant/config.php';

// Vérifie si le paramètre MatProf est présent dans l'URL
if (isset($_GET['MatProf'])) {
    $matProfToDelete = $_GET['MatProf'];

    // Supprime d'abord les enregistrements dans la table 'modifgrade'
    $deleteModifgradeQuery = "DELETE FROM modifgrade WHERE MatProf = '$matProfToDelete'";

    if ($connection->query($deleteModifgradeQuery) === TRUE) {
        // Ensuite, supprime les enregistrements dans la table 'departements'
        $deleteDepartementsQuery = "DELETE FROM departements WHERE MatProf = '$matProfToDelete'";

        if ($connection->query($deleteDepartementsQuery) === TRUE) {
            // Ensuite, supprime l'enregistrement dans la table 'prof'
            $deleteProfQuery = "DELETE FROM prof WHERE MatProf = '$matProfToDelete'";

            if ($connection->query($deleteProfQuery) === TRUE) {
                echo "Enregistrement supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression de l'enregistrement dans la table 'prof': " . $connection->error;
            }
        } else {
            echo "Erreur lors de la suppression des enregistrements dans la table 'departements': " . $connection->error;
        }
    } else {
        echo "Erreur lors de la suppression des enregistrements dans la table 'modifgrade': " . $connection->error;
    }
} else {
    echo "Paramètre MatProf non spécifié.";
}

// Ferme la connexion à la base de données
$connection->close();
?>
