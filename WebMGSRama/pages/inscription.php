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

//Définition du nom de la page
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
                    <input type="text" name="nom">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom">Prénom :</label>
                </td>
                <td>
                    <input type="text" name="prenom">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pseudo">Pseudo :</label>
                </td>
                <td>
                    <input type="text" name="pseudo">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email :</label>
                </td>
                <td>
                    <input type="email" name="email">
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