<?php session_start()?>
<?php $title="Administration Commentaires";?>
<?php $image = "public/img/about-bg2.jpg"?>
<?php $blogTitle ="The BackEnd" ; ?>
<?php $blogSubTitle = "The dark side of the blog";?>
<?php $subheading="les commentaires" ?>
<?php $connexion = 'index.php?action=adminDeconnexion' ?>
<?php $typeConnexion = "Deconnexion" ?>



<?php ob_start();?>

<a href="index.php?action=adminPost"><button>Billets</button></a>

<div class="post-preview">

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
        <td><?= substr($reportedComment['comment'],0,100) ?></td>
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
        <td><?= substr($comment['comment'],0,100) ?></td>
        <td><?= $comment['comment_date_fr'] ;?></td>

        <td><a href="index.php?action=editComments&amp;id=<?=$comment['id']?>"><button>Edit</button></a></td>


        <?php endforeach;?>

    </tr>

    </tbody>
</table>



<!--<p class="text-center"><a href="index.php?action=publicationPost"><button>Publier</button></a></p>-->

</div>



<?php $content = ob_get_clean()?>
<?php $backButton ="";?>
<?php require_once 'view/backend/templateAdminPostView.php';?>
