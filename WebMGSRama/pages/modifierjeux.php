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

if ($_SESSION["idLogged"] == "") {
    header('Location: index.php');
}
$id = $_REQUEST['id'];
$tab = modifyGame($id);
$console = getConsoleByGame($tab[0]['id_Jeux']);

if(isset($_REQUEST["discard"]))
{
    header('Location: gestionmesjeux.php');
}

//DÃ©finition du nom de la page
$titlePage = "Gestion de mes jeux";

//Insersion du header HTML
include_once "../view/HeadPage.php";
?>
<section id="SectionPage">
    <header>
        Modifier un jeu
    </header>
    <form enctype="multipart/form-data" method="POST" action="#">
        <table>
            <tr>
                <td>
                    <label for="titre">Titre* :</label>
                </td>
                <td>
                    <input type="text" name="titre" value="<?=$tab[0]["titre_Jeux"] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date">Date* :</label>
                </td>
                <td>
                    <input type="date" name="date" value="<?=$tab[0]["dateSortie_Jeux"]?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="studio">Studio* :</label>
                </td>
                <td>
                    <input type="text" name="studio" value="<?= $tab[0]["studio_Jeux"] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description">Description* :</label>
                </td>
                <td>
                    <textarea><?= $tab[0]["description_Jeux"] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="console1">Console :</label>
                </td>
                <td>
                    <select>
                        <?php 
                        for($i=0;$i<count($console);$i++)
                        {
                            if($console[$i]["nom_Console"] == $tab[0][""])
                            echo "<option>";
                            echo $console[$i]["nom_Console"];
                            echo "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bandeOriginale">Bande originale :</label>
                </td>
                <td>
                    <input type="file" name="bandeOriginale">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="image">Image :</label>
                </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
        </table>
        <div id="ButtonForm">
            <input type="submit" name="discard" value="Annuler" class="submit"> 
            <input type="submit" name="submit" value="Confirmer" class="submit">
        </div>
        <div id="MessageErreur"><?php// echo $message ?></div>
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