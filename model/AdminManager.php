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
    public function getConnexion($passHache){
        $pdo=$this->dbConnect();
        $pdoStat=$pdo->prepare('SELECT id FROM admin WHERE login=:login AND password=:password');
        $pdoStat->bindValue(':login',$_POST['login'],PDO::PARAM_STR);
        $pdoStat->bindValue(':password',$passHache,PDO::PARAM_STR);
        $connexionSucces = $pdoStat->execute();
        $connexionIsOk = $pdoStat->fetch();


    }
}