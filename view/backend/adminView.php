<?php $title="Administration";?>
<?php ob_start();?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

<?php $head = ob_get_clean(); ?>


<?php ob_start();?>





<h1>Interface d'administration</h1>




<table class="table table-striped">
<thead>
<tr>
    <th>#</th>
    <th>Titre</th>
    <th>Date de publication</th>
    <th>date de modification</th>
    <th>nb commentaires déposés</th>
    <th>nb commentaires à modérer</th>
    <!-- <th invisible>Publier</th>
    <!-- <th invisible>Publier</th>
     <th>Modifier</th>
     <th>Supprimer</th>-->
</tr>
</thead>
<tbody>

<?php foreach ($nbComments as $nbComment):?>
<tr>
    <td><?= $nbComment['id'] ?> </td>
    <td><?= $nbComment['title'] ?></td>
    <td><?= $nbComment['creation_date_fr'] ?></td>
    <td><?= $nbComment['modification_date_fr'] ?></td>

    <td><?= $nbComment['nbComment'] ;?></td>
    <td>5</td>
    <td><a id="show"  href="show.php?numBillet=<?=$post['id'];   ?>"><button>Aperçu</button></a</td>
    <td> <a id="modification"  href="modifier.php?numBillet=<?=$post['id'];   ?>"><button>Modifier</button></a></td>
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
