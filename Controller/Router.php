<?php 

use App\Controller\UserController;

require_once("../autoloader.php");

if(isset($_GET["route"])){
if($_GET["route"] == "register"){
    UserController::register($_POST);
}
}
if(isset($_GET["connexion"])){
    if($_GET["connexion"] == "login"){
        UserController::login($_POST);
    }
}
?>