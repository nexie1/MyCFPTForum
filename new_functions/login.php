<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
//Vérifie si l'envoie des données à l'appuis du bouton login fonctionne
if (isset($_POST["Login"])) {
//si le mot de passe entré par l'utilisateur est = au mot de passe de cet utilisateur dans la base de donnée, sinon on fait rien
    if ($info["password"] == getUser($info)["password"]) {
        $_SESSION["Connected"] = TRUE;
        $_SESSION["id_user"] = getUser($info)["id_user"];
        $_SESSION["is_admin"] = getUser($info)["is_admin"];
        $_SESSION["email"] = $info["email"];
        $_SESSION["pseudo"] = getUser($info)["pseudo"];

        /* $_SESSION["first_name"] = getUser($info)["first_name"];
          $_SESSION["last_name"] = getUser($info)["last_name"];
          $_SESSION["id_user"] = getUser($info)["id_user"]; */


        header('Location:  index.php?page=Index');
    }
}

