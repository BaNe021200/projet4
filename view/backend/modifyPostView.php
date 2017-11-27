<?php $title="Administration billets"; ?>
<?php $head = ""?>
<?php ob_start();?>
<h1>Modification des billets</h1>
<header><a href="index.php?action=adminPost"><button>retour</button></a></header>
<form action="index.php?action=modifyPost&amp;id=<?= $posts['id'] ?>" method="post">

    <p><label for="title" id="title" name="title">Titre</label>
        <input type="text" id="title" name="title" value="<?= $posts['title'] ?>"></p>


    <textarea name="resume" id="resume" cols="30" rows="10"  onkeyup="this.value = this.value.slice(0, 500)" onchange="this.value = this.value.slice(0, 500)" >
     <?= $posts['resume'] ?>
    </textarea>

    <textarea name="content" id="content" cols="30" rows="10"><?= $posts['content'] ?></textarea>

    <p>  <input type="submit" value="Modifier !"></p>

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







