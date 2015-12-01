<?php 
$infos = getUsersInfosById($_SESSION["idLogged"]);
$pseudo = $infos["pseudo"];
$email = $infos["email"];
?>
<header>Profil</header>
<?php
echo $pseudo;
echo $email;
?>