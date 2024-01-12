
<!DOCTYPE html>
<html>
<head>
    <title>Grade</title>



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

$req = "SELECT * FROM matieres";
$stmt = $connection->query($req);

if (!$stmt) {
    echo "erreur";
} else {
    ?>

<br/>

<a class="btn btn-primary" href="AddM.php" ><i class="fa-solid fa-file-plus-minus"></i>Ajouter</a>
<a class="btn btn-primary" href="../index.html"><i class="fa-solid fa-file-plus-minus"></i>Retour</a>

<br/><br/>
<table  class="table-bordered"  id="tab2">
    <thead >
    <tr>
                    <th  class="text-center">Code Matière</th>
                    <th  class="text-center">Nom Matière</th>
                    <th  class="text-center">Coef Matière</th>
                    <th  class="text-center">Département</th>
                    <th  class="text-center">Semestre</th>
                    <th  class="text-center">Option</th>
                    <th  class="text-center">Nb Heure CI</th>
                    <th  class="text-center">Nb Heure TP</th>
                    <th  class="text-center">TypeLabo</th>
                    <th  class="text-center">Bonus</th>
                    <th  class="text-center">Catègories</th>
                    <th  class="text-center">SousCatégories</th>
                    <th  class="text-center">DateDeb</th>
                    <th  class="text-center">DateFin</th>
                    <th  class="text-center">Actions</th>
                </tr>

      
</thead>
<tbody>
<?php while ($ligne = $stmt->fetch_assoc()) { ?>
    <tr>
              <td><?php echo $ligne['Code Matière'] ?></td>
                    <td><?php echo $ligne['Nom Matière']?></td>
                    <td><?php echo $ligne['Coef Matière']?></td>
                    <td><?php echo $ligne['Département'] ?></td>
                    <td><?php echo $ligne['Semestre']?></td>
                    <td><?php echo $ligne['Option']?></td>
                    <td><?php echo $ligne['Nb Heure CI']?></td>
                    <td><?php echo $ligne['Nb Heure TP']?></td>
                    <td><?php echo $ligne['TypeLabo']?></td>
                    <td><?php echo $ligne['Bonus'] ?></td>
                    <td><?php echo $ligne['Catègories']?></td>
                    <td><?php echo $ligne['SousCatégories']?></td>
                    <td><?php echo $ligne['DateDeb']?></td>
                    <td><?php echo $ligne['DateFin'] ?></td>
                    <td>
                        <a class="btn btn-success" href='EditM.php?Code_Matiere=<?php echo $ligne['Code Matière']?>'>Modifier</a>&nbsp
                        <a class="btn btn-danger" href='DeleteM.php?Code_Matiere=<?php echo $ligne['Code Matière']?>'>supprimer</a>
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
        