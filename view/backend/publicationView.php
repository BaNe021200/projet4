<?php $title="PUBLICATION"; ?>
<?php ob_start();?>
<h1>Bienvenue dans cet espace de publication</h1>
<p><a href="index.php">Retour à la liste des posts</a></p>

<form action="index.php?action=addPost" method="post">
    <p><label for="title" id="title" name="title">Titre</label>
    <input type="text" id="title" name="title"></p>
    <p><label for="resume" id="resume" name="resume">Résumé</label>
    <input type="text" cols="40" onkeyup="this.value = this.value.slice(0, 500)" onchange="this.value = this.value.slice(0, 500)" placeholder="Résumé" name= "resume" id="resume"  ></p>


    <textarea name="content" id="content" cols="30" rows="10"></textarea>

    <p>  <input type="submit" value="Publier !"></p>
    
</form>
<!--  TinyMCE  -->

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=p74lb65ajgvm73tkq4k93a0epdnlkptwe4qjdwwhnssg3i93"></script>
<script>tinymce.init({

        mode : "exact",
        elements : "content",
        branding : false,

    });

</script>
<?php $content= ob_get_clean();?>
<?php require_once 'view/frontend/template.php';?>

