<?php
require_once 'model/PostManager.php';
use BaseBlog\model\PostManager;

function publicationPost(){
    require_once 'view/backend/publicationView.php';
}

function addPost(){
$postManager = new PostManager();
    $newPost = $postManager->postPost();var_dump($newPost);
    if($newPost==false){
    throw new Exception("Une erreur s'est manifestement installé dans le backend fonction addpost... impossible d'ajouter votre nouveau chapître...c'est ballot non ?");
}
else{
    header("Location:index.php");
}


}