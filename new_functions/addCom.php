<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
if (isset($_POST["SubCommentaire"])) {
    if ($_POST["commentaire"] != "") {
        $date = date("Y-m-d H:i");
        $info["id_article"] = $_GET['idArt'];
        $info["content"] = $_POST["commentaire"];
        $info["creation_date"] = $date;
        addCom($info);
        header('Location: ./index.php?page=afficheArticleById&idArt=' . $info["id_article"]);
    } else {
        echo 'Votre titre ou contenu est vide';
    }
}

