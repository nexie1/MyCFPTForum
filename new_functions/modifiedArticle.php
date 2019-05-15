<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
if (isset($_POST["ValidModifArticle"])) {
    UpdateModifiedArticlesUserById($infoModifArticles);
    header('Location: ./index.php?page=MesArticles');
}