<?php
session_start();

if ($_SESSION["idLogged"] != "") {
    $_SESSION["idLogged"] = "";
}

header('Location: index.php');
?>