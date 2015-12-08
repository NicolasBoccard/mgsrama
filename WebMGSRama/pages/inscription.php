<?php
/*
 * Page        : inscription.php
 * Description : This page is the page where the users can register themselves.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Date        : 01.12.2015
 * Version     : 1.0
 */

//Insersion du fichier de fonction
include_once "../functions/dbFunctions.php";

if ($_SESSION["idLogged"] != null) {
    header('Location: index.php');
}

$message = "";
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$confirmPassword = isset($_POST["confirmPassword"]) ? $_POST["confirmPassword"] : "";

if (isset($_POST["submit"])) {
    if (checkParams($_POST, ["nom", "prenom", "pseudo", "email", "password", "confirmPassword"])) {
        if ($password != $confirmPassword) {
            $message = "Les deux mots de passe sont différents.";
        } else {
            insertUser($nom, $prenom, $pseudo, $email, sha1($password));
            $nom = "";
            $prenom = "";
            $pseudo = "";
            $email = "";
            $message = "Inscription réussie. Vous pouvez maintenant vous connecter.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
} else if (isset($_POST["discard"])) {
    $nom = "";
    $prenom = "";
    $pseudo = "";
    $email = "";
}

//DÃ©finition du nom de la page
$titlePage = "Inscription";

//Insersion du header HTML
include_once "../view/HeadPage.php";
?>

<section id="SectionPage">
    <header>
        Inscription
    </header>
    <form method="POST" action="#">
        <table>
            <tr>
                <td>
                    <label for="nom">Nom :</label>
                </td>
                <td>
                    <input type="text" name="nom" value="<?php echo $nom ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom">Prénom :</label>
                </td>
                <td>
                    <input type="text" name="prenom" value="<?php echo $prenom ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pseudo">Pseudo :</label>
                </td>
                <td>
                    <input type="text" name="pseudo" value="<?php echo $pseudo ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email :</label>
                </td>
                <td>
                    <input type="email" name="email" value="<?php echo $email ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Mot de passe :</label>
                </td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="confirmPassword">Confirmer le mot de passe :</label>
                </td>
                <td>
                    <input type="password" name="confirmPassword">
                </td>
            </tr>
        </table>
        <div id="ButtonForm">
            <input type="submit" name="discard" value="Annuler" class="submit"> 
            <input type="submit" name="submit" value="Confirmer" class="submit">
        </div>
        <div id="MessageErreur"><?php echo $message ?></div>
    </form>
</section>
<aside id="AsidePage">
<?php
include_once "../view/AsidePage.php";
?>
</aside>

<?php
include_once "../view/FootPage.php";
?>