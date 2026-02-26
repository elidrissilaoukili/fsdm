<!-- app/views/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
</head>
<body>
    <h1>Liste des <?php echo htmlspecialchars($this->model->table); ?></h1>
    <a href="/<?php echo htmlspecialchars($this->model->table); ?>/create">Ajouter un nouvel élément</a>
    <table>
        <thead>
            <tr>
                <?php foreach (array_keys($data[0]) as $column): ?>
                    <th><?php echo htmlspecialchars($column); ?></th>
                <?php endforeach; ?>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <?php foreach ($row as $cell): ?>
                        <td><?php echo htmlspecialchars($cell); ?></td>
                    <?php endforeach; ?>
                    <td>
                        <a href="/<?php echo htmlspecialchars($this->model->table); ?>/show/<?php echo $row['id']; ?>">Voir</a>
                        <a href="/<?php echo htmlspecialchars($this->model->table); ?>/edit/<?php echo $row['id']; ?>">Modifier</a>
                        <a href="/<?php echo htmlspecialchars($this->model->table); ?>/delete/<?php echo $row['id']; ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
