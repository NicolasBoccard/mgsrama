<?php

/*
 * Page        : dbFunctions.php
 * Description : This page is included to the project pages 
 *               to use the functions of the database.
 * Authors     : Chauche Benoit & Boccard Nicolas
 * Date        : 01.12.2015
 * Version     : 1.0
 */

//Fichier de fonctions relatives à la base de donnée

include_once "mysql.inc.php";

session_start();

if (!isset($_SESSION["idLogged"])) {
    $_SESSION["idLogged"] = "";
}

//Fonction de connexion à la base
function getConnection() {
    static $db = null;
    if ($db == null) {
        try {
            $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PWD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    return $db;
}

//Fonction retournant l'id de l'utilisateur si les identifiants sont bons, ou false s'ils sont erronés
function testLogin($pseudo, $password)
{
    $db = getConnection();
    $request = $db->prepare('SELECT id_Utilisateur, pseudo_Utilisateur, sha1mdp_Utilisateur FROM `t_Utilisateurs` WHERE pseudo_Utilisateur = "'.$pseudo.'" AND sha1mdp_Utilisateur = "'.$password.'"');
    $request->execute();
    $tabUser = $request->fetchAll(PDO::FETCH_ASSOC);
    if ($tabUser != null) {
        return $tabUser[0]["id_Utilisateur"];
    }
    else {
        return false;
    }
}

//Fonction permettant de récuperer la liste des détails d'un utilisateur par rapport à son id
function getUsersInfosById($id)
{
    $db = getConnection();
    $request = $db->prepare("SELECT pseudo_Utilisateur, email_Utilisateur FROM `t_Utilisateurs` WHERE `id_Utilisateur` = ".$id);
    $request->execute();
    $out = $request->fetchAll(PDO::FETCH_ASSOC);
    $infos = array("pseudo" => $out[0]["pseudo_Utilisateur"], "email" => $out[0]["email_Utilisateur"]);
    return $infos;
}