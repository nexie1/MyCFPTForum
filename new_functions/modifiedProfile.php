<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

if (isset($_POST["ValidModifProfile"])) {

    $infoProfile["id_profile"] = $_POST["id_profile"];
    //$infoProfile["pseudo_profile"] = $_POST["pseudo_profile"];
    $infoProfile["first_name_profile"] = $_POST["first_name_profile"];
    $infoProfile["last_name_profile"] = $_POST["last_name_profile"];


    if (preg_match("/\S+@eduge.ch/", $_POST["email_profile"])) {

        $infoProfile["email_profile"] = $_POST["email_profile"];
        UpdateModifiedProfile($infoProfile);
        header('Location: ./index.php?page=privateProfile');
    }
}