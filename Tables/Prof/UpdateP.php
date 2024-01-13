<?php
include '../Etudiant/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $MatProf = $_POST['MatProf'];

    $updateQuery = "UPDATE prof SET ";
$updateQuery .= "Nom = '" . $_POST['Nom'] . "', ";
$updateQuery .= "Prénom = '" . $_POST['Prenom'] . "', ";
$updateQuery .= "CIN_ou_Passeport = '" . $_POST['CIN_ou_Passeport'] . "', ";
$updateQuery .= "Identifiant_CNRPS = '" . $_POST['identifiantCNRPS'] . "', ";
$updateQuery .= "Date_de_naissance = '" . $_POST['dateNaissance'] . "', ";
$updateQuery .= "Nationalité = '" . ($_POST['nationalite'] ?? '') . "', ";
$updateQuery .= "Sexe = '" . ($_POST['sexe'] ?? '') . "', ";
$updateQuery .= "Date_Ent_Adm = '" . ($_POST['dateEntAdm'] ?? '') . "', ";
$updateQuery .= "Date_Ent_Etbs = '" . ($_POST['dateEntEtbs'] ?? '') . "', ";
$updateQuery .= "Diplôme = '" . ($_POST['diplome'] ?? '') . "', ";
$updateQuery .= "Adresse = '" . ($_POST['adresse'] ?? '') . "', ";
$updateQuery .= "Ville = '" . ($_POST['ville'] ?? '') . "', ";
$updateQuery .= "Code_postal = '" . ($_POST['codePostal'] ?? '') . "', ";
$updateQuery .= "N_Téléphone = '" . ($_POST['telephone'] ?? '') . "', ";
$updateQuery .= "Grade = '" . ($_POST['grade'] ?? '') . "', ";
$updateQuery .= "Date_de_nomination_dans_le_grade = '" . ($_POST['dateNominationGrade'] ?? '') . "', ";
$updateQuery .= "Début_du_Contrat = '" . ($_POST['debutContrat'] ?? '') . "', "; // Added this line
$updateQuery .= "Fin_du_Contrat = '" . ($_POST['finContrat'] ?? '') . "'"; // Removed the extra comma
$updateQuery .= " WHERE MatProf = '$MatProf'";


    if ($connection->query($updateQuery) === TRUE) {
        echo "Enregistrement mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de l'enregistrement : " . $connection->error;
    }
} else {
    echo "Le formulaire de mise à jour n'a pas été soumis.";
}

// Ferme la connexion à la base de données
$connection->close();
?>
