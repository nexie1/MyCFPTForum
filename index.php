<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 08.05.2019
 * Copyright    : Fernandes Marco
 */
session_start();

//fonctions..
require_once './new_functions/filter_input.php';
require_once './new_functions/pdoConnection.php';
require_once './new_functions/fonctionDatabase.php';
require_once './new_functions/checkFom.php';
require_once './new_functions/login.php';

//include..
include './new_includes/head.inc.php';
include './new_includes/header.inc.php';
include './new_includes/nav.inc.php';
include './new_includes/menu.inc.php';

//Au chargement du site met la page index en paramètre GET pour que le switch fonctionne
$page = (isset($_GET['page']) ? $page = $_GET['page'] : $page = "");

//Quand le paramètre GET est inexistant met index
if ($page == "") {
    $page = "Index";
}

//Switch de changement de page
switch ($page) {
    case "Inscription":
        include './new_includes/formInscription.inc.php';
        break;
    case "Login":
        include './new_includes/formLogin.inc.php';
        break;
    case "deco":
        include_once './new_functions/deconnexion.php';
        break;
    case "Index":
        include './new_includes/article.inc.php';
        break;
    case "MesArticles":
        include './new_includes/article.inc.php';
        break;
}
include './new_includes/footer.inc.php';
