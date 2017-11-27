<?php $title= htmlspecialchars($post['title']);?>
<?php ob_start();?>
<h1>Billet Simple pour l'Alaska</h1>
<h2>le blog roman de Jean ForteRoche</h2>
<p><a href="index.php">Retour à la liste des posts</a></p>


<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']); ?>

    </h3>

    <p>
        <?= nl2br($post['content']); ?>
        <em class="pub"> <?= "publié le ".$post['creation_date_fr']; ?></em>
    </p>
</div>

<h2>Commentaires</h2>



<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>


    <div>
        <label for="email">Email</label><br />
        <input type="text" id="email" name="email" />
    </div>





    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php

while ($comment = $comments->fetch())
{
    ?>

    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

    <a href="index.php?action=signalizeComment&amp;id=<?= $comment['id'] ?>">
        <form action="index.php?action=signalizeComment&amp;id=<?= $comment['id'] ?>" method="post">
          <input type="hidden" name="reportedComment" id="id" value="1">

            <input type="submit" value="Signaler">
        </form>

    </a>
    <?php
}

?>


<?php $content= ob_get_clean();?>
<?php require_once 'view/frontend/template.php';?>
