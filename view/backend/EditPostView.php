<?php session_start()?>
<?php $title= htmlspecialchars($post['title']);?>
<header><a href="index.php?action=adminPost"><button>retour</button></a></header>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


<?php $head = ob_get_clean(); ?>
<?php ob_start();?>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']); ?>


    </h3>
    <p>
        <?= nl2br($post['resume']) ?>
    </p>


    <p>
        <?= nl2br($post['content']); ?>
        <em class="pub"> <?= "publié le ".$post['creation_date_fr']; ?></em>
    </p>





</div>


<!-- Button trigger modal -->

<a id="modification"  href="index.php?action=modificationPost&amp;id=<?= $post['id'] ?><?= $comments['id'] ?>"><button>Modifier</button></a>
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
                <p>Vous êtes sur point de supprimer le  <?= $post['title'] ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="index.php?action=deletePost&amp;id=<?= $post['id'] ?>"><button type="button" class="btn btn-primary" >Supprimer</button></a>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<?php $content= ob_get_clean();?>
<?php require_once 'view/frontend/template.php';?>

