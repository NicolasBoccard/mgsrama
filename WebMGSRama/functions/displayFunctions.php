<?php
/*
 * Page        : displayFunction.php
 * Description : This page is included to the project pages 
 *               to use the display's functions.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Date        : 08.12.2015
 * Version     : 0.1
 */

//Fonction pour afficher les images
function displayImg($tabUser) {
    for ($i = 0; $i < count($tabUser); $i++) {
        ?>
        <tr id="trTableGame">
            <td id="tdTableGameLeft"><?php echo "<img src=" . $tabUser[$i]["img_Jeux"] . " height=\"200\" width=\"200\"/><br/>"; ?></td>
            <td id="tdTableGameRight">
                <?= $tabUser[$i]["titre_Jeux"]; ?><br/>
                <?= $tabUser[$i]["description_Jeux"]; ?>
                <input type="submit" value="Infos..."/>
            </td>
        </tr><?php
        //echo $tabUser[$i]["img_Jeux"];
        //echo $tabUser[$i]["titre_Jeux"];
        //echo "<img src=" . $tabUser[$i]["img_Jeux"] . " height=\"200\" width=\"200\"/><br/>";
    }
    //echo $tabUser[1]["img_Jeux"];
    //echo "<img src=" . $tabUser[1]["img_Jeux"] . " height=\"200\" width=\"200\"/>";
}

//Fonction permettant de créer un "select" avec les différentes consoles
function displayConsoles($tabConsoles)
{
    $out = "<select>";
    for ($i = 0; $i < count($tabConsoles); $i++)
    {
        $out .= '<option value="'. $tabConsoles[$i]["id_Console"] .'">' . $tabConsoles[$i]["nom_Console"] . '</option>';
    }
    $out .= "</select>";
    return $out;
}
