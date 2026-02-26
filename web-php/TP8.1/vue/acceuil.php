<?php
include("vue/haut.php");
if(!isset($_SESSION["Login"]["Login"])) header("location: index.php?action=login");
?>
<main class="main">
    <h1>Affichage des notes</h1>
    <div class="Line2"></div>
    <ol>
        <?php
        foreach ($filieres as $f) {
        ?>
            <li><a href="index.php?action=liste&codeF=<?= $f['CodeF'] ?>"><?= $f['IntituleF'] ?></a></li>
        <?php } ?>
    </ol>
    <table>
        <thead>
            <tr>
                <th>Code Filiere</th>
                <th>intitulé</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($filieres as $f) {
            ?>
                <tr>
                    <td><?= $f['CodeF'] ?></td>
                    <td><a href="index.php?action=liste&codeF=<?= $f['CodeF'] ?>"><?= $f['IntituleF'] ?></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <form action="index.php">
        <input type="checkbox" name="action" value="liste" hidden checked >
        <select name="codeF">
            <?php
            foreach ($filieres as $f) {
            ?>
                <option value="<?= $f["CodeF"] ?>"><?= $f["IntituleF"] ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Valider">
    </form>
</main>

<?php
include("vue/bas.php");
?>