<?php

class Controller {
    protected $model;

    public function __construct($module) {
        $this->model = new Model($module);
    }

    public function index() {
        $data = $this->model->getAll();
        require __DIR__ . '/../views/index.php';
    }

    public function show($id) {
        $data = $this->model->getById($id);
        require __DIR__ . '/../views/show.php';
    }

    public function create($data) {
        $this->model->create($data);
        header('Location: /' . $this->model->table);
    }

    public function edit($id, $data) {
        $this->model->update($id, $data);
        header('Location: /' . $this->model->table);
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: /' . $this->model->table);
    }
}
?>
