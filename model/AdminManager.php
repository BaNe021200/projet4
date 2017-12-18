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
    /*public function getConnexion(){
        $pdo=$this->dbConnect();
        $pdoStat=$pdo->prepare('SELECT id FROM admin WHERE login=:login AND password=:password');
        $pdoStat->bindValue(':login',$_POST['login'],PDO::PARAM_STR);
        $pdoStat->bindValue(':password',$_POST['password'],PDO::PARAM_STR);
        $connexionSucces = $pdoStat->execute();
        $connexionIsOk = $pdoStat->fetch();
        return $connexionIsOk;
}*/
    public function getConnexion(){

        $pwd=$_POST['password'];


        $pdo=$this->dbConnect();
        $pdoStat=$pdo->prepare('SELECT id, password  FROM admin WHERE login=:login');
        $pdoStat->bindValue(':login',$_POST['login'],PDO::PARAM_STR);
        $hashedPass = $pdoStat->execute();
        $hashedPass = $pdoStat->fetch();
        $verifyPassword = $hashedPass['password'];
        return $verifyPassword;
}

     public function getLogin(){
         $login= $_POST['login'];
         $pdo= $this->dbConnect();
         $pdoStat = $pdo->query("SELECT id FROM admin WHERE login = '$login'  ");
         $veryLogin= $pdoStat->execute();
         $veryLogin= $pdoStat->fetch();
         $getloginId= $veryLogin['id'];
         return $getloginId;
     }

    public function  insertLogin(){

        $hashPwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $pdo= $this->dbConnect();
        $pdoStat=$pdo->prepare('INSERT INTO admin VALUES(NULL,:login,:password)');
        $pdoStat->bindValue(':login', $_POST['login'],PDO::PARAM_STR);
        $pdoStat->bindValue(':password',$hashPwd ,PDO::PARAM_STR);

        $connexionStat=$pdoStat->execute();
        return $connexionStat;

    }

    public function disconnect(){
        session_abort();
        setcookie("ID","", time()- 60);
        setcookie("Login","", time()- 60);

    }



}