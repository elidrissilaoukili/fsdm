<?php
include('./templates/header.php');
<<<<<<< HEAD
require_once '../configs/init.php';
=======
>>>>>>> 8321304aacd3f7516274024281e46d8ada77599e

?>
<section>
    <h1>Ajouter un étudiant</h1>

    <div class="a-c">
        <form action="sentData.php" method='POST' id="dataForm">

            <div class="block-1">

                <label for="">Entre le nom:</label>
<<<<<<< HEAD
                <input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" />
                <p class="text-danger"><?php echo $errors['first_name']; ?></p>

                <label for="">Entre le prenome:</label>
                <input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" />
                <p class="text-danger"><?php echo $errors['last_name']; ?></p>

                <label for="">Entre le code:</label>
                <input type="text" name="code" id="code" value="<?php echo $code; ?>" />
                <p class="text-danger"><?php echo $errors['code']; ?></p>

                <label for="">Entre le Note:</label>
                <input type="text" name="note" id="note" value="<?php echo $note; ?>" />
                <p class="text-danger"><?php echo $errors['note']; ?></p>

                <label for="">Affecter un mot de pass:</label>
                <input type="text" name="pass" id="pass" value="<?php echo $pass; ?>" />
                <p class="text-danger"><?php echo $errors['pass']; ?></p>
=======
                <input type="text" name="first_name" id="first_name" />

                <label for="">Entre le prenome:</label>
                <input type="text" name="last_name" id="last_name" />

                <label for="">Entre le code:</label>
                <input type="text" name="code" id="code" />

                <label for="">Entre le Note:</label>
                <input type="text" name="note" id="note" />

                <label for="">Affecter un mot de pass:</label>
                <input type="text" name="pass" id="pass" />
>>>>>>> 8321304aacd3f7516274024281e46d8ada77599e
            </div>

            <div class="block-2"> <label for="">Gender:</label>
                <input type="radio" name="gender" value="Male" /> Male:
                <input type="radio" name="gender" value="Female" /> Female:
            </div>

<<<<<<< HEAD

            <div class="block-3">
                <h4>Semester validés:</h4>
                <input type="checkbox" name="semester" value="semester1" /> Semester 1
                <br>
                <input type="checkbox" name="semester" value="semester2" /> Semester 2
                <br>
                <input type="checkbox" name="semester" value="semester3" /> Semester 3
                <br>
                <input type="checkbox" name="semester" value="semester4" /> Semester 4
                <br>
                <input type="checkbox" name="semester" value="semester5" /> Semester 5
                <br>
                <input type="checkbox" name="semester" value="semester6" /> Semester 6
                <br>
=======
            <div class="block-3">
                <h4>Semester validés:</h4>
                <input type="checkbox" name="semester[]" value="semester1" /> Semester 1 <br>
                <input type="checkbox" name="semester[]" value="semester2" /> Semester 2 <br>
                <input type="checkbox" name="semester[]" value="semester3" /> Semester 3 <br>
                <input type="checkbox" name="semester[]" value="semester4" /> Semester 4 <br>
                <input type="checkbox" name="semester[]" value="semester5" /> Semester 5 <br>
                <input type="checkbox" name="semester[]" value="semester6" /> Semester 6 <br>
>>>>>>> 8321304aacd3f7516274024281e46d8ada77599e
            </div>


            <div class="flex-selectors">
                <div>
                    <label for="">Entre le Filiere:</label>
                    <select name="major" id="" class="filiere">
                        <option value="SMI">Science Math Informatique</option>
                        <option value="SMA">Science Math Application</option>
                        <option value="SMP">Science Matiere Physique</option>
                        <option value="SMC">Science Matiere chimique</option>
                    </select>
                </div>
            </div>

            <div class="block-4">
                <h3>Comment:</h3>
                <textarea type="text" name="comment" rows="7" cols="40"></textarea>
            </div>

            <div class="btns">
<<<<<<< HEAD
                <input type="submit" name="submit" id="submit" value="Send" />
=======
                <input type="submit" name="submit" value="Send" />
>>>>>>> 8321304aacd3f7516274024281e46d8ada77599e
                <input type="submit" name="cancel" value="Cancel" onclick="cancel()" />
            </div>
        </form>
    </div>

<<<<<<< HEAD


    <?php echo $first_name; ?>
=======
>>>>>>> 8321304aacd3f7516274024281e46d8ada77599e
</section>
<?php include('./templates/footer.php'); ?>