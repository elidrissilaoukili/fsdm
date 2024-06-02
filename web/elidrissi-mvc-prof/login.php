<?php
// Include the database connection file
require 'models/model.php';

login();

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