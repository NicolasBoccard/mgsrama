<?php
$pseudo = isset($_GET["pseudo"]) ? $_GET["pseudo"] : "";
$message = isset($_GET["message"]) ? $_GET["message"] : ""
?>
<header>Connexion</header>
    <form method="post" action="login.php">
        <input type="text" name="pseudo" placeholder="Pseudo..." value="<?php echo $pseudo ?>">
        <input type="password" name="password" placeholder="Mot de passe...">
        <input type="submit" name="submit" value="Se connecter" id="submit">
        <div id="AsideMessage"><?php echo $message?></div>
    </form>