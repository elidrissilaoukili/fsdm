<?php
require_once '../../app/configs/sessions.php';
startSession();
$code = $first_name = $last_name = $note = $pass = "";
$errors = array('code' => '', 'first_name' => '', 'last_name' => '', 'note' => '', 'pass' => '');
if (isset($_POST['submit'])) {

    # pass
    if (empty($_POST['pass'])) {
        $errors['pass'] = 'You left the field empty';
    }

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
    header('location: sentData.php');
}

function test_inputs($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
