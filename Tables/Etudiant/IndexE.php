
<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>



    <style>
 table {
  table-layout: fixed;
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

$req = 'SELECT * FROM `etudiant`';
$stmt = $connection->query($req);

if (!$stmt) {
    echo "erreur";
} else {
    ?>

<br/>

<a class="btn btn-primary" href="AddE.php" ><i class="fa-solid fa-file-plus-minus"></i>Ajouter</a>
<a class="btn btn-primary" href="../index.html"><i class="fa-solid fa-file-plus-minus"></i>Retour</a>

<br/><br/>
<table  class="table-bordered" id="tab2">
<thead >
    <tr>
    <th class="text-center">Nom</th>
        <th>DateNais</th>
        <th>NCIN</th>
        <th>NCE</th>
        <th class="text-center">TypBac</th>
       <th class="text-center">Prénom</th>
        <th class="text-center">Sexe</th>
        <th class="text-center">LieuNais</th>
        <th class="text-center" >Adresse</th>
        <th class="text-center">Ville</th>
        <th class="text-center">CodePostal</th>
        <th class="text-center">N°Tél</th>
        <th class="text-center">CodClasse </th >
        <th class="text-center">Décision du Conseil</th>
        <th class="text-center">Année Unversitaire</th>
        <th class="text-center">Semestre</th >
        <th class="text-center">Dispenser</th >
        <th class="text-center">Annees opt</th>
        <th class="text-center">Première Inscp</th>
        <th class="text-center">Gouvernorat</th >
        <th class="text-center">Mention du Bac</th >
        <th class="text-center">Nationalité</th>
        <th class="text-center">Code CNSS</th>
        <th class="text-center">NomArabe</th>
        <th class="text-center">PrenomArabe</th >
        <th class="text-center">LieuNaisArabe</th >
        <th class="text-center">AdresseArabe</th >
        <th class="text-center">VilleArabe</th >
        <th class="text-center">GouvernoratArabe</th>
        <th class="text-center">TypeBacAB</th>
        <th class="text-center">Photo</th>
        <th class="text-center">Origine</th >
        <th class="text-center">SituationDpart</th >
        <th class="text-center">NBAC</th>
        <th class="text-center">Redaut</th>
        <th class="text-center">Action</th>
        </tr>
          

          </thead>
          <tbody>
          <?php while ($ligne = $stmt->fetch_assoc()) { ?>
              <tr>
                <td><?php echo $ligne["Nom"]?></td>
        <td><?php echo $ligne["DateNais"] ?></td>
        <td><?php echo $ligne["NCIN"] ?></td>
        <td><?php echo $ligne["NCE"] ?></td>
        <td><?php echo $ligne["TypBac"] ?></td>
        <td><?php echo $ligne["Prénom"] ?></td>
        <td><?php echo $ligne["Sexe"] ?></td>
        <td><?php echo $ligne["LieuNais"] ?></td>
        <td><?php echo $ligne["Adresse"] ?></td>
        <td><?php echo $ligne["Ville"] ?></td>
        <td><?php echo $ligne["CodePostal"] ?></td>
        <td><?php echo $ligne["N_Tel"] ?></td>
        <td><?php echo $ligne["CodClasse"] ?></td>
        <td><?php echo $ligne["DecisionConseil"] ?></td>
        <td><?php echo $ligne["AnneeUniversitaire"] ?></td>
        <td><?php echo $ligne["Semestre"] ?></td>
        <td><?php echo $ligne["Dispenser"] ?></td>
        <td><?php echo $ligne["AnneesOpt"] ?></td>
        <td><?php echo $ligne["DatePremiereInscp"] ?></td>
        <td><?php echo $ligne["Gouvernorat"] ?></td>
        <td><?php echo $ligne["MentionBac"] ?></td>
        <td><?php echo $ligne["Nationalite"] ?></td>
        <td><?php echo $ligne["CodeCNSS"] ?></td>
        <td><?php echo $ligne["NomArabe"] ?></td>
        <td><?php echo $ligne["PrenomArabe"] ?></td>
        <td><?php echo $ligne["LieuNaisArabe"] ?></td>
        <td><?php echo $ligne["AdresseArabe"] ?></td>
        <td><?php echo $ligne["VilleArabe"] ?></td>
        <td><?php echo $ligne["GouvernoratArabe"] ?></td>
        <td><?php echo $ligne["TypeBacAB"] ?></td>
        <td><img src='./photos/<?php echo $ligne["Photo"] ?>' alt='Photo' width='200' height='180'></td>



        <td><?php echo $ligne["Origine"] ?></td>
        <td><?php echo $ligne["SituationDpart"] ?></td>
        <td><?php echo $ligne["NBAC"] ?></td>
        <td><?php echo $ligne["Redaut"] ?></td>
        <td> <a class="btn btn-success" href='EditE.php?NCIN=<?php echo  $ligne['NCIN'];?>'>Modifier</a>&nbsp
                <a class="btn btn-danger" href='DeleteE.php?NCIN=<?php  echo $ligne['NCIN'];?>'>Supprimer</a>

                </td>
            </tr>
   
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
        