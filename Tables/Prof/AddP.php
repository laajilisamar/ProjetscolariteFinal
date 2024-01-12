<?php
// Include the database connection file
include '../Etudiant/config.php'; 

// Récupérer la liste des départements pour le champ de sélection
$departementsQuery = "SELECT CodeDep, Departement FROM departements";
$departementsResult = $connection->query($departementsQuery);
$gradesQuery = "SELECT * FROM grades";
$gradesResult = $connection->query($gradesQuery);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $MatProf = $_POST['MatProf'];
    $Nom = $_POST['Nom'];
    $Prénom = $_POST['Prenom'];
    $CIN_ou_Passeport = $_POST['CIN_ou_Passeport'];
    $identifiantCNRPS = $_POST['identifiantCNRPS'];
    $dateNaissance = $_POST['dateNaissance'];
    $nationalite = $_POST['nationalite'];
    $sexe = $_POST['sexe'];
    $dateEntAdm = $_POST['dateEntAdm'];
    $dateEntEtbs = $_POST['dateEntEtbs'];
    $diplome = $_POST['diplome'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['codePostal'];
    $telephone = $_POST['telephone'];
    $grade = $_POST['grade'];
    $dateNominationGrade = $_POST['dateNominationGrade'];
    $dateTitularisation = $_POST['dateTitularisation'];
    $nPoste = $_POST['nPoste'];
    $departement = $_POST['codeDep'];
    $situation = $_POST['situation'];
    $specialite = $_POST['specialite'];
    $nCompte = $_POST['nCompte'];
    $banque = $_POST['banque'];
    $agence = $_POST['agence'];
    $adrVacances = $_POST['adrVacances'];
    $telVacances = $_POST['telVacances'];
    $lieuNaissance = $_POST['lieuNaissance'];
    $debutContrat = $_POST['debutContrat'];
    $finContrat = $_POST['finContrat'];
    $typeContrat = $_POST['typeContrat'];
    $nbContratISETSOUSSE = $_POST['nbContratISETSOUSSE'];
    $nbContratAutreEtb = $_POST['nbContratAutreEtb'];
    $bureau = $_POST['bureau'];
    $email = $_POST['email'];
    $emailInterne = $_POST['emailInterne'];
    $nomArabe = $_POST['nomArabe'];
    $prenomArabe = $_POST['prenomArabe'];
    $lieuNaisArabe = isset($_POST['lieuNaisArabe']) ? $_POST['lieuNaisArabe'] : '';
    $adresseArabe = isset($_POST['adresseArabe']) ? $_POST['adresseArabe'] : '';
    $villeArabe = isset($_POST['villeArabe']) ? $_POST['villeArabe'] : '';
    $disponible = isset($_POST['disponible']) ? $_POST['disponible'] : '';
    $sousSP = isset($_POST['sousSP']) ? $_POST['sousSP'] : '';
    $etbOrigine = isset($_POST['etbOrigine']) ? $_POST['etbOrigine'] : '';
    $typeEnsg = isset($_POST['typeEnsg']) ? $_POST['typeEnsg'] : '';
    $controlAcces = isset($_POST['controlAcces']) ? $_POST['controlAcces'] : '';
    
    // Prepare and execute the SQL query
    $sql = "INSERT INTO prof (
    MatProf, Nom, Prénom, CIN_ou_Passeport, Identifiant_CNRPS, 
        Date_de_naissance, Nationalité, Sexe, Date_Ent_Adm, Date_Ent_Etbs,
        Diplôme, Adresse, Ville, Code_postal, N_Téléphone, Grade,
        Date_de_nomination_dans_le_grade, Date_de_titularisation, N_Poste,
        Département, Situation, Spécialité, N_de_Compte, Banque, Agence,
        Adr_pendant_les_vacances, Tél_pendant_les_vacances, Lieu_de_naissance,
        Début_du_Contrat, Fin_du_Contrat, Type_de_Contrat, NB_contrat_ISETSOUSSE,
        NB_contrat_Autre_Etb, Bureau, Email, Email_Interne, NomArabe, PrenomArabe,
        LieuNaisArabe, AdresseArabe, VilleArabe, Disponible, SousSP, EtbOrigine,
        TypeEnsg, ControlAcces
    ) VALUES (
        '$MatProf', '$Nom', '$Prénom', '$CIN_ou_Passeport', '$identifiantCNRPS', 
        '$dateNaissance', '$nationalite', '$sexe', '$dateEntAdm', '$dateEntEtbs',
        '$diplome', '$adresse', '$ville', '$codePostal', '$telephone', '$grade',
        '$dateNominationGrade', '$dateTitularisation', '$nPoste', '$departement',
        '$situation', '$specialite', '$nCompte', '$banque', '$agence',
        '$adrVacances', '$telVacances', '$lieuNaissance', '$debutContrat',
        '$finContrat', '$typeContrat', '$nbContratISETSOUSSE', '$nbContratAutreEtb',
        '$bureau', '$email', '$emailInterne', '$nomArabe', '$prenomArabe',
        '$lieuNaisArabe', '$adresseArabe', '$villeArabe', '$disponible', '$sousSP',
        '$etbOrigine', '$typeEnsg', '$controlAcces'
    )";

    
    if ($connection->query($sql) === TRUE) {
        echo '<script>alert(" Record added successfully")</script>';
        header('location: indexP.php');
       
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Professeur</title>
</head>
<style>
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
    <form action="" method="post">
    <fieldset><legend> Ajout d'un Professeur</legend> 

        <label for="MatProf"><span>Matricule Prof :</span>
        <input type="text" name="MatProf" required  class="input-field">
        </label>

        <label for="Nom"><span>Nom :</span>
        <input type="text" name="Nom"   class="input-field"required>
        </label>

        <label for="Prenom"><span>Prénom :</span>
        <input type="text" name="Prenom" required  class="input-field">
        </label>

        <label for="CIN_ou_Passeport"><span>CIN ou Passeport :</span>
        <input type="text" name="CIN_ou_Passeport"  class="input-field">
        </label>

        <label for="identifiantCNRPS"><span>Identifiant CNRPS :</span>
        <input type="text" name="identifiantCNRPS"  class="input-field">
        </label>

        <label for="dateNaissance"><span>Date de naissance :</span>
        <input type="date" name="dateNaissance"  class="input-field">
        </label>

        <label for="nationalite"><span>Nationalité :</span>
        <input type="text" name="nationalite"  class="input-field">
        </label>

        <label for="sexe"><span>Sexe :</span>
        <input type="text" name="sexe"  class="input-field">   
        </label>  

        <label for="dateEntAdm"><span>Date d'entrée administrative :</span>
        <input type="date" name="dateEntAdm"  class="input-field">
        </label>

        <label for="dateEntEtbs"><span>Date d'entrée à l'établissement :</span>
        <input type="date" name="dateEntEtbs"  class="input-field">
        </label>

        <label for="diplome"><span>Diplôme :</span>
        <input type="text" name="diplome"  class="input-field">
        </label>

        <label for="adresse"><span>Adresse :</span>
        <input type="text" name="adresse"  class="input-field">
        </label>

        <label for="ville"><span>Ville :</span>
        <input type="text" name="ville"  class="input-field">
        </label>

        <label for="codePostal"><span>Code postal :</span>
        <input type="text" name="codePostal" class="input-field">
        </label>

        <label for="telephone"><span>Téléphone :</span>
        <input type="text" name="telephone"  class="input-field">
        </label>

        <label for="grade"><span>Grade :</span>
        <select name="grade"  class="select-field">
            <?php


            // Afficher les options du champ de sélection
            while ($row = $gradesResult->fetch_assoc()) {
                echo "<option value='" . $row['Grade'] . "'>" . $row['Grade'] . "</option>";
            }
            ?>
        </select></label>
    
        <label for="dateNominationGrade"><span>Date de nomination dans le grade :</span>
        <input type="date" name="dateNominationGrade"  class="input-field">
        </label>

        <label for="dateTitularisation"><span>Date de titularisation :</span>
        <input type="date" name="dateTitularisation"  class="input-field">
        </label>

        <label for="nPoste"><span>Numéro de poste :</span>
        <input type="text" name="nPoste"  class="input-field">
        </label>
        <label for="departement"><span>Département :</span>
        <select name="codeDep"  class="select-field">
            <?php
            // Afficher la liste des départements
            while ($row = $departementsResult->fetch_assoc()) {
                echo "<option value='" . $row['CodeDep'] . "'>" . $row['Departement'] . "</option>";
            }
            ?>
        </select></label>

        

        <label for="situation"><span>Situation :</label>
        <input type="text" name="situation"  class="input-field">
        </label>

        <label for="specialite"><span>Spécialité :</label>
        <input type="text" name="specialite"  class="input-field">
        </label>

        <label for="nCompte"><span>Numéro de Compte :</label>
        <input type="text" name="nCompte"  class="input-field">
        </label>

        <label for="banque"><span>Banque :</span>
        <input type="text" name="banque"  class="input-field">
        </label>

        <label for="agence"><span>Agence :</span>
        <input type="text" name="agence"  class="input-field">
        </label>

        <label for="adrVacances"><span>Adresse pendant les vacances :</span>
        <input type="text" name="adrVacances"  class="input-field">
        </label>

        <label for="telVacances"><span>Téléphone pendant les vacances :</span>
        <input type="text" name="telVacances"  class="input-field">
        </label>

        <label for="lieuNaissance"><span>Lieu de naissance :</span>
        <input type="text" name="lieuNaissance"  class="input-field">
        </label>

        <label for="debutContrat"><span>Début du Contrat :</span>
        <input type="date" name="debutContrat"  class="input-field">
        </label>

        <label for="finContrat"><span>Fin du Contrat :</span>
        <input type="date" name="finContrat"  class="input-field">
        </label>

        <label for="typeContrat"><span>Type de Contrat :</span>
        <input type="text" name="typeContrat"  class="input-field">
        </label>

    
        <label for="nbContratISETSOUSSE"><span>Nombre de Contrats à l'ISET SOUSSE :</span>
        <input type="number" name="nbContratISETSOUSSE" class="input-field">
        </label>

    
        <label for="nbContratAutreEtb"><span>Nombre de Contrats dans un autre établissement :</span>
        <input type="text" name="nbContratAutreEtb"  class="input-field">
        </label>

        <label for="bureau"><span>Bureau :</span>
        <input type="text" name="bureau"  class="input-field">
        </label>

        <label for="email"><span>Email :</span>
        <input type="email" name="email"  class="input-field">
        </label>

        <label for="emailInterne"><span>Email Interne :</span>
        <input type="email" name="emailInterne"  class="input-field">
        </label>

        <label for="nomArabe"><span>Nom en Arabe :</span>
        <input type="text" name="nomArabe"  class="input-field">
        </label>


        <label for="prenomArabe"><span>Prénom en Arabe :</span>
        <input type="text" name="prenomArabe"  class="input-field">
        </label>

    
        <label for="typeEnsg"><span>Type d'Enseignement :</span>
        <input type="text" name="typeEnsg"  class="input-field">
        </label>

    
        <input type="submit" value="Ajouter Professeur" >
        <button type="rest">Annuler</button>
        <button><a href="IndexP.php">Retour</a></button>
        </fieldset>
    </form>
    </div>
    </div>
    
    
</body>
</html>
