<?php session_start()?>
<?php $title="PUBLICATION"; ?>
<?php $blogTitle = "Interface de publication"; ?>
<?php $blogSubTitle = "";?>

<?php $subheading="Que le fil de l'histoire soit ici tissé";?>
<?php $image = "public/img/home-bg.jpg"?>


<?php ob_start();?>

<div class="col-lg-8 col-md-10 mx-auto">

<form action="index.php?action=addPost" method="post">
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
    <label>Titre</label>
    <input type="text" id="title" name="title" class="form-control" placeholder="Titre">
            <p class="help-block text-danger"></p>
        </div>
    </div>

    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
    <label for="resume" id="resume" name="resume" >Résumé</label>
    <textarea name="resume" maxlength="500" rows="10" cols="40"  id="resume" class="form-control" placeholder="Résumé"></textarea>
            <p class="help-block text-danger"></p>
        </div>
    </div>

    <div class="control-group">
    <div class="form-group floating-label-form-group controls">
    <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
        <p class="help-block text-danger"></p>
    </div>
    </div>

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
    <?php ob_start();?>
    <div class="clearfix">
        <a class="btn btn-secondary float-right" href="index.php?action=adminPost">Retour &rarr;</a>
    </div>

    <?php $backButton = ob_get_clean();?>

    <?php require_once'view/backend/templateAdminPostView.php'?>

