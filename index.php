<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php   require_once 'layout/link.php'    ?>
    <link rel="stylesheet" href="../style/index.css">
    <title>Acceuil</title>
</head>
<body>
    <?php
        include 'layout/header.php'
    ?>
    <div class="slider-frame">
        <div class="slide-images">
            <div class="img-container">
                <img src="data/images//img.jpg" alt="image" width="100%" height="100%">
            </div>
            <div class="img-container">
                <img src="data/images//img2.jpg" alt="image" width="100%" height="100%">
            </div>
            <div class="img-container">
                <img src="data/images//img3.png" alt="image" width="100%" height="100%">
            </div>
            <div class="img-container">
                <img src="data/images//img4.jpg" alt="image" width="100%" height="100%">
            </div>
        </div>
    </div>
    <?php
        include 'layout/menu.php'
    ?>
    <div>

    </div>
    <?php
        include 'layout/footer.php'
    ?>
</body>
</html>