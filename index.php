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
require_once './new_functions/addCom.php';
require_once './new_functions/addArt.php';
require_once './new_functions/modifiedProfile.php';
require_once './new_functions/modifiedArticle.php';
require_once './new_functions/modifiedComment.php';


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
    default :
    case "Index":
        include './new_includes/article.inc.php';
        break;
    case "MesArticles":
        include './new_includes/article.inc.php';
        break;
    case "afficheArticleById":
        $idArt = $_GET["idArt"];
        $resultArt = selectArticleById($idArt);
        $resultCom = selectAllComByArticle($idArt);
        include './new_includes/displayArticle.php';
        break;
    case "displayAllArticlesByTopics":
        $idTopic = filter_input(INPUT_GET, "id_topic", FILTER_SANITIZE_NUMBER_INT);
        $selectArtByTopics = selectAllArticleByTopics($idTopic);
        include './new_includes/displayAllArticlesByTopics.php';
        break;
    case "CreateArticle":
        $id_topic = $_GET["id_topic"];
        $topic = $_GET["page"];
        include './new_includes/formArticle.inc.php';
        break;
    case "DeleteAllArticles":
        CacheAllArticles($_GET["HideAllArticles"]);
        header('Location: ./index.php?page=Index');
        break;
    case "ModifArticles":
        $id_article = $_GET["idModifMyArticle"];
        $tableArticlesUser = getModifArticlesUserById($id_article);
        include './new_includes/formModifMesArticles.inc.php';
        break;
    case "DeleteArticle":
        if (isset($_GET["DeleteArticleById"])) {
            DeleteArticleById($_GET["DeleteArticleById"]);
            header('Location: ./index.php?page=MesArticles');
        }
        break;
    case "ModifComments":
        $id_comment = $_GET["idModifComments"];
        $tableCommentsUser = getModifCommentsUserById($id_comment);
        include './new_includes/formModifMesCommentaires.inc.php';
        break;

    case "DeleteComments":
        if (isset($_GET["DeleteCommentsId"]) && $_GET["OldIdArt"]) {
            DeleteCommentById($_GET["DeleteCommentsId"]);
            header('Location: ./index.php?page=afficheArticleById&idArt=' . $_GET["OldIdArt"]);
        }
        break;
    case "privateProfile":
        $pseudoPriveProfile = $_SESSION["pseudo"];
        $displayPrivateProfile = displayProfile($pseudoPriveProfile);
        include './new_includes/privateProfile.php';
        break;
    case "modifProfile":
        $idModifProfile = $_GET["idUserModif"];
        $displayPrivateProfileById = displayProfileById($idModifProfile);
        include './new_includes/formModifProfile.php';
        break;
    case "publicProfile":
        $pseudoPublicProfile = $_GET["pseudoProfile"];
        $displayPublicProfile = displayProfile($pseudoPublicProfile);
        include './new_includes/publicProfile.php';
        break;
}
include './new_includes/footer.inc.php';
?>
