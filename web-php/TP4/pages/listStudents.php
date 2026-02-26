<?php
require_once '../configs/init.php';
include('./templates/header.php');
?>

<section>

    <h1>List des étudiant de la filiere: <?php echo getF($f); ?></h1>

    <div class="flex-center">
        <form action="./listStudents.php" method="POST" class="flex-list-h">
            <select class="list-select" name='filiere'>
                <option value="">All students</option>
                <option value="SMI">SMI</option>
                <option value="SMA">SMA</option>
                <option value="SMP">SMP</option>
                <option value="SMC">SMC</option>
            </select>
            <select class="list-select" name='pf'>
                <option value="">All students</option>
                <option value="failed">Failed</option>
                <option value="passed">Passed</option>
            </select>
            <input type="submit" name="submit" value="Search" class="searchBTN">
        </form>
    </div>

    <div class="info">
        <p>Nombre des étudiants réussis: <span><?php echo count($std); ?></span> </p>
        <p>Melleure note: <span><?php echo getMax($std); ?></span> </p>
        <p>First student: <span><?php echo getNameMax($std); ?></span> </p>
    </div>

    <div class="table" id="table">
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>filiere</th>
                    <th>Note</th>
                    <th>Mention</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($std as $student) {
                    echo '<tr>';

                    echo "<td> <a href='detailStudents.php?
                    code={$student['code']}&
                    fname={$student['fname']}&
                    lname={$student['lname']}&
                    major={$student['major']}&
                    note={$student['note']}'
                    >{$student['code']}</a> </td>";
                    echo "<td> {$student['fname']} </td>";
                    echo "<td> {$student['lname']} </td>";
                    echo "<td> {$student['major']} </td>";
                    echo "<td> {$student['note']} </td>";
                    echo "<td>" . getMention($student['note']) . "</td>";
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

<?php include('./templates/footer.php'); ?>