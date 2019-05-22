<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
//Au clique du bouton pour valider les modification de l'article
if (isset($_POST["ValidModifArticle"])) {
    //Modifier l'article
    UpdateModifiedArticlesUserById($infoModifArticles);
    //redirige
    header('Location: ./index.php?page=MesArticles');
}