<?php session_start()?>
<?php $title= htmlspecialchars($post['title']);?>
<?php $blogTitle = "Interface de modification"; ?>
<?php $blogSubTitle = "Billets";?>
<?php $connexion = 'index.php?action=adminDeconnexion' ?>
<?php $typeConnexion = "Deconnexion" ?>
<?php $subheading="Tremblez billets...votre heure à sonnée";?>
<?php $image = "public/img/contact-bg2.jpg"?>

<?php $head = ob_get_clean(); ?>
<?php ob_start();?>
<article>
<div class="col-lg-8 col-md-10 mx-auto text-center">
    <h3>
        <?= htmlspecialchars($post['title']); ?>


    </h3>
    <p>
        <?= nl2br($post['resume']) ?>
    </p>


    <p>
        <?= nl2br($post['content']); ?>

    </p>








<!-- Button trigger modal -->
<div class="text-center mt-5">
<a id="modification"  href="index.php?action=modificationPost&amp;id=<?= $post['id'] ?>"><button>Modifier</button></a>
<button type="button" data-toggle="modal" href="#myModal">Supprimer</button></div>






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
                <p>Vous êtes sur point de supprimer le  <?= $post['title'] ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelButton" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="index.php?action=deletePost&amp;id=<?= $post['id'] ?>"><button type="button" id="Delbutton" class="btn btn-primary" >Supprimer</button></a>
            </div>
        </div>
    </div>
</div>
</div>

</article>
<?php $content = ob_get_clean(); ?>
<?php ob_start();?>
<div class="clearfix">
    <a class="btn btn-secondary float-right" href="index.php?action=adminPost">Retour &rarr;</a>
</div>

<?php $backButton = ob_get_clean();?>

<?php require_once'view/backend/templateAdminPostView.php'?>
