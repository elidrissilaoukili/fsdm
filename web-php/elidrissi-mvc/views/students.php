<?php include 'header-footer-side/header.php';
include './configs/init.php'; ?>

<body>
    <section class="break-to-two">
        <div class="break-to-two">
            <div class="side">
                <?php include 'header-footer-side/side.php'; ?>
            </div>

            <div class="main-content">
                <h1>Students</h1>
                <h4>List of students
                    <div>
                        <a href="index.php?action=nouvelle">
                            <button type="button" class="btn btn-success">nouvelle</button>
                        </a>
                    </div>
                </h4>
                <table id="table">
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
                                <td><a href="index.php?action=details&id=<?= $student->id ?>&table=etudiant"><?= $student->id ?></a></td>
                                <td><a href="index.php?action=details&code=<?= $student->code ?>&table=etudiant"><?= $student->code ?></a></td>
                                <td><?= $student->prenom ?></td>
                                <td><?= $student->nom ?></td>
                                <td><?= $student->note ?></td>
                                <td><?= $student->filiere ?></td>
                                <td style="display: flex;">
                                    <form action="index.php?action=modifie&id=<?= $student->id; ?>&table=etudiant" method="post">
                                        <input type="submit" value="Edit" class="btn btn-primary m-1">
                                    </form>
                                    <form action="index.php?action=delete&id=<?= $student->id; ?>&table=etudiant" method="post">
                                        <input type="submit" value="Delete" class="btn btn-danger m-1">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
</body>

</html>

<?php include 'header-footer-side/footer.php'; ?>