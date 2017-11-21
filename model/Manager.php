<?php
namespace BaseBlog\model;
use PDO;
class Manager
{
    protected function dbConnect()

    {

        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'nzB69yCSBDz9eK46');

        return $db;

    }
}