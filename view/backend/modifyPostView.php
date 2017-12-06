<?php session_start()?>
<?php $title="MODIFICATION"; ?>
<?php $blogTitle = "Interface de modification"; ?>
<?php $blogSubTitle = "";?>

<?php $subheading="Tremblez billets...votre heure à sonnée";?>
<?php $image = "public/img/home-bg.jpg"?>


<?php ob_start();?>

<div class="col-lg-8 col-md-10 mx-auto">

    <form action="index.php?action=modifyPost&amp;id=<?= $posts['id'] ?>" method="post">
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Titre</label>
                <input type="text" id="title" name="title" class="form-control" value="<?= $posts['title'] ?>">
                <p class="help-block text-danger"></p>
            </div>
        </div>

        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label for="resume" id="resume" name="resume" >Résumé</label>
                <textarea name="resume" rows="10" cols="40" maxlength="500" id="resume" class="form-control"><?= $posts['resume'] ?></textarea>
                <p class="help-block text-danger"></p>
            </div>
        </div>

        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"><?= $posts['content'] ?></textarea>
                <p class="help-block text-danger"></p>
            </div>
        </div>

        <p>  <input type="submit" value="Valider !"></p>

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
    <?php require_once 'view/backend/templateAdminPostView.php';?>

