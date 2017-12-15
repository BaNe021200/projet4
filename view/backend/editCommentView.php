<?php session_start()?>
<?php $title="Administration Commentaires"?>
<?php $connexion = '' ?>
<?php $typeConnexion = "" ?>
<?php $blogTitle = "Interface de modification"; ?>
<?php $blogSubTitle = "Commentaires";?>
<?php $connexion = 'index.php?action=adminDeconnexion' ?>
<?php $typeConnexion = "Deconnexion" ?>
<?php $subheading="Tremblez billets...votre heure à sonnée";?>
<?php $image = "public/img/contact-bg2.jpg"?>
<?php ob_start();?>

<article>
    <div class="col-lg-8 col-md-10 mx-auto">

    <h3>
        <?= htmlspecialchars($lambdaComments['author']); ?>

    </h3>
    <p class="text-center">
        <?= nl2br($lambdaComments['email']) ?>
    </p>


    <p class="text-center">
        <?= nl2br($lambdaComments['comment']); ?>
    </p>




<!-- Button trigger modal -->

<p class="text-center"><button type="button" data-toggle="modal" href="#myModal">Supprimer</button></p>






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
                <p>Vous êtes sur point de supprimer le message de <?= $lambdaComments['author'] ?></p>
            </div>
            <div class="modal-footer">
                <button type="button"  id="cancelButton" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="index.php?action=deletePost&amp;id=<?= $lambdaComments['id'] ?>"><button type="button" class="btn btn-primary"id="Delbutton">Supprimer</button></a>
            </div>
        </div>
    </div>
  </div>
<div id="answer">
    <p><strong>Ma réponse: </strong></p>
    <p>



        <?= nl2br($lambdaComments['answer']);?>


    </p>

    <h3>Répondre</h3>
        <form id="contactForm" name="sentMessage" action="index.php?action=addAnswer&amp;id=<?= $lambdaComments['id'] ?>" method="post">

            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Pseudo *</label>
                    <input class="form-control" type="hidden" id="author" name="answerAuthor" value="Jean Forteroche le "  />

                    <p class="help-block text-danger"></p>
                </div>
            </div>



            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label for="comment">Réponse</label><br />
                    <textarea id="comment"  class="form-control" name="answer" cols="500"
                              placeholder="Réponse*"></textarea>
                    <p class="help-block text-danger"></p>
                </div>
            </div>

            <div class="form-group">
                <p><em>* Obligatoire</em></p>
                <input type="submit" value="Répondre" />
            </div></div>

    </form>

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

