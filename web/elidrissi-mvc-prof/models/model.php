<?php

function connect()
{
    $db = 'mysql:host=localhost;dbname=smi2024';
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


function register()
{

    $success = null;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (!empty($username) && !empty($password)) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and execute the query
            $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $stmt = connect()->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "Registration successful!";
            } else {
                return "Error: Could not execute the query.";
            }
        } else {
            return "Please fill in all fields.";
        }
    }
}

function login()
{
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (!empty($username) && !empty($password)) {
            // Prepare and execute the query
            $query = "SELECT id, username, password FROM users WHERE username = :username";
            $stmt = connect()->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    // Password is correct, start a new session
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    header("Location: index.php");
                    exit;
                } else {
                    echo "The password you entered was not valid.";
                }
            } else {
                echo "No account found with that username.";
            }
        } else {
            echo "Please fill in all fields.";
        }
    }
}
