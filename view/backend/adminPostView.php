<?php session_start()?>
<?php $title="Administration Billets";?>
<?php $blogTitle ="The BackEnd" ; ?>
<?php $blogSubTitle = "The dark side of the blog";?>
<?php $connexion = 'index.php?action=adminDeconnexion' ?>
<?php $typeConnexion = "Deconnexion" ?>


<?php $image = "public/img/about-bg3.jpg"?>
<?php $subheading= "les billets";?>


<?php ob_start();?>



<div class="post-preview">
    <div class="text-center mb-lg-5">

        <a href="index.php?action=adminComment"><button>Commentaires</button></a></div>

<h2>Récapitulatif d'une certaine situation à un instant non moins incertain</h2>



<div class="mx-auto">
<table class="table table-striped table-responsive ">
<thead>
<tr>
    <th>#</th>
    <th>Titre</th>
    <th>Date de publication</th>
    <th>date de modification</th>
    <th>Résumé</th>

    <!-- <th invisible>Publier</th>
    <!-- <th invisible>Publier</th>
     <th>Modifier</th>
     <th>Supprimer</th>-->
</tr>
</thead>
<tbody>

<?php foreach ($posts as $post):?>
<tr>
    <td><?= $post['id'] ?> </td>
    <td><?= $post['title'] ?></td>
    <td><?= $post['creation_date_fr'] ?></td>
    <td><?= $post['modification_date_fr'] ?></td>
    <td><?= substr($post['resume'],0,100) ;?></td>

    <td><a href="index.php?action=editPosts&amp;id=<?= $post['id'] ?>"><button>Edit</button></a></td>



<?php endforeach;?>

    </tr>

    </tbody>
    </table>
</div>

    <p class="text-center" ><a href="index.php?action=publicationPost"><button>Publier</button></a></p>
</div>

<?php $content = ob_get_clean(); ?>
<?php ob_start();?>
<div class="clearfix">
    <a class="btn btn-secondary float-right" href="index.php">Retour &rarr;</a>
</div>

<?php $backButton = ob_get_clean();?>

<?php require_once'view/backend/templateAdminPostView.php'?>
