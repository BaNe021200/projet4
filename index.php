<?php
//declare(strict_types=1);
require_once 'controler/frontend.php';
require_once 'controler/backend.php';
try{
if(isset($_GET['action'])){
    if($_GET['action']=='listPosts'){
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            throw new Exception('Erreur : aucun identifiant de billet
         envoyé');
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComments($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                throw new Exception('Erreur : tous les champs ne sont pas remplis !');
            }
        }
        else {
            throw new Exception( 'Erreur : aucun identifiant de billet envoyé');
        }
    }
    elseif ($_GET['action'] == 'publicationPost'){
        publicationPost();
    }

    elseif ($_GET['action'] == 'adminTable'){
        adminTable();
    }

    elseif ($_GET['action'] == 'addPost'){
        if (!empty($_POST['title']) && !empty($_POST['resume']) && !empty($_POST['content'])) {
            addPost($_POST['title'], $_POST['resume'], $_POST['content']);
        }
        else {
            throw new Exception('Erreur : tous les champs ne sont pas remplis !');
        }
    }

    elseif ($_GET['action'] == 'signalizeComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            reportComment($_GET['id']);
        }
        else {
            throw new Exception('Erreur : aucun identifiant de commentaire
         envoyé');
        }
    }

}
else{
    listPosts();
}
}
catch(Exception $e){
    $errorMessage= $e->getMessage();
    require('view/frontend/errorView.php');
}