<?php
include('./templates/header.php');
require "./configs/list.config.php";
?>
<section>
    <div class="h-search">
        <h1>List des étudiant de la filiere:</h1>
        <div class="flex-center">
            <form action="./list.php" method="POST" class="flex-list-h">
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
    </div>

    <div class="info">
        <p>Nombre des étudiants réussis: <span><?php echo count($std) ?></span> </p>
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
                <?php displayStudent($std); ?>
            </tbody>
        </table>
    </div>
</section>

<?php include('./templates/footer.php'); ?>