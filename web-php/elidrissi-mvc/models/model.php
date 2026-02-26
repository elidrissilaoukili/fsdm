<?php

function connect()
{
    $username = 'root';
    $password = '';
    $db = 'mysql:host=localhost;dbname=smi2024';

    return new PDO($db, $username, $password);
}

function getRow($table, $id)
{
    $sql = "select * from $table where id = ?";
    $var = connect()->prepare($sql);
    $var->execute([$id]);
    return $var->fetch(PDO::FETCH_OBJ);
}

function getRowByCode($table, $code)
{
    $sql = "select * from $table where code = ?";
    $var = connect()->prepare($sql);
    $var->execute([$code]);
    return $var->fetch(PDO::FETCH_OBJ);
}

function getAll($table)
{
    $sql = "select * from $table";
    $var = connect()->prepare($sql);
    $var->execute();
    return $var->fetchAll(PDO::FETCH_OBJ);
}


// treat unique code case
function uniqueness($table, $code)
{
    $sql = "SELECT COUNT(*) FROM $table WHERE code = :code";
    $var = connect()->prepare($sql);
    $var->execute(['code' => $code]);
    return $var->fetchColumn();
}

//---------{ sector look }--------------
function findByFiliere($filiere)
{
    $sql = "select * from students where filiere = ?";
    $var = connect()->prepare($sql);
    $var->execute([$filiere]);
    return $var->fetchAll(PDO::FETCH_OBJ);
}

// function getNumberByFiliere($tabmle)

//--------------------------------------------------
// extra
//--------------------------------------------------
function getNumber($table)
{
    $sql = "select count(*) from $table";
    $var = connect()->prepare($sql);
    $var->execute();
    return $var->fetchAll(PDO::FETCH_OBJ);
}
function getMaxNote($table)
{
    $sql = "select max(note) from $table";
    $var = connect()->prepare($sql);
    $var->execute();
    return $var->fetchColumn(PDO::FETCH_OBJ);
}



//--------------------------------------------------
// student
//--------------------------------------------------
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
        // return $var->fetch();
    } else {
        $sql = "insert into $table (" . join(",", $keys) . ") values(" . join(",", array_fill_keys($keys, "?")) . ");";
        $var = connect()->prepare($sql);
        // return $var->fetch();
    }
    $var->execute($values);
}
