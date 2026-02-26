<?php include('./templates/header.php'); ?>
<section>
    <h1>Gestion des étudiants</h1>

    <div class="sec-main"></div>
    <div class="a-c">
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            Velit aperiam accusamus odit ipsa, dolores quo dolorem
            impedit iusto dicta natus commodi corrupti, sint architecto.
            Eius voluptates corrupti corporis dicta nobis!
        </p>
    </div>

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
        <input type="submit" value="Search" class="searchBTN">
    </form>

</section>




<?php include('./templates/footer.php'); ?>