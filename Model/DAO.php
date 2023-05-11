<?php 

namespace App\model;
use \PDO;

class DAO{
    private $host = "localhost";
    private $dbname = "mi_figue_mi_raisain";
    private $port = "3306";
    private $dbh;

    function __construct()
    {
        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname.";port=".$this->port.";charset=UTF8";
        $this->dbh = new PDO($dsn,"root","");
    }
    public function getDbh(){
        return $this->dbh;
    }
}
?>