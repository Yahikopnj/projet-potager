<?php 
namespace App\model;
use App\Model\DAO;
use \PDOException;
require_once("../autoloader.php");

class User{
    private $name;
    private $mail;
    private $password;
    private $exp;
    private $description;


    function __construct($name, $mail, $password, $exp, $description)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->password = $password;
        $this->exp = $exp;
        $this->description = $description;

        
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getMail(){
        return $this->mail;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function getPassword(){
        return $this->password;
        
    }
    public function setPassword($password){
        $this->password = $password;
        
    }
    public function getExp(){
        return $this->exp;
    }
    public function setExp($exp){
        $this->exp = $exp;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
$this->description = $description;
    }

    public static function findAll(){
        try{
            $dao = new DAO();
            $dbh = $dao->getDbh();
            $stmt= $dbh->query("SELECT * FROM `user`");

            return $stmt->fetchAll();
        }catch(PDOException $erreur){
            echo $erreur->getMessage();
        }
    }

    public static function findById($id_user){
        try{
            $dao = new DAO();
            $dbh = $dao->getDbh();

            $stmt = $dbh->prepare("SELECT * FROM `user` WHERE id_user=?");
            $stmt->bindParam(1,$id_user);
            $stmt->execute();

            return $stmt->fetch();
        }catch(PDOException $erreur){
            echo $erreur->getMessage();
        }

    }
    public function insert(){
        try{
            $dao = new DAO();
            $dbh = $dao->getDbh();

            $stmt = $dbh->prepare("INSERT INTO `user` (`name`,`mail`,`password`, exp, `description`)
            VALUES (?, ?, ?, ?, ?) ");

            $stmt->bindValue(1,$this->name);
            $stmt->bindValue(2,$this->mail);
            $stmt->bindValue(3,$this->password);
            $stmt->bindValue(4,$this->exp);
            $stmt->bindValue(5,$this->description);

            $stmt->execute();

        }catch(PDOException $erreur){
          echo $erreur->getMessage();
        }
    }
    public function update($id_user){
        try{
            $dao = new DAO();
            $dbh = $dao->getDbh();

            $stmt = $dbh->prepare("UPDATE `user` SET `name`=?, `mail`=?, `password`, exp, `description`");

            $stmt->bindValue(1,$this->name);
            $stmt->bindValue(2,$this->mail);
            $stmt->bindValue(3,$this->password);
            $stmt->bindValue(4,$this->exp);
            $stmt->bindValue(5,$this->description);
            $stmt->bindValue(6,$id_user);

            $stmt->execute();
        }catch(PDOException $erreur){
            echo $erreur->getMessage();
        }
    }
    public static function deleteById($id_user){
        try{
            $dao = new DAO();
            $dbh = $dao->getDbh();
    
           $stmt =  $dbh->prepare("DELETE FROM `user` WHERE id_user=?");
           $stmt->bindValue(1,$id_user);
    
            $stmt->execute();
        }catch(PDOException $erreur){
            echo $erreur->getMessage();
        }
    }
    public static function checkEmail($mail){

        try{    

        $dao = new DAO();
        $dbh = $dao->getDbh();

        $stmt = $dbh->prepare("SELECT mail FROM user WHERE mail=?");
        $stmt->bindParam(1,$mail);
        $stmt->execute();

        return $stmt->fetchAll();

    }catch(PDOException $erreur){
        echo $erreur->getMessage();
    }

    }
    public static function findByEmail($mail){

        try{    

        $dao = new DAO();
        $dbh = $dao->getDbh();

        $stmt = $dbh->prepare("SELECT * FROM user WHERE mail=?");
        $stmt->bindParam(1,$mail);
        $stmt->execute();

        return $stmt->fetch();

    }catch(PDOException $erreur){
        echo $erreur->getMessage();
    }

    }
}
?>