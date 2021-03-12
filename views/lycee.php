<?php
    if(!isset($_GET['action'])){
        header('location:/');
    }
require_once 'View.php';
class Lycee extends View{
    public function Lycee($articles){
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <?php
            $this->head();
            ?>
        <body>
            <?php 
                $this->header();
                $this->menu();
                $this->get_cadres(3);
                $this->articles($articles);
                $this->footer();
            ?>
        </body>
        <?php
        $this->scripts();
        ?>
        </html>
    <?php
    }
    private function head(){
        ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'includes/link.php' ?>
    <link rel="stylesheet" href="style/articles.css">
    <title>Secondaire</title>
</head>
    <?php
    }
    private function get_cadres($cycle){
        require_once 'views/cycle/cycle-cadre.php';
    }
    private function articles($articles){
        ?>
        <div class="row mx-auto mb-5">
        <div class="col-sm-12 card-deck">
        <?php 
            foreach($articles[0] as $article)
            {
        ?> 
            <div class="card col-sm-3">
                <img class="card-img-top" src="<?= $article['image'] ?>" alt="card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $article['titre'] ?></h4>
                    <p class="card-text"><?= $article['contenu'] ?></p>
                    <a class="btn" href="/?action=article&article=<?= $article['id'] ?>">Afficher la suite</a>
                </div>
            </div>
        <?php } ?>
        </div>
        <div class="col-sm-12 card-deck">
        <?php 
            foreach($articles[1] as $article)
            {
        ?> 
            <div class="card col-sm-3">
                <img class="card-img-top" src="<?= $article['image'] ?>" alt="card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $article['titre'] ?></h4>
                    <p class="card-text"><?= $article['contenu'] ?></p>
                    <a class="btn" href="/?action=article&article=<?= $article['id'] ?>">Afficher la suite</a>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <?php
    }
}
?>