<?php
require_once '../../app/configs/sessions.php';
startSession();
require_once '../../app/configs/init.php';
require_once "../../app/models/addaccountModel.php";

class FormHandler {
    private $formData = [];

    public function __construct() {
        $this->formData['first_name'] = $this->getPostData('first_name', 'no data');
        $this->formData['last_name'] = $this->getPostData('last_name', 'no data');
        $this->formData['code'] = $this->getPostData('code', 'no data');
        $this->formData['note'] = $this->getPostData('note', '');
        $this->formData['pass'] = $this->getPostData('pass', 'unspecified');
        $this->formData['gender'] = $this->getPostData('gender', 'unspecified');
        $this->formData['major'] = $this->getPostData('major', '');
        $this->formData['comment'] = $this->getPostData('comment', '');
        $this->formData['semester'] = $this->getPostData('semester', '');
    }

    public function getFormData() {
        return $this->formData;
    }

    public function isSubmitted() {
        return isset($_POST['submit']);
    }

    public function isCancelled() {
        return isset($_POST['cancel']);
    }

    private function getPostData($key, $default) {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }
}


$formHandler = new FormHandler();

if ($formHandler->isSubmitted()) {
    $formData = $formHandler->getFormData();

    // Now you have access to $formData['first_name'], $formData['last_name'], etc.

    // Example usage:
    $studentModel = new EtudiantModel();
    $studentModel->insertData($formData); // Assuming insertData method exists in your model

    // Redirect to some page after submission
    header('Location: somepage.php');
    exit();
}

if ($formHandler->isCancelled()) {
    header('Location: add.php');
    exit();
}