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

$ConsolesHTML = displayConsoles(getConsoles());

$message = "";
$titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
$date = isset($_POST["date"]) ? $_POST["date"] : "";
$studio = isset($_POST["studio"]) ? $_POST["studio"] : "";
$description = isset($_POST["description"]) ? $_POST["description"] : "";
$tabConsoles = isset($_POST["console1"]) ? $_POST["console1"] : "";
$bandeOriginale = "";
$image = "";

if (isset($_POST["submit"])) {
    if (checkParams($_POST, ["titre", "date", "studio", "description"])) {
        if (basename($_FILES['bandeOriginale']['name']) != "") {
            $uploaddir = '../media/bo/';
            $bandeOriginale = $uploaddir . basename($_FILES['bandeOriginale']['name']);
            $moved = move_uploaded_file($_FILES['bandeOriginale']['tmp_name'], $bandeOriginale);
        } else {
            $bandeOriginale = "";
        }
        
        if (basename($_FILES['image']['name']) != "") {            
            $uploaddir = '../media/pictures/';
            $image = $uploaddir . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        } else {
            $image = "";
        }
        $idJeu = insertJeu($_SESSION["idLogged"], $titre, $date, $studio, $description, $bandeOriginale, $image);
        insertConsole($idJeu, $tabConsoles);
        $titre = "";
        $date = "";
        $studio = "";
        $description = "";
        $bandeOriginale = "";
        $image = "";
        $message = "Le jeu a bien été ajouté.";
    } else {
        $message = 'Veuillez remplir tous les champs suivis d\'un "*".';
    }
} else if (isset($_POST["discard"])) {
    $titre = "";
    $date = "";
    $studio = "";
    $description = "";
}



//DÃƒÂ©finition du nom de la page
$titlePage = "Gestion de mes jeux";

//Insersion du header HTML
include_once "../view/HeadPage.php";
?>
<section id="SectionPage">
    <header>

        Gestion de mes jeux
    </header>
        Mes jeux
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
        echo "<form action=\"gestionmesjeux.php\" action=\"post\"><input type=\"submit\" value=\"supprimer\"/></form></td></tr>";
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