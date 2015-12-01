<?php
if ($_SESSION["idLogged"] == "") {
    include_once "../view/AsidePageLogin.php";
} else {
    include_once "../view/AsidePageLogged.php";
}
?>