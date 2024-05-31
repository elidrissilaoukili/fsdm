<?php $modules = include './configs/Modules.php'; ?>


<ul>
	<li><a href="index.php?module=index&action=index">Home</a></li>

	<?php foreach ($modules as $key => $value): ?>
		<li><a href='index.php?module=<?= $key ;?>&action=list'><?=$key;?></a></li>
	<?php endforeach;?>
</ul>
