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

    elseif ($_GET['action'] == 'signIn'){
        signIn();
    }

    elseif ($_GET['action'] == 'getSignIn'){
        if(isset($_POST['login']) || isset($_POST['password'])){
            if($_POST['password']===$_POST['password2']){
               if(!empty($_POST['password'])&& !empty($_POST['password2'])){
                     getSignIn($_POST['login']);
                }
               else{
                    throw new Exception('Les champs mots de passe ne peuvent être vide !');
                }


            }
            else
            {
               throw new Exception('Les deux mots de passe sont différents');

            }

        }
        else{
            throw new Exception("Tous les champs ne sont pas remplis");
        }


    }

    elseif ($_GET['action'] == 'adminConnexion') {
        if(!isset($_COOKIE['ID']) && !isset($_COOKIE['Login'])){
            adminConnexion();
        }

        else{
            adminPost();
        }


    }

    elseif ($_GET['action'] == 'adminDeconnexion'){
        signOut();


    }

    elseif ($_GET['action'] == 'authentificationConnexion'){
        if(!empty($_POST['login']) && !empty($_POST['password'])){
            authentificationConnexion();
        }
        else
        {
            throw new Exception("Tous les champs ne sont pas renseignés");
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


    elseif ($_GET['action'] == 'addAnswer'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
             if(!empty($_POST['answer'])){
                 addAnswer($_GET['id'], $_POST['answer'] );
             }
             else {
                 throw new Exception('Erreur : tous les champs ne sont pas remplis !');
             }


        }
        else{
            throw new Exception( 'Erreur : aucun identifiant de commentaire envoyé');
        }
    }

    elseif ($_GET['action'] == 'publicationPost'){
        if(isset($_COOKIE['ID'])&& isset($_COOKIE['Login'])) {

            publicationPost();
        }
        else{
            throw new Exception("Erreur vous n'êtes pas connectez. Veuillez vous identifier");

        }
    }

    elseif ($_GET['action']== 'modificationPost'){
        if(isset($_COOKIE['ID'])&& isset($_COOKIE['Login'])) {

            modifyPost();

        }
        else{
            throw new Exception("Erreur vous n'êtes pas connectez. Veuillez vous identifier");


        }
    }

    elseif ($_GET['action'] =='modifyPost'){
        if (isset($_GET['id']) && $_GET['id'] > 0){
            updatePosts($_GET['id'],$_POST['title'],$_POST['resume'],$_POST['content']);
        }
        else {
            throw new Exception( 'Erreur : aucun identifiant de billet envoyé');
        }

    }

    elseif($_GET['action']=='deletePost'){
        if (isset($_GET['id']) && $_GET['id'] > 0){
            deletePost($_GET['id']);
        }
        else {
            throw new Exception( 'Erreur : aucun identifiant de billet envoyé');
        }

    }

    elseif ($_GET['action'] == 'adminPost'){
        if(isset($_COOKIE['ID'])&& isset($_COOKIE['Login'])){
            adminPost();
        }
        else
        {
            throw new Exception("Erreur vous n'êtes pas connectez. Veuillez vous identifier");
        }

    }

    elseif ($_GET['action'] == 'adminComment'){
        if(isset($_COOKIE['ID'])&& isset($_COOKIE['Login'])) {
            adminComment();
        }
        else
        {
            throw new Exception("Erreur vous n'êtes pas connectez. Veuillez vous identifier");
        }
    }

     elseif ($_GET['action'] == 'editPosts'){
         if(isset($_COOKIE['ID'])&& isset($_COOKIE['Login'])) {
             if (isset($_GET['id']) && $_GET['id'] > 0) {
                 editPost();
             } else {
                 throw new Exception('Erreur : aucun identifiant de billet
         envoyé');
             }

         }
         else
         {
             throw new Exception("Erreur vous n'êtes pas connectez. Veuillez vous identifier");
         }
}

     elseif ($_GET['action'] == 'editComments'){

        if(isset($_COOKIE['ID'])&& isset($_COOKIE['Login'])) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                editComment();
            } else {
                throw new Exception('Erreur : aucun identifiant de billet
         envoyé');
            }
        }
        else{
            throw new Exception("Erreur vous n'êtes pas connectez. Veuillez vous identifier");
    }
    }

     elseif ($_GET['action'] == 'editReportedComments'){

        if(isset($_COOKIE['ID'])&& isset($_COOKIE['Login'])) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                editReportedComment();
            } else {
                throw new Exception('Erreur : aucun identifiant de billet
         envoyé');
            }
        }
        else{
            throw new Exception("Erreur vous n'êtes pas connectez. Veuillez vous identifier");
    }
    }

     elseif ($_GET['action'] == 'editAuthorisedComments'){

        if(isset($_COOKIE['ID'])&& isset($_COOKIE['Login'])) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                editAuthorisedComment();
            } else {
                throw new Exception('Erreur : aucun identifiant de billet
         envoyé');
            }
        }
        else{
            throw new Exception("Erreur vous n'êtes pas connectez. Veuillez vous identifier");
    }
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

    elseif ($_GET['action'] == 'eraseReporting') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            eraseReporting($_GET['id']);

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