
<!DOCTYPE html>
<html>
<head>
    <title>Option</title>



    <style>
 table {

  width: 100%;
  border-collapse: collapse;
  border: 3px solid #999999;
  margin-top:200px;
}

.edit-button {
    margin-right: 10px; /* Ajustez la valeur selon vos besoins */
}


th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

</style>
</head>
<body>


<?php
include '../Etudiant/config.php';

$req = 'SELECT * FROM `prof`';
$stmt = $connection->query($req);

if (!$stmt) {
    echo "erreur";
} else {
    ?>

                                    

<br/>

<a class="btn btn-primary" href="AddP.php" ><i class="fa-solid fa-file-plus-minus"></i>Ajouter</a>
<a class="btn btn-primary" href="../index.html"><i class="fa-solid fa-file-plus-minus"></i>Retour</a>
<br/><br/>
<table class="table-bordered"   id="tab2">
    <thead >
    <tr>
        <th class="text-center">Matricule Prof</th>
            <th class="text-center">Nom</th>
            <th class="text-center">Prénom</th>
            <th class="text-center">CIN ou Passeport</th>
            <th class="text-center">Identifiant CNRPS</th>
            <th class="text-center">Date de naissance</th>
            <th class="text-center">Nationalité</th>
            <th class="text-center">Sexe (M/F)</th>
            <th class="text-center">Date Ent Adm</th>
            <th class="text-center">Date Ent Etbs</th>
            <th class="text-center">Diplôme</th>
            <th class="text-center">Adresse</th>
            <th class="text-center" >Ville</th>
            <th class="text-center">Code postal</th>
            <th class="text-center">N° Téléphone</th>
            <th class="text-center">Grade</th>
            <th class="text-center">Date de nomination dans le grade</th>
            <th class="text-center">Date de titularisation</th>
            <th class="text-center">N° Poste</th>
            <th class="text-center">Département</th>
            <th class="text-center">Situation</th>
            <th class="text-center">Spécialité</th>
            <th class="text-center">N° de Compte</th>
            <th class="text-center">Banque</th>
            <th class="text-center">Agence</th>
            <th class="text-center">Adr pendant les vacances</th>
            <th class="text-center">Tél pendant les vacances</th>
            <th class="text-center">Lieu de naissance</th>
            <th class="text-center">Début du Contrat</th>
            <th class="text-center">Fin du Contrat</th>
            <th class="text-center">Type de Contrat</th>
            <th class="text-center">NB contrat ISETSOUSSE</th>
            <th class="text-center">NB contrat Autre Etb</th>
            <th class="text-center">Bureau</th>
            <th class="text-center">Email</th>
            <th class="text-center">Email Interne</th>
            <th class="text-center">NomArabe</th>
            <th class="text-center">PrenomArabe</th>
            <th class="text-center">LieuNaisArabe</th>
            <th class="text-center">AdresseArabe</th>
            <th class="text-center">VilleArabe</th>
            <th class="text-center">Disponible</th>
            <th class="text-center">SousSP</th>
            <th class="text-center">EtbOrigine</th>
            <th class="text-center">TypeEnsg</th>
            <th class="text-center">ControlAcces</th>
            <th class="text-center">Actions</th>
              
</tr>
</thead>
<tbody>
<?php while ($ligne = $stmt->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $ligne['MatProf']?></td>
            <td><?php echo $ligne['Nom']?></td>
            <td><?php echo $ligne['Prénom'] ?></td>
            <td><?php echo $ligne['CIN_ou_Passeport']?></td>
            <td><?php echo $ligne['Identifiant_CNRPS']?></td>
            <td><?php echo $ligne['Date_de_naissance'] ?></td>
            <td><?php echo $ligne['Nationalité'] ?></td>
            <td><?php echo $ligne['Sexe'] ?></td>
            <td><?php echo $ligne['Date_Ent_Adm']?></td>
            <td><?php echo $ligne['Date_Ent_Etbs'] ?></td>
            <td><?php echo $ligne['Diplôme'] ?></td>
            <td><?php echo $ligne['Adresse']?></td>
            <td><?php echo $ligne['Ville']?></td>
            <td><?php echo $ligne['Code_postal'] ?></td>
            <td><?php echo $ligne['N_Téléphone']?></td>
            <td><?php echo $ligne['Grade'] ?></td>
            <td><?php echo $ligne['Date_de_nomination_dans_le_grade'] ?></td>
            <td><?php echo $ligne['Date_de_titularisation']?></td>
            <td><?php echo $ligne['N_Poste'] ?></td>
            <td><?php echo $ligne['Département']?></td>
            <td><?php echo $ligne['Situation']?></td>
            <td><?php echo $ligne['Spécialité'] ?></td>
            <td><?php echo $ligne['N_de_Compte'] ?></td>
            <td><?php echo $ligne['Banque'] ?></td>
            <td><?php echo $ligne['Agence'] ?></td>
            <td><?php echo $ligne['Adr_pendant_les_vacances']?></td>
            <td><?php echo $ligne['Tél_pendant_les_vacances'] ?></td>
            <td><?php echo $ligne['Lieu_de_naissance']?></td>
            <td><?php echo $ligne['Début_du_Contrat']?></td>
            <td><?php echo $ligne['Fin_du_Contrat']?></td>
            <td><?php echo $ligne['Type_de_Contrat']?></td>
            <td><?php echo $ligne['NB_contrat_ISETSOUSSE']?></td>
            <td><?php echo $ligne['NB_contrat_Autre_Etb']?></td>
            <td><?php echo $ligne['Bureau']?></td>
            <td><?php echo $ligne['Email']?></td>
            <td><?php echo $ligne['Email_Interne']?></td>
            <td><?php echo $ligne['NomArabe']?></td>
            <td><?php echo $ligne['PrenomArabe']?></td>
            <td><?php echo $ligne['LieuNaisArabe']?></td>
            <td><?php echo $ligne['AdresseArabe']?></td>
            <td><?php echo $ligne['VilleArabe']?></td>
            <td><?php echo $ligne['Disponible']?></td>
            <td><?php echo $ligne['SousSP']?></td>
            <td><?php echo $ligne['EtbOrigine']?></td>
            <td><?php echo $ligne['TypeEnsg']?></td>
            <td><?php echo $ligne['ControlAcces']?></td>
           
            <td><a class="btn btn-success" href='EditP.php?MatProf=<?php echo $ligne['MatProf']; ?>'>Modifier</a> 
        <a class="btn btn-danger"  href='DeleteP.php?MatProf=<?php echo $ligne['MatProf'];?>'>suprimer</a>
    </td>
<?php } ?>



</td>
    




</tr>





<?php }?>
   </tbody>
</table>




    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    


    <script>
$(document).ready(function () {
    $('#tab2').DataTable({
        dom: 'Bfrtip',
        fixedHeader: true,
        autoFill: true,
        autoWidth: true,
        stateSave: true,
        scrollX:true,
        "lengthMenu": [[10,25,50,100,-1], [10,25,50,100,"All"]],
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        },
    });
});      </script>
<script>
           
           </script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/staterestore/1.1.0/js/dataTables.stateRestore.min.js"></script>


        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/staterestore/1.1.0/css/stateRestore.dataTables.min.css">
              
</body>
</html>
