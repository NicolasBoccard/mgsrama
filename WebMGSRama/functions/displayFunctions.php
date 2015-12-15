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
                <a href="index.php?id=<?= $tabUser[$i]["id_Jeux"] ?>"><input type="submit" value="Infos..." name="id"/></a>
            </td>
        </tr><?php
    }
}

//Fonction pour afficher les jeux en détails
function displayDetailGame($tab, $console) {
    ?>
    <table>
        <tr>
            <td>
                <?= $tab[0]["titre_Jeux"]; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo "<img src=" . $tab[0]["img_Jeux"] . " height=\"200\" width=\"200\"/><br/>"; ?>
            </td>
            <td>
                Description :<br/>
                <?= $tab[0]["description_Jeux"]; ?>
            </td>
        </tr>
        <tr>
            <td>
                Console : 
                <?= $console; ?>
            </td>
        </tr>
        <tr>
            <td>
                Date de sortie :
                <?= $tab[0]["dateSortie_Jeux"]?>
            </td>
        </tr>
        <tr>
            <td>
                Editeur :
                <?= $tab[0]["studio_Jeux"]?>
            </td>
        </tr>
        <tr>
            <td>
                Bande originale :
                <?= $tab[0]["bo_Jeux"]?>
            </td>
        </tr>
        <tr>
            <td>
                <a href="index.php"><input type="submit" value="Retour"></a>
            </td>
        </tr>
    </table>
    <?php
}
