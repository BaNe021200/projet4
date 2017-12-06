<?php $title="Erreur !";?>
<?php $blogTitle = ""; ?>
<?php $blogSubTitle = "Bienvenue Monsieur Forteroche";?>

<?php $subheading="Merci de bien vouloir entrer vos identifiants";?>
<?php $image = "public/img/home-bg.jpg"?>
<?php ob_start();?>

<div class="col-lg-8 col-md-10 mx-auto">

<h1><?= $errorMessage; ?></h1>
<?php $content = ob_get_clean();?>
<?php ob_start();?>
    <div class="clearfix">
        <a class="btn btn-secondary float-right" href="index.php">Retour &rarr;</a>
    </div>

<?php $backButton = ob_get_clean();?>
<?php require_once 'view/backend/templateAdminPostView.php';
