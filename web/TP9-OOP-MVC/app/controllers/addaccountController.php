<?php
require_once '../../app/configs/sessions.php';
require_once "../../app/models/addaccountModel.php";

class FormHandler {
    private $prenom = '';
    private $nom = '';
    private $filiere = '';
    private $codeE = '';
    private $note = '';
    private $errors = [
        'prenom' => '', 
        'nom' => '', 
        'filiere' => '', 
        'codeE' => '', 
        'note' => ''
    ];
    private $etudiantModel;

    public function __construct() {
        startSession();
        $this->etudiantModel = new EtudiantModel();
    }

    public function handleFormSubmission() {
        if (isset($_POST['submit'])) {
            $this->validateForm();

            if (!array_filter($this->errors)) {
                $this->insertData();
                header('location: listStudents.php');
                exit();
            }
        }
    }

    private function validateForm() {
        $this->prenom = $this->sanitizeInput($_POST['prenom'] ?? '');
        $this->nom = $this->sanitizeInput($_POST['nom'] ?? '');
        $this->filiere = $this->sanitizeInput($_POST['filiere'] ?? '');
        $this->codeE = $this->sanitizeInput($_POST['codeE'] ?? '');
        $this->note = $this->sanitizeInput($_POST['note'] ?? '');

        if (empty($this->prenom)) {
            $this->errors['prenom'] = "First Name is required!";
        }

        if (empty($this->nom)) {
            $this->errors['nom'] = "Last Name is required!";
        }

        if (empty($this->filiere)) {
            $this->errors['filiere'] = "Filiere is required!";
        }

        if (empty($this->codeE)) {
            $this->errors['codeE'] = "Code is required!";
        }

        if (empty($this->note)) {
            $this->errors['note'] = "Note is required!";
        }
    }

    private function sanitizeInput($data) {
        return htmlspecialchars(trim($data));
    }

    private function insertData() {
        $studentData = [
            'codeE' => $this->codeE,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'filiere' => $this->filiere,
            'note' => $this->note
        ];
        $this->etudiantModel->insertData($studentData);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getFieldValue($field) {
        return htmlspecialchars($this->{$field});
    }
}

$studentModel = new EtudiantModel();
$conn = $studentModel->connect_db(); // Get the connection
$student = $studentModel->getE($conn); // Pass the connection as an argument
$studentModel->deleteE($conn); // Pass the connection as an argument

$conn = null; // Close the connection

$student = new EtudiantModel();

if (isset($_POST['save'])) {

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $filiere = $_POST['filiere'];
    $codeE = $_POST['codeE'];
    $note = $_POST['note'];

    $E = array('prenom' => $prenom, 'nom' => $nom, 'filiere' => $filiere, 'codeE' => $codeE, 'note' => $note);

    $student->editE($E);


    header('location: listStudents.php');
}
?>
