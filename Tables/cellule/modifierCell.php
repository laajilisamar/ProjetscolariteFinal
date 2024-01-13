

<?php
    require "connexion.php";

    try {
        // Fetch sessions
        $sql = "SELECT * FROM session";
        $result = $idcon->query($sql);
        $all_sessions = $result->fetchAll(PDO::FETCH_ASSOC);

    // Fetch professors
$sql = "SELECT `MatProf` FROM prof";
$result = $idcon->query($sql);
$all_profs = $result->fetchAll(PDO::FETCH_ASSOC);

    
        $sql = "SELECT `Code Matière` FROM matieres";
        $result = $idcon->query($sql);
        $all_NumMats = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching data: " . $e->getMessage();
    }
    
?>

<!DOCTYPE html>
<html>
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
        }
        form {
            text-align: left;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        button[type="submit"] {
            background-color: #008080;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }
        button[type="reset"] {
            background-color: #ccc;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }
        fieldset {
            border: 1px solid #ccc;
            border-radius: 3px;
            padding: 10px;
            margin-top: 20px;
        }
        p {
            font-weight: bold;
            margin-bottom: 10px;
        }
        a {
            text-decoration: none; 
            padding: 10px 20px; 
            background-color: #008080; 
            color: #fff; 
            border-radius: 5px; 
            margin: 5px; 
        }
        a:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text">
            <h1 class="">Modifier  Cellule</h1>
        </div><br><br><br>

        <form method="POST" action="">
            <fieldset>
                <legend>Nouveau </legend>

                <label for='NumCell'>NumCell</label>
                <input type="text" name="NumCell"><br><br>

                <label for='NumProf'>Matricule Prof</label>
                <select name="NumProf" required>
                    <?php foreach ($all_profs as $prof): ?>
                        <option value="<?php echo $prof["MatProf"]; ?>">
                            <?php echo $prof["MatProf"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select><br><br>

                <label for='NumMat'>Code Matière</label>
                <select name="NumMat" required>
                    <?php foreach ($all_NumMats as $NumMat): ?>
                        <option value="<?php echo $NumMat["Code Matière"]; ?>">
                            <?php echo $NumMat["Code Matière"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select><br><br>

                <label for='session'>Session</label>
                <select name="session" required>
                    <?php foreach ($all_sessions as $session): ?>
                        <option value="<?php echo $session["Sem"]; ?>">
                            <?php echo $session["Sem"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select><br><br>

                <button type="reset" onclick="resetForm()">Annuler</button>
                <button type="submit" name='Enregistrer'>Enregistrer</button>
                <a href="afficherCell.php">Home</a>
            </fieldset>
        </form>

        <script>
            function resetForm() {
                document.querySelector('form').reset();
            }
        </script>
    </div>
</body>
</html>

<?php
    if(isset($_POST['Enregistrer']))
    {
        $nc=$_POST["NumCell"];
        $np=$_POST["NumProf"];
        $nm=$_POST["NumMat"];
        $session = $_POST["session"];
        $req = "UPDATE cellules SET NumProf='$np', NumMat='$nm', NumSession='$session' WHERE NumCell='$nc'";
     
        $idcon->exec($req);
        echo '<script>alert("Une cellule est modifiée.");</script>';
    }
?>
