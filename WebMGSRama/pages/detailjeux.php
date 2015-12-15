<?php

/*
 * Page        : detailjeux.php
 * Description : This page is the page that displays the details of the games.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Date        : 15.12.2015
 * Version     : 0.1
 */

//Insersion du fichier de fonction
include_once "../functions/dbFunctions.php";

//DÃ©finition du nom de la page
$titlePage = "Détails";

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