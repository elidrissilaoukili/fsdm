<form name="myForm" action="" method="post">
    <input type="hidden" name="id" value="<?= $element["id"] ?? NULL ?>" />

    <table align="center" width="80%">
        <tr align="center">
            <td colspan="2"><span class="Err"><?= $erreur ?? "" ?></span></td>
        </tr>

        <?php foreach ($keys as $key) : ?>
            <?php if ($key != "id") : ?>
                <tr>
                    <td align="right" width="20%"><b><?= $key ?></b></td>
                    <td align="left"><input name="<?= $key ?>" value="<?= $element[$key] ?? "" ?>" /></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>

        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Envoyer" />
                <input type="reset" value="Annuler" />
            </td>
        </tr>
    </table>
</form>