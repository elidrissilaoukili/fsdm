<?php
function saveAction()
{
    $filieres = getAll('filiere');
    $errors = errors();
    $table = $_GET['table'] ?? null;
    $id = $_GET['id'] ?? null;

    /* code verification */
    if (isset($_POST['code'])) {
        $code = $_POST['code'];
        if (strlen($code) === 5 && preg_match('/^\d{5}$/', $code)) {
            if (uniqueness($table, $code) > 0) {
                $errors['code'] = "Code must be unique!";
            } else {
                $code = $_POST['code'];
            }
        } else {
            if (empty($code)) {
                $errors['code'] =  "is a required field";
            } else {
                $errors['code'] =  "Should be 5 numbers!";
            }
        }
    }

    /* prenom verification */
    if (isset($_POST['prenom'])) {
        $prenom = $_POST['prenom'];
        if (preg_match('/^[a-zA-Z\s]+$/', $prenom)) {
            $prenom = $_POST['prenom'];
        } else {
            if (empty($prenom)) {
                $errors['prenom'] =  "is a required field";
            } else {
                $errors['prenom'] =  "Prenom accept only chars";
            }
        }
    }

    /* nom verification */
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
        if (preg_match('/^[a-zA-Z\s]+$/', $nom)) {
            $nom = $_POST['nom'];
        } else {
            if (empty($nom)) {
                $errors['nom'] = "is a required field";
            } else {
                $errors['nom'] =  "Nom accept only chars";
            }
        }
    }

    /* note verification */
    if (isset($_POST['note'])) {
        $note = $_POST['note'];
        if (is_numeric($note) && $note >= 0 && $note <= 20) {
            $note = $_POST['note'];
        } else {
            if (empty($note)) {
                $errors['note'] =  "is a required field";
            } else {
                $errors['note'] =  "note must be 0-20";
            }
        }
    }

    $filiere = $_POST['filiere'];

    $data = [
        'id' => $id,
        'code' => $code,
        'prenom' => $prenom,
        'nom' => $nom,
        'note' => $note,
        'filiere' => $filiere,
    ];

    if (empty(array_filter($errors))) {
        $code = $prenom = $nom = $note = $filiere = "";
        save($table, $data);
    }
    include './views/nouvelle.php';
}
