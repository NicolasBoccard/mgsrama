<?php

/*
 * Page        : AsidePageLogin.php
 * Description : This page is included to the project pages to display 
 *               the aside of a offline user.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Date        : 01.12.2015
 * Version     : 1.0
 */

$pseudo = isset($_GET["pseudo"]) ? $_GET["pseudo"] : "";
$message = isset($_GET["message"]) ? $_GET["message"] : ""
?>
<header>Connexion</header>
    <form method="post" action="login.php">
        <input type="text" name="pseudo" placeholder="Pseudo..." value="<?php echo $pseudo ?>">
        <input type="password" name="password" placeholder="Mot de passe...">
        <input type="submit" name="submit" value="Se connecter" id="submit">
        <div id="AsideMessage"><?php echo $message?></div>
        <div id="LienInscription"><a href="inscription.php">Créer un compte...</a></div>
    </form>