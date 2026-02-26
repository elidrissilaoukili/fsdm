<?php
include('./templates/header.php');
$code = $first_name = $last_name = $note = "";
$errors = array('code' => '', 'first_name' => '', 'last_name' => '', 'note' => '');
if (isset($_POST['submit'])) {

    # code 
    $code = test_inputs($_POST['code']);
    if (!is_numeric($code)) {
        $errors['code'] = 'Code must be a number';
    } else {
        if (empty($code)) {
            $errors['code'] = 'You left the field empty';
        } else {
            if (strlen($code) < 5 || strlen($code) > 5) {
                $errors['code'] = 'Must contain 5 numbers';
            }
        }
    }


    # first name
    $first_name = test_inputs($_POST['first_name']);
    if (empty($first_name)) {
        $errors['first_name'] = 'You left the field empty';
    } else {
        if (!preg_match('/^[a-zA-Z\s]+$/', $first_name)) {
            $errors['first_name'] = 'first name must be a string';
        }
    }

    # last name
    $last_name = test_inputs($_POST['last_name']);
    if (empty($last_name)) {
        $errors['last_name'] = 'You left the field empty';
    } else {
        if (!preg_match('/^[a-zA-Z\s]+$/', $last_name)) {
            $errors['last_name'] = 'last name must be a string';
        }
    }

    # Note
    $note = test_inputs($_POST['note']);
    if (empty($note)) {
        $errors['note'] = 'You left the field empty';
    } else {
        if (!is_numeric($note)) {
            $errors['note'] = 'Note must be a number';
        } else {
            if ($note < 0 || $note > 20) {
                $errors['note'] = 'Note must be between [0-20]';
            }
        }
    }
}

function test_inputs($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<section>
    <h1>Ajouter un étudiant</h1>

    <div class="a-c">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method='POST' id="dataForm">
            <label for="">Entre le code:</label>
            <input type="text" name="code" id="code" value="<?php echo $code; ?>" />
            <p class="text-danger"><?php echo $errors['code']; ?></p>

            <label for="">Entre le nom:</label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" />
            <p class="text-danger"><?php echo $errors['first_name']; ?></p>

            <label for="">Entre le prenome:</label>
            <input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" />
            <p class="text-danger"><?php echo $errors['last_name']; ?></p>

            <label for="">Entre le Note:</label>
            <input type="text" name="note" id="note" value="<?php echo $note; ?>" />
            <p class="text-danger"><?php echo $errors['note']; ?></p>

            <div class="flex-selectors">
                <div>
                    <label for="">Entre le Filiere:</label>
                    <select name="" id="" class="filiere">
                        <option>SMI</option>
                        <option>SMA</option>
                        <option>Science Physique</option>
                        <option>Science chimique</option>
                    </select>
                </div>
            </div>

            <div class="btns">
                <input type="submit" name="submit" id="submit" value="add" />
                <input type="submit" name="cancel" value="Cancel" onclick="cancel()" />
            </div>
        </form>
    </div>
</section>
<?php include('./templates/footer.php'); ?>