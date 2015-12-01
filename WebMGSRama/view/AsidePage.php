<?php
/*
 * Pages       : AsidePage.php
 * Description : This page is included to the project pages to display 
 *               the correct aside depending on the connection.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Dates       : 01.12.2015
 * Versions    : 1.0
 */

if ($_SESSION["idLogged"] == "") {
    include_once "../view/AsidePageLogin.php";
} else {
    include_once "../view/AsidePageLogged.php";
}
?>