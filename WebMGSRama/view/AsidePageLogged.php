<?php 
$infos = getUsersInfosById($_SESSION["idLogged"]);
$pseudo = $infos["pseudo"];
$email = $infos["email"];
?>
<header>Profil</header>
<div class="ProfilAside">Pseudo : <?php echo $pseudo ?></div>
<div class="ProfilAside">Email : <?php echo $email ?></div>
<a href="AfficherMesJeux.php">Afficher mes jeux</a>
<a href="AfficherMesJeux.php">Modifier mon profil</a>
<input type="submit" value="Afficher mes jeux">