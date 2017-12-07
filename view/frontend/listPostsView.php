<?php session_start()?>
<?php $title = "Bilet simple pour l'alaska"; ?>
<?php $blogTitle = "Bilet simple pour l'alaska"; ?>
<?php $blogSubTitle = "le blog roman";?>
<?php $connexion = 'index.php?action=adminConnexion' ?>
<?php $typeConnexion = "Connexion" ?>
<?php $subheading="par Jean ForteRoche";?>
<?php $image = "public/img/home-bg2.jpg"?>



<?php ob_start(); ?>



<?php
while ($data = $posts->fetch())
{
    ?>
    <div class="post-preview">
    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
        <h2 class="post-title">
            <?= nl2br(htmlspecialchars($data['title'])) ?>
        </h2>
        <h4 class="post-subtitle">
            <?= nl2br($data['resume']) ?>
        </h4>
    </a>
    <p class="post-meta">Publié par
        <a href="#">Jean Forteroche</a>
       <?= $data['creation_date_fr'] ?></p>

        <br />
        <hr>
    </div>



    <?php
}
$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php ob_start();?>
    <div class="clearfix">
        <a class="btn btn-secondary float-right" href="index.php">Retour &rarr;</a>
    </div>

<?php $backButton = ob_get_clean();?>

<?php require_once'view/frontend/templateListPostView.php'?>