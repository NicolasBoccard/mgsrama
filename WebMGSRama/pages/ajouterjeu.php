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
$titlePage = "Ajouter un jeu";

//Insersion du header HTML
include_once "../view/HeadPage.php";
?>

<section id="SectionPage">
    <header>
        Ajouter un jeu
    </header>
    <form enctype="multipart/form-data" method="POST" action="#">
        <table>
            <tr>
                <td>
                    <label for="titre">Titre* :</label>
                </td>
                <td>
                    <input type="text" name="titre" value="<?php echo $titre ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date">Date* :</label>
                </td>
                <td>
                    <input type="date" name="date">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="studio">Studio* :</label>
                </td>
                <td>
                    <input type="text" name="studio" value="<?php echo $studio ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description">Description* :</label>
                </td>
                <td>
                    <input type="text" name="description" value="<?php echo $description ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="console1">Console :</label>
                </td>
                <td>
                    <?php echo $ConsolesHTML ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bandeOriginale">Bande originale :</label>
                </td>
                <td>
                    <input type="file" name="bandeOriginale" accept="image/mp3">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="image">Image :</label>
                </td>
                <td>
                    <input type="file" name="image" accept="image/*">
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