<?php

/*
 * Page        : login.php
 * Description : This page is the home page whene the users are connected.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Date        : 01.12.2015
 * Version     : 1.0
 */

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