<?php 
namespace App\Controller;
use App\Model\User;
require("../autoloader.php");

class UserController{
    public static function all(){
        $users = User::findAll();
        require("../View/ReadAllUser.php");
    }
    public static function readById($id_user){
        $user = User::findById($id_user);
        require("../View/ReadUser.php");
    }
    public static function create($post){
        $user = new User($post["name"], $post["mail"], $post["password"], $post["exp"], $post["description"]);
        $user->insert();
        self::all();

    }
    public static function modif($post){
        $user = new User($post["name"], $post["mail"], $post["password"], $post["exp"], $post["description"]);
        $user->update($post["id_user"]);
        self::all();
    }
    public static function formUpdate($id_user){
        $user = User::findById($id_user);
        require("../View/formUpdateUser.php");
    }
    public static function delete($id_user){
        $user = User::deleteById($id_user);
        self::all();
    }
    public static function register($post){
    $erreur = [];
    $description = null;
    $exp = null;

        if(empty($post["name"]) || empty($post["password"]) || empty($post["mail"])){
            $erreur +=  ["incomplet" => "veuillez completer le formulaire correctement"];
            echo "if numéro 1";
           
        }
        $mail = filter_var($post["mail"],FILTER_VALIDATE_EMAIL);

        if(User::checkEmail($mail) != false){
          $erreur +=["mailexist"=>"email existant"];
          echo "if num2";
        }
        if($mail == false){
            $erreur += ["mailfaux"=>"email faux"];
            echo "if num3";
        }
        $password = password_hash($post["password"], PASSWORD_ARGON2ID);
        $name = strip_tags($post["name"]);

        if(empty($erreur)){
            echo "tout ce passe bien";
        
        $user = new User($name, $post["mail"], $password, $exp, $description);

        $user->insert();

        }else{
            require("../View/index.php");
        }
    }
    public static function login($post){
        $erreur = [];

        if(empty($post["mail"]) || empty($post["password"])){
            $erreur += ["non complet"=>"veuillez remplis correctements les champs"];

        }
        $mail = filter_var($post["mail"], FILTER_VALIDATE_EMAIL);
        if($mail == false){
            $erreur += ["mail"=>"mail invalide"];
        }
        $user = User::findByEmail($mail);
        if($user == false){
            $erreur += ["emailc"=>"ce compte n'existe pas"];
        }
        var_dump($user);
echo "ici ou là-bas sans règles ou d'histoires";
var_dump(password_verify($post["password"], $user["password"]));
if(password_verify($post["password"], $user["password"]) == true){
    session_start();
    $_SESSION["name"] = $user["name"];
    require("../View/index.php");
    echo "la";
}
    }
    

}
?>