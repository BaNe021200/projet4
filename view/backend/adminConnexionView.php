<?php $title="connexion";?>
<?php $head="";?>
<?php ob_start();?>

<h1>Interface d'authentification</h1>
<h3>Bonjour Monsieur Forteroche merci de bien vouloir entrer vos identifiants</h3>

<form action="index.php?action=authentificationConnexion" method="post">
<p>
<label for="login">login</label>
<input type="text" name="login" id="login">
</p>

<p>
<label for="password">password</label>
<input type="password" name="password" id="password">
</p>


<input type="submit" value="Sign up !">
</form>

<?php $content = ob_get_clean();?>
<?php require_once 'view/frontend/template.php';
