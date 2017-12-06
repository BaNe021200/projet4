<?php $title="connexion";?>
<?php $blogTitle = ""; ?>
<?php $blogSubTitle = "Bienvenue Monsieur Forteroche";?>

<?php $subheading="Merci de bien vouloir entrer vos identifiants";?>
<?php $image = "public/img/home-bg.jpg"?>
<?php ob_start();?>

<div class="col-lg-8 col-md-10 mx-auto">

<form action="index.php?action=authentificationConnexion" method="post">
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
<label for="login">login</label>
<input class="form-control" type="text" name="login" id="login" placeholder="login">
    </div>
    </div>

    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
<label for="password">password</label>
<input class="form-control" type="password" name="password" id="password" placeholder="password">
        </div>
    </div>


<p><input type="submit" class="text-center" value="Sign up !"></p>
</form>

<?php $content = ob_get_clean();?>
<?php ob_start();?>
    <div class="clearfix">
        <a class="btn btn-secondary float-right" href="index.php">Retour &rarr;</a>
    </div>

<?php $backButton = ob_get_clean();?>
<?php require_once 'view/backend/templateAdminPostView.php';
