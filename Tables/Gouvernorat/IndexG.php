
<!DOCTYPE html>
<html>
<head>
    <title>Gouvernorat</title>



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
// Sélectionnez tous les gouvernorats depuis la table
$req = 'SELECT * FROM `gouvernorats`';
$stmt = $connection->query($req);

if (!$stmt) {
    echo "erreur";
} else {
    ?>

<br/>

<a class="btn btn-primary" href="AddG.php" ><i class="fa-solid fa-file-plus-minus"></i>Ajouter</a>
<a class="btn btn-primary" href="../index.html"><i class="fa-solid fa-file-plus-minus"></i>Retour</a>

<br/><br/>
<table  class="table-bordered" id="tab2">
    <thead >
    <tr>

 
    <th class="text-center">Gouvernorat</th>
    <th class="text-center">Code Postal</th>
    <th class="text-center">Actions</th>
    </tr>

</thead>
<tbody>
<?php while ($ligne = $stmt->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $ligne['Gouvernorat'] ?></td>
        <td><?php echo $ligne['codpostal'] ?></td>
       <td><a class="btn btn-success" href='EditG.php?Gouvernorat=<?php echo $ligne['Gouvernorat'];?>'>Modifier</a>&nbsp
       <a class="btn btn-danger" href='DeleteG.php?Gouvernorat=<?php echo $ligne['Gouvernorat'] ;?>'>Supprimer</a></td>

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
    