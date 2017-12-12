<?php session_start()?>
<?php $title="REPONSE"; ?>
<?php $blogTitle = "Interface de réponse"; ?>
<?php $blogSubTitle = "";?>
<?php $connexion = 'index.php?action=adminDeconnexion' ?>
<?php $typeConnexion = "Deconnexion" ?>
<?php $subheading="";?>
<?php $image = "public/img/home-bg.jpg"?>


<form id="contactForm" name="sentMessage" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Pseudo *</label>
            <input class="form-control" type="text" id="answerAuthor" name="answerAuthor" value="Jean Forteroche" />

            <p class="help-block text-danger"></p>
        </div>
    </div>




    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label for="comment">Commentaire</label><br />
            <textarea id="comment"  class="form-control" name="answser" placeholder="Commentaire*"></textarea>
            <p class="help-block text-danger"></p>
        </div>
    </div>

    <div class="form-group">
        <p><em>* Obligatoire</em></p>
        <input type="submit" value="Répondre" />
    </div></div>

</form>

<?php $content= ob_get_clean();?>

<?php ob_start();?>
    <div class="clearfix">
        <a class="btn btn-secondary float-right" href="index.php">Retour &rarr;</a>
    </div>

<?php $backButton = ob_get_clean();?>
<?php require_once 'view/backend/templateAdminPostView.php';?>

