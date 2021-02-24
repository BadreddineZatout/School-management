<?php
    if(!isset($_GET['action'])){
        header('location:/');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'includes/link.php' ?>
    <link rel="stylesheet" href="style/table.css">
    <title>Emploie due temps</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="mx-5">
        <table id="edt" class="table table-bordered">
            <thead>
                <th>Cycle</th>
                <th>Classe</th>
                <th>Jour</th>
                <th>8h-9h</th>
                <th>9h-10h</th>
                <th>10h-11h</th>
                <th>10h-12h</th>
                <th>1h30-2h30</th>
                <th>2h30-3h30</th>
                <th>3h30-4h30</th>
                <th>4h30-5h30</th>
            </thead>
            <tbody>
            <?php
            $style = 'style="text-align: center;"';
            foreach ($edt_rows as $row) {
                ?>
                <tr>
                    <td <?= $style ?>><?= $row['cycle'] ?></td>
                    <td <?= $style ?>><?= $row['classe'] ?></td>
                    <td <?= $style ?>><?= $row['jour'] ?></td>
                    <td <?= $style ?>><?= $row['t1'] ?></td>
                    <td <?= $style ?>><?= $row['t2'] ?></td>
                    <td <?= $style ?>><?= $row['t3'] ?></td>
                    <td <?= $style ?>><?= $row['t4'] ?></td>
                    <td <?= $style ?>><?= $row['t5'] ?></td>
                    <td <?= $style ?>><?= $row['t6'] ?></td>
                    <td <?= $style ?>><?= $row['t7'] ?></td>
                    <td <?= $style ?>><?= $row['t8'] ?></td>
                </tr>
            <?php
            } ?>
            </tbody>
        </table>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
</html>