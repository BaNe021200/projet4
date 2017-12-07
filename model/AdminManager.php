<?php
/**
 * Created by PhpStorm.
 * User: connector
 * Date: 30/11/2017
 * Time: 16:09
 */

namespace model;
require_once 'model/Manager.php';
use model\Manager;
use PDO;

class AdminManager extends Manager
{
    /*public function getConnexion($passHache){
        $pdo=$this->dbConnect();
        $pdoStat=$pdo->prepare('SELECT id FROM admin WHERE login=:login AND password=:password');
        $pdoStat->bindValue(':login',$_POST['login'],PDO::PARAM_STR);
        $pdoStat->bindValue(':password',$passHache,PDO::PARAM_STR);
        $connexionSucces = $pdoStat->execute();
        $connexionIsOk = $pdoStat->fetch();


    }*/
    public function getConnexion(){
        $pdo=$this->dbConnect();
        $pdoStat=$pdo->prepare('SELECT id FROM admin WHERE login=:login AND password=:password');
        $pdoStat->bindValue(':login',$_POST['login'],PDO::PARAM_STR);
        $pdoStat->bindValue(':password',$_POST['password'],PDO::PARAM_STR);
        $connexionSucces = $pdoStat->execute();
        $connexionIsOk = $pdoStat->fetch();

            /*if(!$connexionIsOk){

             header('Location:index.php?action=adminConnexion');
               // echo'Mauvais identifiant ou mot de passe !';



            }*/
            if($connexionIsOk)
            /*else*/
            {
                session_start();
                $_SESSION['id']=$connexionIsOk['id'];
                $_SESSION['login']= $_POST['login'];
                setcookie("ID",$_SESSION['id'], time() + 3600*24*365,null, null, false, true);
                setcookie("Login",$_SESSION['login'], time() + 3600*24*365,null, null, false, true);


                header('Location:index.php?action=adminPost');
            }
     }

    public function  getLogin(){
        $pdo= $this->dbConnect();
        $pdoStat=$pdo->prepare('INSERT INTO admin VALUES(NULL,:login,:password)');
        $pdoStat->bindValue(':login', $_POST['login'],PDO::PARAM_STR);
        $pdoStat->bindValue(':password', $_POST['password'],PDO::PARAM_STR);

        $connexionStat=$pdoStat->execute();
        return $connexionStat;

    }

    public function disconnect(){
        session_abort();
        setcookie("ID","", time()- 60);
        setcookie("Login","", time()- 60);

    }

    public function register(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $login = $post['login'];
        $password = md5($post['password']);
        if($post['submit']){
            if($login === '' || $password === '') {
                echo 'les champs ne sont pas tous remplis';
            }
            $pdo= $this->dbConnect();
            $pdoStat=$pdo->prepare('INSERT INTO admin VALUES(NULL,:login,:password)');
            $pdoStat->bindValue(':login', $login,PDO::PARAM_STR);
            $pdoStat->bindValue(':password', $password,PDO::PARAM_STR);

            $connexionStat=$pdoStat->execute();
            return $connexionStat;

        }

    }

}