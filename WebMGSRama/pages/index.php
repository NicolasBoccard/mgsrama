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

//Définition du nom de la page
$titlePage = "Accueil";

//Insersion du header HTML
include_once "../view/HeadPage.php";
?>

<section id="SectionPage">

    <?php
    
    $db = getConnection();
    $request = $db->prepare('SELECT img_Jeux FROM `t_jeux` WHERE id_Jeux = "1"');
    $request->execute();
    $tabUser = $request->fetchAll(PDO::FETCH_ASSOC);
    if ($tabUser != null) {
        echo $tabUser[0]["img_Jeux"];
        echo "<img src=" . $tabUser[0]["img_Jeux"] . " height=\"200\" width=\"200\"/>";
    }
    else {
        return false;
    }
    
    
    
    ?>
    
    
</section>
<aside id="AsidePage">
    <?php
    include_once "../view/AsidePage.php";
    ?>
</aside>

<?php
include_once "../view/FootPage.php";
?>