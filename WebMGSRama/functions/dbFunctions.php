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
session_start();
include_once "mysql.inc.php";
include_once "displayFunctions.php";



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

//Fonction vérifiant que le bon nombre de paramètre a été entré par l'utilisateur
function checkParams($array, $keys)
{
    $l = count($keys);
    
    for($i = 0; $i < $l; $i++)
    {
        if(empty($array[$keys[$i]]))
        {
            return false;
        }
    }
    return true;
}

//Fonction retournant l'id de l'utilisateur si les identifiants sont bons, ou false s'ils sont erronés
function testLogin($pseudo, $password)
{
    $db = getConnection();
    $request = $db->prepare('SELECT id_Utilisateur, pseudo_Utilisateur, sha1mdp_Utilisateur FROM `t_Utilisateurs` WHERE pseudo_Utilisateur = "'.$pseudo.'" AND sha1mdp_Utilisateur = "'.sha1($password).'"');
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
    $request = $db->prepare("SELECT nom_Utilisateur, prenom_Utilisateur, pseudo_Utilisateur, email_Utilisateur FROM `t_Utilisateurs` WHERE `id_Utilisateur` = ".$id);
    $request->execute();
    $out = $request->fetchAll(PDO::FETCH_ASSOC);
    $infos = array("nom" => $out[0]["nom_Utilisateur"], "prenom" => $out[0]["prenom_Utilisateur"], "pseudo" => $out[0]["pseudo_Utilisateur"], "email" => $out[0]["email_Utilisateur"]);
    return $infos;
}

//Fonction permettant de récuperer l'emplacement 
function getImgGame() {
    $db = getConnection();
    $request = $db->prepare("SELECT * FROM `t_jeux`");
    $request->execute();
    $tabUser = $request->fetchAll(PDO::FETCH_ASSOC);
    if ($tabUser != null) {
        displayImg($tabUser);
    }
    else {
        return false;
    }
}
//Fonction d'insersion des utilisateurs
function insertUser($nom, $prenom, $pseudo, $email, $password)
{
    $db = getConnection();
    $sql = "INSERT INTO `webmgsrama`.`t_utilisateurs` (`id_Utilisateur`, `nom_Utilisateur`, `prenom_Utilisateur`, `pseudo_Utilisateur`, `email_Utilisateur`, `sha1mdp_Utilisateur`, `privilege_Utilisateur`) VALUES (NULL, :nom, :prenom, :pseudo, :email, :password, '0');";
    $request = $db->prepare($sql);
    
    $request->bindParam(':nom', $nom, PDO::PARAM_STR);
    $request->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $request->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $request->bindParam(':email', $email, PDO::PARAM_STR);
    $request->bindParam(':password', $password, PDO::PARAM_STR);
    
    $request->execute();
}

//Fonction permettant de modifier les infos d'un utilisateur
function updateUser($idUser, $nom, $prenom, $pseudo, $email, $password)
{
    $db = getConnection();
    $sql = "UPDATE `webmgsrama`.`t_utilisateurs` SET `nom_Utilisateur` = :nom, `prenom_Utilisateur` = :prenom, `pseudo_Utilisateur` = :pseudo, `email_Utilisateur` = :email, `sha1mdp_Utilisateur` = :password WHERE `t_utilisateurs`.`id_Utilisateur` = :idUser;";
    $request = $db->prepare($sql);
    
    $request->bindParam(':nom', $nom, PDO::PARAM_STR);
    $request->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $request->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $request->bindParam(':email', $email, PDO::PARAM_STR);
    $request->bindParam(':password', $password, PDO::PARAM_STR);
    $request->bindParam(':idUser', $idUser, PDO::PARAM_INT);
    
    $request->execute();
}

//Fonction permettant de modifier les infos d'un utilisateur
function updateUserSansPassword($idUser, $nom, $prenom, $pseudo, $email)
{
    $db = getConnection();
    $sql = "UPDATE `webmgsrama`.`t_utilisateurs` SET `nom_Utilisateur` = :nom, `prenom_Utilisateur` = :prenom, `pseudo_Utilisateur` = :pseudo, `email_Utilisateur` = :email WHERE `t_utilisateurs`.`id_Utilisateur` = :idUser;";
    $request = $db->prepare($sql);
    
    $request->bindParam(':nom', $nom, PDO::PARAM_STR);
    $request->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $request->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $request->bindParam(':email', $email, PDO::PARAM_STR);
    $request->bindParam(':idUser', $idUser, PDO::PARAM_INT);
    
    $request->execute();
}