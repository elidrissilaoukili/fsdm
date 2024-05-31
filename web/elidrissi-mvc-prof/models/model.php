<?php

function connect()
{
	$db ='mysql:host=localhost;dbname=smi2024';
	$username = 'root';
    $password = '';
	return new PDO($db, $username, $password);
}

function findAll($table)
{
	$sql = "select * from $table";
	$var = connect()->prepare($sql);
    $var->execute();
    return $var->fetchAll(PDO::FETCH_ASSOC);
}

function findOne($table, $id)
{
	$sql = "select * from $table where id=?";
	$var = connect()->prepare($sql);
    $var->execute([$id]);
    return $var->fetch(PDO::FETCH_ASSOC);
}

function delete($table, $id)
{
	$sql = "delete from $table where id=?";
	$var = connect()->prepare($sql);
	$var->execute([$id]);
}

function describe($table)
{
    return connect()->query("describe $table")->fetchAll(PDO::FETCH_COLUMN);
}

function save($table, $element)
{
    $id = $element["id"] ?? NULL;
    unset($element["id"]);

    $champs = array_keys($element);
    $values = array_values($element);

    if (empty($id)) {
        // Insert operation
        $champsInsert = join(", ", $champs);
        $placeholders = join(", ", array_fill(0, count($champs), '?'));
        $sql = "INSERT INTO $table ($champsInsert) VALUES ($placeholders)";
    } else {
        // Update operation
        $champsUpdate = join(" = ?, ", $champs) . " = ?";
        $sql = "UPDATE $table SET $champsUpdate WHERE id = ?";
        $values[] = $id; // Append the id at the end for the WHERE clause
    }

    try {
        $result = connect()->prepare($sql);
        $result->execute($values);
    } catch (Exception $e) {
        // Optionally log the error message: $e->getMessage()
        $result = false;
    }

    return $result;
}
