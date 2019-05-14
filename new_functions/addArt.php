<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
if (isset($_POST["SubArticle"])) {
    $id = $_GET["id_topic"];  
    $topic = $_GET["topic"];
    addArticle($article, $id);
    header('Location: ./index.php?page='.$topic.'&id_topic='.$id);
}