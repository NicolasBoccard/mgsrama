<?php

/*
 * Page        : index.php
 * Description : This page is the index's page of the website.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Date        : 01.12.2015
 * Version     : 0.2
 */

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
    include_once "../view/AsidePage.php";
    ?>
</aside>

<?php
include_once "../view/FootPage.php";
?>