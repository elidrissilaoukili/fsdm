
<?php include 'templates/header.view.php';?>



<div class="table" id="table">
    <table>
        <thead>
            <tr>
                <th>code</th>
                <th>first name</th>
                <th>last name</th>
                <th>note</th>
                <th>Mention</th>
                <th>filiere</th>
                <th>email</th>
                <th>password</th>
                <th>created at</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($data['students'] as $student): ?>
                <tr>
                    <td> <?= $student->code ?> </td>
                    <td> <?= $student->first_name ?> </td>
                    <td> <?= $student->last_name ?> </td>
                    <td> <?= $student->note ?> </td>
                    <td> <?= $student->mention ?> </td>
                    <td> <?= $student->sector ?> </td>
                    <td> <?= $student->email ?> </td>
                    <td> <?= $student->password ?> </td>
                    <td> <?= $student->created_at ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include 'templates/footer.view.php';?>