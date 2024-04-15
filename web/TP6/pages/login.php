<?php
include("./templates/header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <main style="display: flex;justify-content:center">
        <section>
            <h2>Authentification</h2>
            <div class="line"></div>
            <form action="verify.php" method="post" class="formu">
                <div class="divform">
                    <label for="log">Username: </label>
                    <input type="text" id="log" name="login" placeholder="elidrissi" class="form-control m-2">
                </div>
                <div class="divform">
                    <label for="pas">password: </label>
                    <input type="password" id="pas" name="pass" placeholder="laoukili" class="form-control m-2">
                </div>

                <input type="submit" name="ok" value="valider" class="btn btn-primary">
            </form>
        </section>
    </main>
</body>

</html>


<?php
include("./templates/footer.php");
?>