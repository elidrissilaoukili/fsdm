<?php
function savemodifieAction()
{
    $id = $_GET['id'] ?? null;
    $table = $_GET['table'] ?? null;
    $data = null;
    $errors = [];
    $filieres = getAll('filiere');

    if ($table === 'etudiant' && $id) {
        $data = getRow($table, $id);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $code = $_POST['code'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $nom = $_POST['nom'] ?? '';
        $note = $_POST['note'] ?? '';
        $filiere = $_POST['filiere'] ?? '';

        // Code verification
        if (empty($code)) {
            $errors['code'] = "Code is a required field";
        } elseif (!preg_match('/^\d{5}$/', $code)) {
            $errors['code'] = "Code should be 5 numbers!";
        } else {
            // Check for code uniqueness only if the code has changed
            $existingData = getRow($table, $id);
            if ($existingData->code !== $code && uniqueness($table, $code) > 0) {
                $errors['code'] = "Code must be unique!";
            }
        }

        // Prenom verification
        if (empty($prenom)) {
            $errors['prenom'] = "Prenom is a required field";
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $prenom)) {
            $errors['prenom'] = "Prenom accepts only letters and spaces";
        }

        // Nom verification
        if (empty($nom)) {
            $errors['nom'] = "Nom is a required field";
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $nom)) {
            $errors['nom'] = "Nom accepts only letters and spaces";
        }

        // Note verification
        if (empty($note)) {
            $errors['note'] = "Note is a required field";
        } elseif (!is_numeric($note) || $note < 0 || $note > 20) {
            $errors['note'] = "Note must be a number between 0 and 20";
        }

        if (empty($errors)) {
            $data = [
                'id' => $id,
                'code' => $code,
                'prenom' => $prenom,
                'nom' => $nom,
                'note' => $note,
                'filiere' => $filiere,
            ];

            save($table, $data);
            header("Location: index.php?action=students"); // redirect after successful save
            exit;
        }
    }

    include './views/modifie.php';
}
