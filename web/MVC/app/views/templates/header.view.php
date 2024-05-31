
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=<?= ROOT . "/assets/css/listStudents.css"; ?> />
    <link rel="stylesheet" href=<?= ROOT . "/assets/css/listStudents.css"; ?> />
    <link rel="stylesheet" href=<?= ROOT . "/assets/css/listFiliere.css"; ?> />
    <link rel="stylesheet" href=<?= ROOT . "/assets/css/style.css"; ?> />
    <link rel="stylesheet" href=<?= ROOT . "/assets/css/add.css"; ?> />
    <link rel="stylesheet" href=<?= ROOT . "/assets/css/bootstrap.min.css"; ?> />
    <script src="script.js"></script>


</head>


<body>

    <header>
        <div class="header-main">
            <img src="<?= ROOT . "/assets/images/f.jpeg"; ?>" alt="" />
            <div class="header-txt">
                <h1>SMI6</h1>
                <h3>Faculte des science Dhar el Mahraz, Fés</h3>
            </div>
        </div>


        <div class="big-line"><?= displayDate("en"); ?></div>


        <div class="connexion-option">
            <?php if (isset($_SESSION["login"])) {
                echo "<h2>Bonjour " . $_SESSION["login"] . "</h2>";
            }
            ?>

            <style>
                .btn-brown {
                    background-color: brown;
                    color: white;
                    padding: 0.2rem 0.4rem;
                }
            </style>
            <div class="mt-2">
                <a href="<?= ROOT?>/addstd" class="btn btn-brown">Add Student</a>
                <!-- <a href="<?= ROOT?>/login" class="btn btn-brown">Log in</a> -->
                <!-- <a href="<?= ROOT?>/logout" class="btn btn-brown">Log out</a> -->
                <!-- <a href="<?= ROOT?>/options" class="btn btn-brown">Options</a> -->
            </div>
        </div>
    </header>