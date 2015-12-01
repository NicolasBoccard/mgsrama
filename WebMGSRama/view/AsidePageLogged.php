<?php

/*
 * Page        : AsidePageLogged.php
 * Description : This page is included to the project pages to display 
 *               the aside of a connected user.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Date        : 01.12.2015
 * Version     : 1.0
 */

$infos = getUsersInfosById($_SESSION["idLogged"]);
$pseudo = $infos["pseudo"];
$email = $infos["email"];
?>
<header>Profil</header>
<div class="ProfilAside">Pseudo : <?php echo $pseudo ?></div>
<div class="ProfilAside">Email : <?php echo $email ?></div>
<header>Gestion</header>
<ul>
    <div class="ProfilAside"><a href="GestionMesJeux.php"><li>Mes jeux</li></a></div>
    <div class="ProfilAside"><a href="GestionMonProfil.php"><li>Mon profil</li></a></div>
</ul>
<a href="logout.php"><input type="submit" value="Se déconnecter"></a>