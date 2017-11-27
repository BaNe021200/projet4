<?php $title="Administration Billet";?>
<?php ob_start();?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

<?php $head = ob_get_clean(); ?>


<?php ob_start();?>





<h1>Interface d'administration Billets</h1>




<table class="table table-striped">
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

    <td><?= $post['resume'] ;?></td>


    <td> <a id="modification"  href="index.php?action=modificationPost&amp;id=<?= $post['id'] ?>"><button>Modifier</button></a></td>
    <td><a  href="supression.php?numBillet=<?=$post['id'];?>" ><button type="submit" class="del" >Supprimer</button> </a></td>


    <?php endforeach;?>

</tr>

</tbody>
</table>
    <p class="text-center"><a href="index.php?action=publicationPost"><button>Publier</button></a></p>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<?php $content = ob_get_clean()?>
<?php require_once 'view/frontend/template.php';
