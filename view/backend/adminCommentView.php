<?php session_start()?>
<?php $title="Administration Commentaires";?>
<a href="index.php"><button>retour</button></a>
<a href="index.php?action=adminPost"><button>Billets</button></a>

<?php ob_start();?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


<?php $head = ob_get_clean(); ?>


<?php ob_start();?>





<h1>Interface d'administration Commentaires</h1>

<table class="table table-striped">
    <caption>Commentaires signalés</caption>
    <thead>
    <tr>
        <th>#</th>
        <th>Titre du billet</th>
        <th>Auteur du commentaire</th>
        <th>email</th>
        <th>Commentaire</th>
        <th>Date de publication</th>


    </tr>
    </thead>
    <tbody>

    <?php foreach ($reportedComments as $reportedComment):?>
    <tr>
        <td><?= $reportedComment['id'] ?></td>
        <td><?= $reportedComment['title'] ?> </td>
        <td><?= $reportedComment['author'] ?></td>
        <td><?= $reportedComment['email'] ?></td>
        <td><?= $reportedComment['comment'] ?></td>
        <td><?= $reportedComment['comment_date_fr'] ;?></td>

        <td><a href="index.php?action=editComments&amp;id=<?= $reportedComment['id'] ?>"><button>Edit</button></a></td>


        <?php endforeach;?>

    </tr>

    </tbody>
</table>

<table class="table table-striped">
    <caption>Commentaires lambdas</caption>
    <thead>
    <tr>
        <th>#</th>
        <th>Titre du billet</th>
        <th>Auteur du commentaire</th>
        <th>email</th>
        <th>Commentaire</th>
        <th>Date de publication</th>


    </tr>
    </thead>
    <tbody>

    <?php foreach ($comments as $comment):?>
    <tr>
        <td><?= $comment['id'] ?> </td>
        <td><?= $comment['title'] ?> </td>
        <td><?= $comment['author'] ?></td>
        <td><?= $comment['email'] ?></td>
        <td><?= $comment['comment'] ?></td>
        <td><?= $comment['comment_date_fr'] ;?></td>

        <td><a href="index.php?action=editComments&amp;id=<?=$comment['id']?>"><button>Edit</button></a></td>


        <?php endforeach;?>

    </tr>

    </tbody>
</table>



<p class="text-center"><a href="index.php?action=publicationPost"><button>Publier</button></a></p>




<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<?php $content = ob_get_clean()?>
<?php require_once 'view/frontend/template.php';?>
