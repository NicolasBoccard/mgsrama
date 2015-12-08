<?php
/*
 * Page        : index.php
 * Description : This page is the home page of the website.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Date        : 01.12.2015
 * Version     : 0.2
 */

//Insersion du fichier de fonction
include_once "../functions/dbFunctions.php";

if ($_SESSION["idLogged"] == null) {
    header('Location: index.php');
}

$message = "";
$infos = getUsersInfosById($_SESSION["idLogged"]);
$nomOld = $infos["nom"];
$prenomOld = $infos["prenom"];
$pseudoOld = $infos["pseudo"];
$emailOld = $infos["email"];

$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$confirmPassword = isset($_POST["confirmPassword"]) ? $_POST["confirmPassword"] : "";

if (isset($_POST["submit"])) {
    if (checkParams($_POST, ["nom", "prenom", "pseudo", "email", "password", "confirmPassword"])) {
        if ($password != $confirmPassword) {
            $message = "Les deux mots de passe sont diff√©rents.";
        } else {
            updateUser($_SESSION["idLogged"], $nom, $prenom, $pseudo, $email, sha1($password));
            $message = "Mise ‡ jour effectuÈe. Le mot de passe a ÈtÈ modifiÈ.";
            $nomOld = $nom;
            $prenomOld = $prenom;
            $pseudoOld = $pseudo;
            $emailOld = $email;
        }
    } else if (checkParams($_POST, ["nom", "prenom", "pseudo", "email"])) {
        updateUserSansPassword($_SESSION["idLogged"], $nom, $prenom, $pseudo, $email);
        $message = "Mise ‡ jour effectuÈe. Le mot de passe n'a pas ÈtÈ modifiÈ.";
        $nomOld = $nom;
        $prenomOld = $prenom;
        $pseudoOld = $pseudo;
        $emailOld = $email;
    }
}

//DÈfinition du nom de la page
$titlePage = "Gestion de mon profil";

//Insersion du header HTML
include_once "../view/HeadPage.php";
?>

<section id="SectionPage">
    <header>
        Gestion de mon profil
    </header>
    <form method="POST" action="#">
        <table>
            <tr>
                <td>
                    <label for="nom">Nom :</label>
                </td>
                <td>
                    <input type="text" name="nom" value="<?php echo $nomOld ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom">Pr√©nom :</label>
                </td>
                <td>
                    <input type="text" name="prenom" value="<?php echo $prenomOld ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pseudo">Pseudo :</label>
                </td>
                <td>
                    <input type="text" name="pseudo" value="<?php echo $pseudoOld ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email :</label>
                </td>
                <td>
                    <input type="email" name="email" value="<?php echo $emailOld ?>">
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