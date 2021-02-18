<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'includes/link.php' ?>
    <link rel="stylesheet" href="/style/ecole.css">
    <title>Presentation</title>
</head>
<body>
    <?php
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="row mx-auto">
        <div class="col-sm-10 card ppt mx-auto">
            <div class='card-header'>
                <h1>Nom ecole</h1>
            </div>
            <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>

        <div class="col-sm-5 ppt mx-auto my-5">
            <div class="card-deck p-3">
                <div class="card">
                    <img src="../data/images/img.jpg" alt="image">
                </div>
            </div>
        </div>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
</html>