<?php

class Model {
    protected $table;
    protected $db;

    public function __construct($table) {
        $this->table = $table;
        $config = require __DIR__ . '/../../config/database.php';
        $this->db = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['password']);
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $keys = array_keys($data);
        $fields = implode(',', $keys);
        $placeholders = ':' . implode(', :', $keys);
        $stmt = $this->db->prepare("INSERT INTO $this->table ($fields) VALUES ($placeholders)");
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "$key = :$key, ";
        }
        $fields = rtrim($fields, ', ');
        $data['id'] = $id;
        $stmt = $this->db->prepare("UPDATE $this->table SET $fields WHERE id = :id");
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

//-----------------------------------------------------------

// function connect(){
// 	$username = 'root';
// 	$password = '';
// 	$db = 'mysql:host=localhost;dbname=smi2020';

// 	return new PDO($db, $username, $password);
// }


// function find($table, $id)
// {
// 	$sql = "select * from $table where id = ?";
//     $var = connect()->prepare($sql);
//     $var->execute([$id]);

//     return $var->fetchAll();
// }

// function findAll($table)
// {
// 	$sql = "select * from $table";

// 	$var = connect()->prepare($sql);
// 	$var = $var->execute([$table]);
// 	return $var->fetchAll();
// }

// function delete($table, $id)
// {
// 	$sql = "delete from $table where id = ?";
// 	$var = connect()->prepare($sql);
// 	$var->execute([$id]);
// 	return $var->fetch();
// }


// function save($table, $data = [])
// {
// 	$id = $data['id'] ?? null;
// 	unset($data["id"]);

// 	$keys  = array_keys($data);
// 	$values  = array_values($data);

// 	if (isset($id)) {
// 		$values[] = $id;
// 		$sql = "update $table set " . join("=? , ", $keys) . "=? where id = ?;";
// 		$var = connect()->prepare($sql);
// 		$var->execute($values);
// 		return $var->fetch();

// 	} else {
// 		$sql = "insert into $table (". join(",", $keys) .") values(". join(",", array_fill_keys($keys, "?")) .");";
// 		$var = connect()->prepare($sql);
// 		$var->execute($values);
// 		return $var->fetch();
// 	}
// }


// $table = "user"; 
// $id = 6;

// $data = ["id"=> 6, "pw"=>"hafsa", "login"=>"wissal"];

// $result = save($table, $data);