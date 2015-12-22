<?php
/*
 * Page        : ajouterjeu.php
 * Description : This page is the page where the users can delete a game.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Date        : 01.12.2015
 * Version     : 1.0
 */

//Insersion du fichier de fonction
include_once "../functions/dbFunctions.php";

if ($_SESSION["idLogged"] == "") {
    header('Location: index.php');
}

if (isset($_GET["id"])) {
    supprimerJeu($_GET["id"]);
    header('Location: gestionmesjeux.php');
}
 else {
    header('Location: gestionmesjeux.php');
}