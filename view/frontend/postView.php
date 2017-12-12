<?php $title= htmlspecialchars($post['title']);?>
<?php $blogTitle = "Billet simple pour l'alaska"; ?>
<?php $blogSubTitle = "le blog roman";?>
<?php $connexion = 'index.php?action=adminConnexion' ?>
<?php $typeConnexion = "Connexion" ?>
<?php $subheading="par Jean ForteRoche";?>
<?php $image = "public/img/post-bg2.jpg"?>

<?php ob_start();?>


<article>

          <!--  <div class="col-lg-8 col-md-10 mx-auto">-->

                <h3>
                    <?= htmlspecialchars($post['title']); ?>

                </h3>

                <p>
                    <?= nl2br($post['content']); ?>
                    <em> <?= "publié le ".$post['creation_date_fr']; ?></em>
                </p>


            <div id="comment">

            <p><h2>Commentaires</h2></p>



            <form id="contactForm" name="sentMessage" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Pseudo *</label>
                        <input class="form-control" type="text" id="author" name="author" placeholder="Pseudo*" />

                        <p class="help-block text-danger"></p>
                </div>
                </div>


                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label for="email">Email (facultatif, votre adresse n'apparaitra pas dans les commentaires)</label><br />
                        <input type="text" id="email" name="email" placeholder="Email (facultatif)" />
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label for="comment">Commentaire*</label><br />
                        <textarea id="comment"  class="form-control" name="comment" placeholder="Commentaire*"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="form-group">
                    <p><em>* Obligatoire</em></p>
                    <input type="submit" />
                    <hr>
                </div></div>

    </form>

            <?php

            while ($comment = $comments->fetch())
            {
                ?>

                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> </p>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>


                    <form action="index.php?action=signalizeComment&amp;id=<?= $comment['id'] ?>" method="post">
                        <input type="hidden" name="reportedComment" id="id" value="1">

                        <input type="submit" value="Signaler">
                        </form>


                <p><strong><?= htmlspecialchars($comment['answerAuthor']) ?></strong>  <?= $comment['answer_date_fr'] ?></p>
                <p><?= nl2br(htmlspecialchars($comment['answer'])) ?>
                <hr></p>
                <?php
            }

            ?>





            </div>
</article>



<?php $content= ob_get_clean();?>

<?php ob_start();?>
<div class="clearfix">
    <a class="btn btn-secondary float-right" href="index.php">Retour &rarr;</a>
</div>

<?php $backButton = ob_get_clean();?>


<?php require_once 'view/frontend/templateListPostView.php';?>