<?php include 'templates/header.view.php';?>
<section>
    <h1>Ajouter un étudiant</h1>

    <div class="a-c">
        <form method='POST' id="dataForm">

            <div class="alert alert-danger" style="text-align: center;">
                <?php if(!empty($errors)): ?>
                    <p><?= implode('<br>', $errors) ?></p>
                <?php endif; ?>
            </div>


            <div class="block-1">
                <label for="">Entre le first name:</label>
                <input type="text" name="first_name" id="first_name" value="<?= '' ?>" />

                <label for="">Entre le last name:</label>
                <input type="text" name="last_name" id="last_name"  value="<?= '' ?>" />

                <label for="">Entre le code:</label>
                <input type="text" name="code" id="code"  value="<?= '' ?>" />

                <label for="">Entre le Note:</label>
                <input type="text" name="note" id="note"  value="<?= '' ?>" />

                <label for="">Entre le mention:</label>
                <input type="text" name="mention" id="mention"  value="<?= '' ?>" />

                <label for="">Entre le email:</label>
                <input type="text" name="email" id="email"  value="<?= '' ?>" />

                <label for="">Entre le password:</label>
                <input type="text" name="password" id="password"  value="<?= '' ?>" />
            </div>

            <div class="flex-selectors">
                <div>
                    <label for="">Entre le Filiere:</label>
                    <select name="sector" id="" class="filiere">
                        <option value="SMI">Science Math Informatique</option>
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
<?php include 'templates/footer.view.php';?>