<?php
// Include the database connection file
require 'models/model.php';

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

include 'views/templates/header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <div class="welcome">
        <h2>Login page</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <input type="submit" value="Login">
            <a href="./register.php">Register</a>
        </form>
    </div>
</body>
</html>
<?php include 'views/templates/footer.php'; ?>