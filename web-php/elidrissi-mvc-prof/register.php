<?php
// Include the database connection file
require 'models/model.php';

$success = null;
$success = register();

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