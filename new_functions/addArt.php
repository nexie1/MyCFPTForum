<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

//Quand on appui sur le bouton ajouter un article 
if (isset($_POST["SubArticle"])) {
    //prend l'id du topic
    $id = $_GET["id_topic"];
    //prend la page sur laquelle on était juste avant
    $oldPage = $_GET["oldPage"];
    //ajoute l'article
    addArticle($article, $id);
    //redirige sur la page ou on était juste avant
    header('Location: ./index.php?page=' . $oldPage . '&id_topic=' . $id);
}