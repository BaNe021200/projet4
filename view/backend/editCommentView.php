<?php session_start()?>
<?php $title="Administration Commentaires"?>

<?php $blogTitle = "Interface de modification"; ?>
<?php $blogSubTitle = "Copmmentaires";?>

<?php $subheading="Tremblez billets...votre heure à sonnée";?>
<?php $image = "public/img/contact-bg2.jpg"?>
<?php ob_start();?>

<article>
    <div class="col-lg-8 col-md-10 mx-auto">

    <h3>
        <?= htmlspecialchars($reportedComments['author']); ?>
        <?= htmlspecialchars($lambdaComments['author']); ?>

    </h3>
    <p>
        <?= nl2br($reportedComments['email']) ?>
        <?= nl2br($lambdaComments['email']) ?>
    </p>


    <p>
        <?= nl2br($reportedComments['comment']); ?>
        <?= nl2br($lambdaComments['comment']); ?>
    </p>




<!-- Button trigger modal -->

<button type="button" data-toggle="modal" href="#myModal">Supprimer</button>






<!-- Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Danger suppression !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Vous êtes sur point de supprimer le message de <?= $reportedComments['author'] ?><?= $lambdaComments['author'] ?></p>
            </div>
            <div class="modal-footer">
                <button type="button"  id="cancelButton" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="index.php?action=deletePost&amp;id=<?= $reportedComments['id'] ?><?= $lambdaComments['id'] ?>"><button type="button" class="btn btn-primary"id="Delbutton">Supprimer</button></a>
            </div>
        </div>
    </div>
  </div>
</div>
</article>
<?php $content= ob_get_clean();?>
<?php ob_start();?>
<div class="clearfix">
    <a class="btn btn-secondary float-right" href="index.php?action=adminComment">Retour &rarr;</a>
</div>

<?php $backButton = ob_get_clean();?>

<?php require_once'view/backend/templateAdminPostView.php'?>

