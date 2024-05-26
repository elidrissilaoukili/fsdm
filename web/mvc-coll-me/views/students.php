<?php include 'header-footer-side/header.php';
include './configs/init.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?> . /assets/css/style.css">
</head>

<body>
    <section class="break-to-two">
        <div class="break-to-two">
            <div class="side">
                <?php include 'header-footer-side/side.php'; ?>
            </div>

            <div class="main-content">
                <h1>Home</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, excepturi consectetur labore autem culpa maiores ad laudantium repellendus molestiae alias ab illum porro ipsa quasi voluptates optio! Numquam, minus laborum.</p>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>code</th>
                            <th>first name</th>
                            <th>last name</th>
                            <th>note</th>
                            <th>sector</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <?php foreach ($data as $student) : ?>
                        <tbody>
                            <tr>
                                <td><?= $student->id ?></td>
                                <td><?= $student->code ?></td>
                                <td><?= $student->first_name ?></td>
                                <td><?= $student->last_name ?></td>
                                <td><?= $student->note ?></td>
                                <td><?= $student->sector ?></td>
                                <td>
                                    <input type="submit" value="Edit">
                                    <input type="submit" value="Delete">
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>

    </section>
</body>

</html>




<?php include 'header-footer-side/footer.php'; ?>