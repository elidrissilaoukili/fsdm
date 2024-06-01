<?php
// Include the database connection file
require 'models/model.php';

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
            $success = "Registration successful!";
        } else {
            echo "Error: Could not execute the query.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}

include 'views/templates/header.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <div class="welcome">
        <h2>Register page</h2>
        <div class="welcome">
            <p class="success"><?= $success ?></p>
        </div>
        <form action="register.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <input type="submit" value="Register">
            <a href="./login.php">Login</a>
        </form>
    </div>
</body>
</html>
<?php include 'views/templates/footer.php'; ?>
