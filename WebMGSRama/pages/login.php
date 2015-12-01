<?php
//Insersion du fichier de fonction
include_once "../functions/dbFunctions.php";

$pseudo = $_POST["pseudo"];
$password = $_POST["password"];

$idLogin = testLogin($pseudo, $password);

if($idLogin != false)
{
    $_SESSION["idLogged"] = $idLogin;
    header('Location: index.php');
}
 else {
    header('Location: index.php?pseudo='.$pseudo.'&message=Identifiants incorrects.');
}