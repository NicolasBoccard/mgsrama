<?php
//Insersion du fichier de fonction
include_once "../functions/dbFunctions.php";

$idLogin = testLogin($_POST["pseudo"], $_POST["password"]);

if($idLogin != false)
{
    $_SESSION["idLogged"] = $idLogin;
    header('Location: index.php');
}