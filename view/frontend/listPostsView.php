<?php session_start()?>
<?php $title = "Bilet simple pour l'alaska"; ?>
<?php $head = ""?>


<?php ob_start(); ?>
   <header> <a href="index.php?action=adminConnexion"><button>Connexion</button></a></header>
    <h1>Billet Simple pour l'Alaska</h1>
    <h2>le blog roman de Jean ForteRoche</h2>


<?php
while ($data = $posts->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>

        </h3>

        <p>
            <?= nl2br($data['resume']) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapître et/ou laisser des commentaires</a></em>
        </p>
    </div>
    <?php
}
$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require_once'view/frontend/template.php'; ?>