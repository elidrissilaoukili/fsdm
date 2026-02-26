<?php include('./templates/header.php');

define('MOY_REUSSITE', 10);

$students = array(
    ["moujtahid", "moujid", "SMI", 14, "tres Bien"],
    ["kaslani", "kassoul", "SMA", 9, "ajourne !"],
    ["saad", "hamdouch", "SMI", 18, "tres bien"],
    ["mohammed", "elidrissi", "SMI", 11, "tres bien"],
    ["ahmed", "3iyaan", "SMP", 3, "ajourne !"],
    ["ahmed", "3iyaan", "SMP", 12, "ajourne !"],
    ["ahmed", "3iyaan", "SMP", 19, "ajourne !"],
    ["bnadem", "insan", "SMC", 14, "bien"],
    ["imane", "bnita", "SMA", 12, "bien"]
);

function getListeParFiliere($filiere)
{
    $std_s = [];
    $i = 0;
    $students = $GLOBALS['students'];
    foreach ($students as $std) {
        if ($std[2] == $filiere && $std[3] >= MOY_REUSSITE) {
            $std_s[$i] = $std;
            $i++;
        }
    }
    return $std_s;
}

if (isset($_POST['SMI'])) {
    $std = getListeParFiliere('SMI');
}
if (isset($_POST['SMA'])) {
    $std = getListeParFiliere('SMA');
}
if (isset($_POST['SMP'])) {
    $std = getListeParFiliere('SMP');
}
if (isset($_POST['SMC'])) {
    $std = getListeParFiliere('SMC');
}
if (isset($_POST['all'])) {
    $std = $students;
}


function getMax($students)
{
    $max_note = 0;
    $i = 0;
    $notes = [];
    foreach ($students as $student) {
        $notes[$i] = $student[3];
        $i++;
    }
    for ($i = 0; $i < count($notes); $i++) {
        if ($max_note < $notes[$i]) {
            $max_note = $notes[$i];
        }
    }
    return $max_note;
}
?>
<section>
    <h1 class="flex-list-h">List des étudiant de la filiere:
        <form action="./listTest.php" method="POST" class="flex-list-h">
            <input type="submit" value="All students" name="all">
            <input type="submit" value="SMI" name="SMI">
            <input type="submit" value="SMA" name="SMA">
            <input type="submit" value="SMP" name="SMP">
            <input type="submit" value="SMC" name="SMC">
        </form>
    </h1>
    <div class="info">
        <p>Nombre des étudiants réussis: <?php echo count($std) ?></p>
        <p>Melleure note:<?php echo getMax($std); ?></p>
    </div>

    <div class="table" id="table">
        <table>
            <thead>
                <tr>
                    <th>Prenome</th>
                    <th>Nom</th>
                    <th>filiere</th>
                    <th>Note</th>
                    <th>Mentions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($std as $student) {
                    echo '<tr>';
                    for ($i = 0; $i < count($student); $i++) {
                        echo "<th>$student[$i]</th>";
                    }
                    echo '</tr>';
                }
                ?>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<?php include('./templates/footer.php'); ?>