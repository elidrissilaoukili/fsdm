<?php

function connect()
{
    $username = 'root';
    $password = '';
    $db = 'mysql:host=localhost;dbname=smi2020';

    return new PDO($db, $username, $password);
}


function find($table, $id)
{
    $sql = "select * from $table where id = ?";
    $var = connect()->prepare($sql);
    $var->execute([$id]);

    return $var->fetchAll();
}

function findAll($table)
{
    $sql = "select * from $table";

    $var = connect()->prepare($sql);
    $var->execute();
    return $var->fetchAll(PDO::FETCH_OBJ);
}

function delete($table, $id)
{
    $sql = "delete from $table where id = ?";
    $var = connect()->prepare($sql);
    $var->execute([$id]);
    return $var->fetch();
}


function save($table, $data = [])
{
    $id = $data['id'] ?? null;
    unset($data["id"]);

    $keys  = array_keys($data);
    $values  = array_values($data);

    if (isset($id)) {
        $values[] = $id;
        $sql = "update $table set " . join("=? , ", $keys) . "=? where id = ?;";
        $var = connect()->prepare($sql);
        $var->execute($values);
        return $var->fetch();
    } else {
        $sql = "insert into $table (" . join(",", $keys) . ") values(" . join(",", array_fill_keys($keys, "?")) . ");";
        $var = connect()->prepare($sql);
        $var->execute($values);
        return $var->fetch();
    }
}


$table = "user";
$id = 6;

$data = ["id" => 6, "pw" => "hafsa", "login" => "wissal"];

findAll($table);
