<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
//Au clique du bouton pour valider les modifications de l'article
if (isset($_POST["ValidModifComment"]) && $_GET["OldIdArt"]) {
    //Modifie le commentaire
    UpdateModifiedCommentsUserById($infoModifComments);
    //redirige
    header('Location: ./index.php?page=afficheArticleById&idArt=' . $_GET["OldIdArt"]);
}