<h1>List of <?= $module; ?></h1>
<div>
	<?php if (count($list) > 0): ?>
		<?php  $keys = array_keys($list[0]); ?>	
        <table>
            <tr>
            	<?php foreach ($keys as $k): ?>
            		<th> <?= $k; ?> </th>
            	<?php endforeach; ?>
        		<th colspan="2">Action</th>
            </tr>	
            <?php foreach ($list as $e): ?>	
            	<tr>
            		<?php foreach ($keys as $k): ?>
            			<td>
            				<a href="index.php?module=<?= $module ?>&action=detail&id=<?= $e["id"] ?>">
            					<?= $e[$k] ?>
            				</a>
            			</td>
            		<?php endforeach;?>
            		<td>
            			<a href="index.php?module=<?= $module ?>&action=edit&id=<?= $e["id"] ?>">Modifier</a>
            		</td>
                    <td>
                        <a href="index.php?module=<?= $module ?>&action=delete&id=<?= $e["id"] ?>">Supprimer</a>
                    </td>
            	</tr>
            <?php endforeach; ?>	
        </table>

	<?php else: ?>
		<b>Aucun element dans cette table </b>
	<?php endif; ?>
</div>

<div align="right">
    <a href="index.php?module=<?= $module ?>&action=edit">Ajouter Nouveau</a>
</div>
