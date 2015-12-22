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

//DÃ©finition du nom de la page
$titlePage = "Gestion de mes jeux";

//Insersion du header HTML
include_once "../view/HeadPage.php";
?>
<section id="SectionPage">
    <header>
        Gestion de mes jeux
    </header>
    <?php
    $test = getGameByUser($_SESSION["idLogged"]);
    echo "<table>";
    for ($i=0;$i<count($test);$i++)
    {
        echo "<tr><td>";
        echo "<img src=" . $test[$i]["img_Jeux"] . " height=\"200\" width=\"200\"/></td><td>";
        echo $test[$i]["titre_Jeux"] . "</td><td>";
        echo "<a href=\"modifierjeu.php?id=" . $test[$i]["id_Jeux"] . "\"><input type=\"submit\" value=\"modifier\"/></a></td><td>";
        echo "<a href=\"supprimerjeu.php?id=" . $test[$i]["id_Jeux"] . "\"><input type=\"submit\" value=\"supprimer\"/></a></td></tr>";
    }
    echo "</table>";
?>
    <a href="ajouterjeux.php"><input type="submit" value="Ajouter un jeu"/></a>
</section>
<aside id="AsidePage">
    <?php
    include_once "../view/AsidePage.php";
    ?>
</aside>

<?php
include_once "../view/FootPage.php";
?>