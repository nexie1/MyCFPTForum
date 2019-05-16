<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

$_SESSION["CreationInscr"] = "Empty";
//Vérifie si on a appuer sur le bouton d'inscription
if (isset($_POST["Submit"])) {

    //Si l'utilisateur ne rentre pas @eduge.ch alors l'incription est incorrecte
    if (preg_match("/\S+@eduge.ch/", $_POST["email"])) {

        //met le mail dans un tableau
        $info["email"] = $_POST["email"];
        
        //Verifie si les 2 mots de passes sont égaux + captcha  
        if ($_POST["CopieCaptcha"] == $_SESSION['captcha']) {
            if ($_POST["password"] == $_POST["passwordConfirm"]) {

                //Ajoute l'utilisateur
                addUser($info);
                //Alerte pour dire que l'inscription à été bien faite
                $_SESSION["CreationInscr"] = "Complete";
            } else {
                //Alerte pour dire que le formulaire est incomplet ou faux
                $_SESSION["CreationInscr"] = "Incomplete";
            }
        } else {
            //Alerte pour dire que le formulaire est incomplet ou faux
            $_SESSION["CreationInscr"] = "Incomplete";
        }
    } else {
        //Alerte pour dire que le formulaire est incorrecte
        $_SESSION["CreationInscr"] = "Incorrect";
    }
}
