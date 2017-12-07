<?php $title = "Erreur !";?>
<?php $blogTitle = ""; ?>
<?php $blogSubTitle = "Il ya du soucis à se faire";?>
<?php $connexion = '' ?>
<?php $typeConnexion = "" ?>

<?php $subheading="Rien ne va plus !";?>
<?php $image = "public/img/contact-bg.jpg"?>
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
