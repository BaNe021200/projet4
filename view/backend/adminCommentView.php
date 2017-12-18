<?php session_start()?>
<?php $title="Administration Commentaires";?>
<?php $image = "public/img/about-bg2.jpg"?>
<?php $blogTitle ="The BackEnd" ; ?>
<?php $blogSubTitle = "The dark side of the blog";?>
<?php $subheading="les commentaires" ?>
<?php $connexion = 'index.php?action=adminDeconnexion' ?>
<?php $typeConnexion = "Deconnexion" ?>



<?php ob_start();?>

<!--<div class="mx-auto mb-lg-5 text-center" >
    <a href="index.php?action=adminPost"><button>Billets</button></a>
</div>
<div class="post-preview">

<h1>Interface d'administration Commentaires</h1>-->

<div class="post-preview">
    <div class="text-center mb-lg-5">

        <a href="index.php?action=adminPost"><button>Billets</button></a></div>

    <h2>Récapitulatif d'une certaine situation à un instant non moins incertain</h2>



    <div class="mx-auto">

<table class="table table-striped table-responsive">
    <caption>Commentaires signalés</caption>
    <thead>
    <tr>

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

        <td><?= htmlspecialchars($reportedComment['title']) ?> </td>
        <td><?= htmlspecialchars($reportedComment['author']) ?></td>
        <td><?= htmlspecialchars($reportedComment['email']) ?></td>
        <td><?= htmlspecialchars(substr($reportedComment['comment'],0,50)) ?></td>
        <td><?= htmlspecialchars($reportedComment['comment_date_fr']) ;?></td>

        <td><a href="index.php?action=editReportedComments&amp;id=<?=$reportedComment['id'] ?>"><button>Edit</button></a></td>


        <?php endforeach;?>

    </tr>

    </tbody>
</table>

<table class="table table-striped table-responsive">
    <caption>Commentaires lambdas</caption>
    <thead>
    <tr>

        <th>Titre du billet</th>
        <th>Auteur du commentaire</th>
        <th>Commentaire</th>
        <th>Réponse</th>
        <th>Date de publication</th>


    </tr>
    </thead>
    <tbody>

    <?php foreach ($comments as $comment):?>
    <tr>

        <td><?= htmlspecialchars($comment['title']) ?> </td>
        <td><?= htmlspecialchars($comment['author']) ?></td>
        <td><?= htmlspecialchars(substr($comment['comment'],0,50)) ?></td>
        <td><?= htmlspecialchars($comment['answer']) ?></td>
        <td><?= htmlspecialchars($comment['comment_date_fr']) ;?></td>

        <td><a href="index.php?action=editComments&amp;id=<?=$comment['id']?>"><button>Edit</button></a></td>


        <?php endforeach;?>

    </tr>

    </tbody>
</table>

<table class="table table-striped table-responsive">
    <caption>Commentaires autorisés</caption>
    <thead>
    <tr>

        <th>Titre du billet</th>
        <th>Auteur du commentaire</th>
        <th>Commentaire</th>
        <th>Réponse</th>
        <th>Date de publication</th>


    </tr>
    </thead>
    <tbody>

    <?php foreach ($authorizedComments as $authorizedComment):?>
    <tr>

        <td><?= htmlspecialchars($authorizedComment['title']) ?> </td>
        <td><?= htmlspecialchars($authorizedComment['author']) ?></td>
        <td><?= htmlspecialchars(substr($authorizedComment['comment'],0,50)) ?></td>
        <td><?= htmlspecialchars($authorizedComment['answer']) ?></td>
        <td><?= htmlspecialchars($authorizedComment['comment_date_fr']) ;?></td>

        <td><a href="index.php?action=editAuthorisedComments&amp;id=<?=$authorizedComment['id']?>"><button>Edit</button></a></td>


        <?php endforeach;?>

    </tr>

    </tbody>
</table>



<!--<p class="text-center"><a href="index.php?action=publicationPost"><button>Publier</button></a></p>-->

</div>



<?php $content = ob_get_clean()?>
<?php $backButton ="";?>
<?php require_once 'view/backend/templateAdminPostView.php';?>
