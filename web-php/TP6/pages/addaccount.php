<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}
				
include('./templates/header.php');


$prenom = $nom = $filiere = $codeE = $note = "";
$errors = array('prenom' => '', 'nom' => '', 'filiere' => '', 'codeE' => '', 'note' => '');
if (isset($_POST['submit'])) {

     // check name -1
     if (empty($_POST['prenom'])) {
          $errors['prenom'] = "First Name is required!";
     } else {
          $prenom = $_POST['prenom'];
     }

     if (empty($_POST['nom'])) {
          $errors['nom'] = "Last Name is required!";
     } else {
          $nom = $_POST['nom'];
     }

     
     if (empty($_POST['filiere'])) {
        $errors['filiere'] = "Filiere is required!";
    } else {
            $filiere = $_POST['filiere'];
    }

     // check email -2
     if (empty($_POST['codeE'])) {
          $errors['codeE'] = "Code is required!";
     } else {
          $codeE = $_POST['codeE'];
     }

     // check phone -3
     if (empty($_POST['note'])) {
          $errors['note'] = "Number password is required!";
     } else {
          $note = $_POST['note'];
     }


     // insert information to data base
     if (array_filter($errors)) {
          //
     } else {
          try {  
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "INSERT INTO etudiant(codeE, nom, prenom, filiere, note) 
                    VALUES ('$codeE', '$nom', '$prenom', '$filiere',  '$note')" ;

               $conn->exec($sql);

          } catch (PDOException $e) {
               echo "Connection error <br>" . $e->getMessage();
          }

          header('location: listStudents.php');
     }
     $conn = null;
}
?>
<section>
    <h1>Ajouter un étudiant</h1>

    <div class="a-c">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST' id="dataForm">

            <div class="block-1">
                <label for="">Entre le nom:</label>
                <input type="text" name="prenom" id="first_name" value="<?php echo $prenom; ?>" />
                <p class="text-danger"><?php echo $errors['prenom'] ?></p>

                <label for="">Entre le prenome:</label>
                <input type="text" name="nom" id="last_name"  value="<?php echo $nom; ?>" />
                <p class="text-danger"><?php echo $errors['nom'] ?></p>

                <label for="">Entre le code:</label>
                <input type="text" name="codeE" id="codeE"  value="<?php echo $codeE; ?>" />
                <p class="text-danger"><?php echo $errors['codeE'] ?></p>

                <label for="">Entre le Note:</label>
                <input type="text" name="note" id="note"  value="<?php echo $note; ?>" />
                <p class="text-danger"><?php echo $errors['note'] ?></p>
            </div>

            <div class="flex-selectors">
                <div>
                    <label for="">Entre le Filiere:</label>
                    <select name="filiere" id="" class="filiere">
                        <option value="SMI">Science Math    Informatique</option>
                        <option value="SMA">Science Math Application</option>
                        <option value="SMP">Science Matiere Physique</option>
                        <option value="SMC">Science Matiere chimique</option>
                    </select>
                </div>
            </div>

            <div class="btns">
                <input type="submit" name="submit" value="Add" />
                <input type="submit" name="cancel" value="Cancel" onclick="cancel()" />
            </div>
        </form>
    </div>

</section>
<?php include('./templates/footer.php'); ?>