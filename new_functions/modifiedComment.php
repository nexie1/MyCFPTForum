<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
if (isset($_POST["ValidModifComment"]) && $_GET["OldIdArt"]) {
    UpdateModifiedCommentsUserById($infoModifComments);
    header('Location: ./index.php?page=afficheArticleById&idArt=' . $_GET["OldIdArt"]);
}