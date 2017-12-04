<?php $title="connexion";?>
<?php $head="";?>
<?php ob_start();?>

<h1>Interface d'inscription</h1>
<h3>Bonjour Monsieur Forteroche merci de bien vouloir créer vos identifiants</h3>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index.php?action=getSignIn" method="post">
    <p>
        <label for="login">Login</label>
        <input type="text" name="login" id="login">
    </p>

    <p>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password">

    </p>
<input type="submit" value="GO !">
</form>
</body>
</html>

<?php $content = ob_get_clean();?>

<?php require_once 'view/frontend/template.php';?>
