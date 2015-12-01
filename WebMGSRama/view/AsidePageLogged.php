<?php 
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