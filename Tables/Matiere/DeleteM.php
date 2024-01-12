<?php
include '../Etudiant/config.php';

// Vérifier si le code de la matière est passé dans l'URL
if (isset($_GET['Code_Matiere'])) {
    $codeMatiere = $_GET['Code_Matiere'];

    // Exécuter la requête pour supprimer la matière
    $query = "DELETE FROM matieres WHERE `Code Matière` = '$codeMatiere'";

    try {
        if ($connection->query($query) === TRUE) {
            echo '<script>alert("Matière supprimée avec succès")</script>';
            header('location: indexM.php');
        
        } else {
            echo "Erreur lors de la suppression de la matière : " . $connection->error;
        }
    } catch (Exception $e) {
        echo "Erreur lors de la suppression de la matière : " . $e->getMessage();
    }
} else {
    echo "Code de la matière non spécifié.";
}
?>
