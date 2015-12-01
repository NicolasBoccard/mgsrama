<?php

/*
 * Page        : logout.php
 * Description : This page disconnects the user.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Date        : 01.12.2015
 * Version     : 1.0
 */

session_start();

if ($_SESSION["idLogged"] != "") {
    $_SESSION["idLogged"] = "";
}

header('Location: index.php');
?>