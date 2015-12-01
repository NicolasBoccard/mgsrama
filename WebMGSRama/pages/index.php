<?php
//Insersion du fichier de fonction
include_once "../functions/dbFunctions.php";

//Définition du nom de la page
$titlePage = "Accueil";

//Insersion du header HTML
include_once "../view/HeadPage.php";

?>

<section id="SectionPage">

</section>
<aside id="AsidePage">
    <?php
    if($_SESSION["idLogged"] == "") {
        include_once "../view/AsidePageLogin.php";
    }
 else {
        include_once "../view/AsidePageLogged.php";
    }
    ?>
</aside>

<?php
include_once "../view/FootPage.php";
?>